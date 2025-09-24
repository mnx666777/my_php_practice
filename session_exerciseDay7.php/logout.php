<?php
require 'init.php';

// clear session server-side
$_SESSION = [];

// If remember cookie exists, remove its token from store
if (isset($_COOKIE['remember'])) {
    $parts = explode(':', $_COOKIE['remember'], 2);
    if (count($parts) === 2) {
        $selector = $parts[0];
        delete_token($selector);
    }
}

// Delete cookie client-side
clear_remember_cookie();

// Destroy session cookie and data
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params['path'], $params['domain'],
        $params['secure'], $params['httponly']);
}
session_destroy();

header('Location: login.php');
exit;
