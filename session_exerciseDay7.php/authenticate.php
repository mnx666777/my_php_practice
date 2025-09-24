<?php
require 'init.php';
require 'users.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']) && $_POST['remember'] == '1';

// Basic validation
if ($username === '' || $password === '') {
    die('Please enter username and password. <a href="login.php">Back</a>');
}

// Check user exists
if (!isset($users[$username])) {
    die('Invalid credentials. <a href="login.php">Back</a>');
}

$user = $users[$username];

// Verify password using password_verify (secure)
if (!password_verify($password, $user['password_hash'])) {
    die('Invalid credentials. <a href="login.php">Back</a>');
}

// SUCCESS: login user
session_regenerate_id(true);            // stop fixation attacks
$_SESSION['user'] = $username;
$_SESSION['last_activity'] = time();

// If user asked to be remembered, create selector+validator token
if ($remember) {
    $selector = bin2hex(random_bytes(8));       // short id (stored plain)
    $validator = bin2hex(random_bytes(32));     // secret token (only hashed saved)
    $validator_hash = password_hash($validator, PASSWORD_DEFAULT);

    // expiry (30 days)
    $expires = time() + 30*24*60*60;

    // store in tokens file
    $tokens = read_tokens();
    $tokens[$selector] = [
        'user' => $username,
        'validator_hash' => $validator_hash,
        'expires' => $expires
    ];
    write_tokens($tokens);

    // set cookie value: selector:validator (validator is secret, stored hashed server-side)
    // cookie flags: secure=false for local testing; set true in production with HTTPS
    setcookie('remember', $selector.':'.$validator, $expires, '/', '', false, true);
}

header('Location: dashboard.php');
exit;
