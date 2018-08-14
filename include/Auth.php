<?php

class Auth
{
    /**
        * @var Changken\Session\Session $session
        */
    public static $session;

    public static function __callStatic($name, $arguments)
    {
        return static::$session->$name(...$arguments);
    }
}