<?php
require_once("load.php");

if($session->check())
{
    $row = $member->getUserinfoBn($_POST['username']);

    $code = $member->update([
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => ($_POST['password'] == null) ? $row['password'] : md5($_POST['password']),
        'level' => $_POST['level'] //會員等級不可更改
    ]); //使用更新帳號資訊函數

    switch ($code) {
        case 0:
            echo "<span style=\"color:green;\">更新成功！</span>";
            echo '<meta http-equiv="refresh" content="2; url=member.php">';
            break;
        case 1:
            echo "<span style=\"color:red;\">更新失敗！</span>";
            echo '<meta http-equiv="refresh" content="2; url=member.php">';
            break;
    }
}
else
{
    echo "<span style=\"color:red;\">您尚未登入！</span>";
    echo '<meta http-equiv="refresh" content="2; url=login.php">';
}
