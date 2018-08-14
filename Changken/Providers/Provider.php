<?php

namespace Changken\Providers;

use Changken\Core\Container;

abstract class Provider
{
    /**
        * @var Container 容器的實例
        */
    protected $container;

    /**
        * 提供者的建構子
        *
        * @param Container $container 容器的實例
        * @return void
        */
    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->register();
    }

    abstract public function register();
}