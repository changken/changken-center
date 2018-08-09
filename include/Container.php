<?php

class Container
{
    /**
        * a list of object
        * @var array
        */
    protected $instances = [];

    public function __construct()
    {
        $this->bind('member', function(){
            //return new Member(new MySQLConnect());
            return new Member(new SQLiteConnect());
        });

        $this->bind('session', function(){
           return new Session('test');
        });
    }

    /**
        * bind a instance
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
        * return a instance
        * @param string $name
        * @return mixed|null
        */
    public function get(string $name)
    {
        if(isset($this->instances[$name]))
        {
            if(is_callable($this->instances[$name]))
            {
                $tmp = $this->instances[$name]();
                $this->instances[$name] = $tmp;
            }

            return $this->instances[$name];
        }else
        {
            return null;
        }
    }
}