<?php
/**
 * SQLite connect class
 *
 *@author changken admin@changken.org
 *@version v2.0.0 dev-1
 * @date 2018/8/9
 * @since  v2.0.0 dev-1 see git
 */

class SQLiteConnect extends DBconnect
{
    /**
        * 連線資料庫
        *
        * @return void
        */
    public function setConnect()
    {
        $dsn = sprintf("%s:%s", DB_TYPE, DB_NAME);
        try {
            $this->connect = new PDO($dsn);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}