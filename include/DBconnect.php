<?php

abstract class DBconnect
{
    /**
        * @var PDO $connect PDO實例
        */
	protected $connect;

    /**
        * DBconnect 建構子
        *
        * @return void
        */
    public function __construct()
    {
        $this->setConnect();
    }

    /**
        * 連線資料庫
        *
        * @return void
        */
	abstract public function setConnect();

	/**
        *  得到PDO實例(getter)
	*
        * @return PDO
        */
    public function getConnect()
    {
        return $this->connect;
    }
}
