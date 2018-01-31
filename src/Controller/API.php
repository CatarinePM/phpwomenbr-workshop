<?php declare (strict_types = 1);
namespace App\Controller;

use App\Repository\Task as Repository;

class API extends Base
{
    public function get(): array
    {
        $repository = new Repository($this->config);
        $tasks = $repository->find();
        return $tasks;
    }

    protected function list()
    {
    }
}
