<?php declare (strict_types = 1);
namespace App\Controller;

use App\Repository\Task as Repository;
use Respect\Rest\Routable;

class Task implements Routable
{
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function get($id = false): array
    {
        $repository = new Repository($this->config);
        $tasks = $repository->find();
        return $tasks;
    }

    protected function list()
    {
    }
}
