<?php

namespace Changken\Session;

class Session
{
    /**
        * @var  string session前綴
        */
    protected $prefix;

    /**
        * session建構子
        *
        * @param  string $prefix
        * @return void
        */
    public function __construct(string $prefix)
    {
        $this->prefix = $prefix;
    }

    /**
        * 開啟session
        *
        *  @param array $options = []
        * @return void
        */
    public function start(array $options = [])
    {
        session_start($options);
    }

    /**
        * 取得用戶名稱(getter)
        *
        * @return string
        */
    public function getUsername()
    {
        return $_SESSION[$this->prefix . 'username'];
    }

    /**
        *  設定用戶名稱(setter)
        *
        * @param  string $username
        * @return void
        */
    public function setUsername(string $username)
    {
        $_SESSION[$this->prefix . 'username'] = $username;
    }

    /**
        * 設定等級(getter)
        *
        * @param string $level
        * @return void
        */
    public function setLevel(string $level)
    {
        $_SESSION[$this->prefix . 'level'] = $level;
    }

    /**
        * 取得等級(setter)
        *
        * @return string
        */
    public function getLevel()
    {
        return $_SESSION[$this->prefix . 'level'];
    }

    /**
        * 登入
        *
        * @param array $data
        * @return void
        */
    public function login(array $data)
    {
        $this->setUsername($data['username']);
        $this->setLevel($data['level']);
        $_SESSION[$this->prefix . 'status'] = true;
    }

    /**
        * 檢查使用者是否登入
        *
        * @param callable|bool $restrict = true
        * @return bool
        */
    public function check($restrict = true)
    {
        if(!isset($_SESSION[$this->prefix . 'status']))
        {
            return false;
        }

        if(is_callable($restrict)) {
            return $_SESSION[$this->prefix . 'status'] && $restrict($this->getUsername(), $this->getLevel());
        }

        return $_SESSION[$this->prefix . 'status'];
    }

    /**
        * 登出
        *
        * @return void
        */
    public function logout()
    {
        $this->setUsername("guest");
        $this->setLevel("guest");
        $_SESSION[$this->prefix . 'status'] = false;
    }
}