<?php
require 'init.php';
require 'users.php';

// If user not in session, try remember cookie
if (!isset($_SESSION['user']) && isset($_COOKIE['remember'])) {
    $parts = explode(':', $_COOKIE['remember'], 2);
    if (count($parts) === 2) {
        list($selector, $validator) = $parts;
        $tokens = read_tokens();

        if (isset($tokens[$selector])) {
            $entry = $tokens[$selector];

            // Check expiry
            if ($entry['expires'] < time()) {
                // expired: delete token and cookie
                delete_token($selector);
                clear_remember_cookie();
            } else {
                // verify validator (password_hash used during save)
                if (password_verify($validator, $entry['validator_hash'])) {
                    // token valid: log user in
                    session_regenerate_id(true);
                    $_SESSION['user'] = $entry['user'];
                    $_SESSION['last_activity'] = time();

                    // rotate validator (generate new), to prevent replay
                    $newValidator = bin2hex(random_bytes(32));
                    $tokens[$selector]['validator_hash'] = password_hash($newValidator, PASSWORD_DEFAULT);
                    $tokens[$selector]['expires'] = time() + 30*24*60*60;
                    write_tokens($tokens);

                    // reset cookie with new validator
                    setcookie('remember', $selector.':'.$newValidator, $tokens[$selector]['expires'], '/', '', false, true);
                } else {
                    // possible theft: delete token and cookie
                    delete_token($selector);
                    clear_remember_cookie();
                }
            }
        } else {
            // unknown selector: clear cookie
            clear_remember_cookie();
        }
    } else {
        clear_remember_cookie();
    }
}

// After attempting remember flow, check session again
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Optional inactivity logout (15 minutes)
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 900)) {
    // expire
    $_SESSION = [];
    session_destroy();
    clear_remember_cookie();
    header('Location: login.php?timeout=1');
    exit;
}
$_SESSION['last_activity'] = time();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Dashboard</title></head>
<body>
<h2>Dashboard</h2>
<p>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</p>
<p>Session ID: <?php echo session_id(); ?></p>
<p><a href="logout.php">Logout</a></p>
<hr>
<h4>Tokens file (server-side) — for demo only</h4>
<pre><?php echo htmlspecialchars(file_get_contents(__DIR__.'/tokens.json')); ?></pre>
</body>
</html>
