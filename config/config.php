<?php return [
    'PDO' => [
        'dsn' => getenv('DB_DSN') ?: 'mysql:host=localhost',
        'user' => getenv('DB_USER') ?: null,
        'password' => getenv('DB_PASSWORD') ?: null,
        'options' => [],
    ],
    'APP' => [
        'path' => [
            'root' => __DIR__.'/../',
            'template' => __DIR__.'/../resources/templates/'
        ]
    ]
];
