<?php declare (strict_types = 1);
namespace App\Controller;

use App\Repository\Task as Repository;

class Listing extends Base
{

    public function get(): string
    {
        $repository = new Repository($this->config);
        $tasks = $repository->find();
        ob_start();
        require $this->config['APP']['path']['template'].\DIRECTORY_SEPARATOR.'list.php';
        return ob_get_clean();
    }
}
