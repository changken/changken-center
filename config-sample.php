<?php
//database config
define("DB_TYPE","mysql");//mysql || sqlite
define("DB_HOSTNAME","database hostname");
define("DB_NAME","database name");
define("DB_USERNAME","database username");
define("DB_PASSWORD","database password");
define("DB_CHARSET","utf8");

//path config
define("ROOT_PATH", __DIR__ . "/");
define("VIEWS_PATH", ROOT_PATH . "/blade/views");
define("CACHE_PATH", ROOT_PATH . "/blade/cache");

//url config
define("URL", "http://localhost");