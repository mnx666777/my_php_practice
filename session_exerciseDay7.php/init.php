<?php
// init.php - include this at the top of every page

// ===== Session cookie params (adjust secure => true on HTTPS) =====
$cookieParams = [
    'lifetime' => 0,       // 0 = session cookie (dies when browser closes)
    'path'     => '/',
    'domain'   => '',      // leave empty for current host
    'secure'   => false,   // set true in production (HTTPS)
    'httponly' => true,
    'samesite' => 'Lax'    // Lax is a good default
];

// PHP 7.3+ supports passing an array for session_set_cookie_params
session_set_cookie_params($cookieParams);
session_start();

// path to token store (for demo we use a JSON file)
define('TOKEN_FILE', __DIR__ . '/tokens.json');

// ensure tokens file exists
if (!file_exists(TOKEN_FILE)) {
    file_put_contents(TOKEN_FILE, json_encode(new stdClass())); // empty object
}

/**
 * Read tokens from TOKEN_FILE
 * Returns associative array: selector => ['user' => ..., 'validator_hash' => ..., 'expires' => ...]
 */
function read_tokens() {
    $json = file_get_contents(TOKEN_FILE);
    $data = json_decode($json, true);
    return is_array($data) ? $data : [];
}

/** Write tokens array back */
function write_tokens($arr) {
    file_put_contents(TOKEN_FILE, json_encode($arr, JSON_PRETTY_PRINT));
}

/** Delete a single token by selector */
function delete_token($selector) {
    $tokens = read_tokens();
    if (isset($tokens[$selector])) {
        unset($tokens[$selector]);
        write_tokens($tokens);
    }
}

/** Helper to clear remember cookie (client side) */
function clear_remember_cookie() {
    setcookie('remember', '', time() - 3600, '/', '', false, true);
}
