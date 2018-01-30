<?php return [
    'PDO' => [
        'dsn' => getenv('DB_DSN') ?: 'mysql:host=localhost',
        'user' => getenv('DB_USER') ?: null,
        'password' => getenv('DB_PASSWORD') ?: null,
        'options' => [],
    ],
];
