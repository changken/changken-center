<?php
/**
 * Provider class
 *
 * @author changken admin@changken.org
 * @version v2.0.0 dev-2
 * @date: 2018/8/10
 * @since v2.0.0 dev-2 changken see git
 */

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