<?php
require 'init.php';

// If already logged in, send to dashboard
if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit;
}

// Pre-fill username from remember cookie (optional UX)
$prefill = '';
if (isset($_COOKIE['remember'])) {
    // For UX only: cookie format is selector:validator
    $parts = explode(':', $_COOKIE['remember'], 2);
    if (count($parts) === 2) {
        $selector = $parts[0];
        $tokens = read_tokens();
        if (isset($tokens[$selector])) {
            $prefill = htmlspecialchars($tokens[$selector]['user']);
        }
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Login (Demo)</title></head>
<body>
<h2>Login</h2>
<form method="post" action="authenticate.php">
    <label>Username:<br>
        <input type="text" name="username" value="<?php echo $prefill; ?>">
    </label><br><br>

    <label>Password:<br>
        <input type="password" name="password">
    </label><br><br>

    <label>
        <input type="checkbox" name="remember" value="1"> Remember me
    </label><br><br>

    <button type="submit">Login</button>
</form>
</body>
</html>
