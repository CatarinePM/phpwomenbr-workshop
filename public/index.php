<?php
require __DIR__ . '/../vendor/autoload.php';
if (file_exists(__DIR__ . '/../.env')) {
    (new Symfony\Component\Dotenv\Dotenv)->load(__DIR__ . '/../.env');
}
$config = require __DIR__ . '/../config/config.php';

$router = new Respect\Rest\Router;
$tasks = $router
    ->any('/tasks/*', App\Controller\Task::class, [$config])
    ->accept(['application/json' => 'json_encode']);

$router->get('/', function () {
    require __DIR__.'/../resources/templates/list.html';
});
    
$router->get('*', function () use ($tasks) {
    return $tasks;
});
