<?php
require __DIR__ . '/../vendor/autoload.php';
if (file_exists(__DIR__ . '/../.env')) {
    (new Symfony\Component\Dotenv\Dotenv)->load(__DIR__ . '/../.env');
}
$config = require __DIR__ . '/../config/config.php';

$router = new Respect\Rest\Router;
$router
    ->any('/tasks/*', App\Controller\API::class, [$config])
    ->accept(['application/json' => 'json_encode']);

$router
    ->get('/', App\Controller\Listing::class, [$config]);
