<?php

class SQLiteConnect extends DBconnect
{
    /**
        * 連線資料庫
        *
        * @return void
        */
    public function setConnect()
    {
        $dsn = sprintf("%s:%s;charset=%s", DB_TYPE, DB_NAME, DB_CHARSET);
        try {
            $this->connect = new PDO($dsn);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}