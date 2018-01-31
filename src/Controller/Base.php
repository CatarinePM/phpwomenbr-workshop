<?php declare (strict_types = 1);
namespace App\Controller;

use Respect\Rest\Routable;

abstract class Base implements Routable
{
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }
}
