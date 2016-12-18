#changken會員系統

版本:v1.2

作者:changken

電郵:admin@changken.biz

部落格:https://changken.biz

本軟體最後更新日期:2016.6.18

#如何安裝？

1.填寫完config.php後，再匯入table.sql(使用phpmyadmin)

2.即可使用！

#如何將帳號權限調整至"管理員"？

請使用phpmyadmin，選擇你想要給管理員權限的帳號，按"編輯"，level欄位更改至"admin"即可。

#權限示意圖:

項目\權限類別     管理員  一般會員   訪客
新增會員            O         O       O
編輯自己的帳號      O         O       X
刪除會員            O         X       X

#開發者資訊(api函數):

member::login() 登入函數

member::reg() 註冊函數

member::update() 更新帳號資訊函數

member::delete_u() 刪除帳號函數(限管理員使用)

member::logout() 登出函數

member::getUserinfoBn()取得使用者資訊函數

member::getuser_row['NO'] 使用者編號

member::getuser_row['username'] 使用者名稱

member::getuser_row['email'] 使用者電郵

member::getuser_row['password'] 使用者密碼(md5)

member::getuser_row['level'] 使用者等級(普通會員=>user、管理員=>admin)

$_SESSION['username'] 紀錄使用者名稱

$_SESSION['level'] 紀錄使用者權限

#授權方式？

於LICENSE檔案中說明。