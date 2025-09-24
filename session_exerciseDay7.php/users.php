<?php
// users.php - demo user list
// Note: password_hash() will re-hash on every run. For a real DB you store the hash once.
$users = [
    'admin' => [
        'name' => 'Admin User',
        'password_hash' => password_hash('1234', PASSWORD_DEFAULT) // demo password: 1234
    ],
    'alice' => [
        'name' => 'Alice Example',
        'password_hash' => password_hash('password', PASSWORD_DEFAULT) // demo: password
    ]
];
