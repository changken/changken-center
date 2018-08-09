<?php
/**
 * MySQL connect class
 *
 *@author changken admin@changken.org
 *@version v2.0.0 dev-1
 * @date 2018/8/9
 * @since  v2.0.0 dev-1 see git
 */

class MySQLConnect extends DBconnect
{
    /**
        * 連線資料庫
        *
        * @return void
        */
    public function setConnect()
    {
        $dsn = sprintf('%s:host=%s;dbname=%s;charset=%s', DB_TYPE, DB_HOSTNAME, DB_NAME, DB_CHARSET);
        try {
            $this->connect = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}