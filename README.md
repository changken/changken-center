# changken會員系統 #

版本:v2.0.0dev-2

作者:changken

電郵:admin@changken.org

部落格:https://changken.org

本軟體最後更新日期:2018.8.14

# 需求 #

* php 7以上
* pdo
* composer
* mysql 或 sqlite

# 如何安裝？ #

    //windows
    C:\Users\User\Desktop>copy config-sample.php config.php 
    //unix
    $ cp config-sample.php config.php 
    
    //windows
    C:\Users\User\Desktop>composer install
    C:\Users\User\Desktop>npm install
    //unix
    $ composer install
    $ npm install

a. 填寫完config.php後，再匯入sql/table.sql(mysql)或sql/sqlite.sql(sqlite)

> sqlite只需要填寫以下資料

    <?php
    define("DB_TYPE","sqlite");
    define("DB_NAME","database.db");

> 如果要使用mysql的話，請修改 Changken/Providers/CoreProvider.php
    
    <?php
    ...
    21 $this->container->bind('mysql', function (Container $container){
    22      return new MySQLConnect();
    23 });
    ...
    29 $this->container->bind('member', function(Container $container){
    30      return new Member($container->get('mysql'));
    31 });
    ...
    
b. 即可使用！Happy!

    //開啟bulit-in server(listen 8080 port)
    
    $ php -S localhost:8080
    //或者使用apache、nginx

# 如何將帳號權限調整至"管理員"？ #

1. 請使用phpmyadmin或其他管理軟體

2. 選擇你想要給管理員權限的帳號

3. 按"編輯"，level欄位更改至"admin"即可

# 權限示意圖: #

* 項目\權限     管理員  一般會員   訪客
* 新增會員            O         O       O
* 編輯自己的帳號      O         O       X
* 刪除會員            O         X       X

# 開發者資訊(api函數): #

類別:Member

Member::login() 登入函數

Member::reg() 註冊函數

Member::update() 更新帳號資訊函數

Member::delete_u() 刪除帳號函數(限管理員使用)

Member::getUserinfoBn()取得使用者資訊函數(會回傳一列使用者資訊)

類別:Session

Session::start() 開啟session

Session::login() 登入函數

Session::check() 檢查函數

Session::logout() 登出函數

Session::getUsername() 紀錄使用者名稱

Session::setUsername() 設定使用者名稱

Session::getLevel() 紀錄使用者權限

Session::setLevel() 設定使用者權限

>其中，我簡單做了一個(無用的)容器

Container::bind($name, $instance) 綁定一物件到容器中，可以使用callback函數

Container::get($name) 取得指定物件的實例，找不到則回傳null

>您可以在load.php中看到，我使用Container來管理物件

# 授權方式? #

1. v1.3版(含)之前採用「創用 CC 姓名標示-相同方式分享 4.0 國際 授權條款」來授權

2. v2.0版之後則改採用MIT授權，詳細的授權原文會在LICENSE檔案中。

# 免責聲明 #

本軟體僅供練習使用，請勿用於正式環境。

# 改了什麼? #

看看change.log.txt吧!

# 感謝 #
所採用的套件列表

1. https://github.com/PhiloNL/Laravel-Blade
2. https://github.com/laravel/framework
3. https://github.com/twbs/bootstrap
4. 待新增...

#  啟發 #
待新增...