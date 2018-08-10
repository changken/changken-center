<?php
/**
 * Container class
 *
 *@author changken admin@changken.org
 *@version v2.0.0 dev-2
 * @date 2018/8/10
 * @since  v2.0.0 dev-1 changken see git
 * @since  v2.0.0 dev-2 changken see git
 */

class Container
{
    /**
        * a list of object
        * @var array
        */
    protected $instances = [];

    /**
        * 建構子
        *
        * @param array $initialInstances 初始化實例(nullable)
        * @return void
        */
    public function __construct(array $initialInstances = [])
    {
        $this->instances = $initialInstances;
    }

    /**
        * 綁定一個實例
        *
        * @param string $name
        * @param callable|mixed $instance
        * @return void
        */
    public function bind(string $name, $instance)
    {
        if(!isset($this->instances[$name]))
        {
            $this->instances[$name] = $instance;
        }
    }

    /**
        * 回傳一個實例
        *
        * @param string $name
        * @return mixed|null
        */
    public function get(string $name)
    {
        if(isset($this->instances[$name]))
        {
            if(is_callable($this->instances[$name]))
            {
                //如果是callback函數的話，那就使用該callback函數並傳入container實例
                $tmp = $this->instances[$name]($this);
                $this->instances[$name] = $tmp;
            }

            return $this->instances[$name];
        }else
        {
            return null;
        }
    }
}