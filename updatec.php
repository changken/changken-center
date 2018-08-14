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
            $status = 1;
            $msg = "更新成功！";
            break;
        case 1:
            $status = 0;
            $msg = "更新失敗！";
            break;
    }
}
else
{
    $status = 0;
    $msg = "您尚未登入！";
    $redirectTo = "login.php";
}

//blade
echo $view->view()->make('tpl.msg',[
    'title' => '更新會員資訊',
    'status' => $status,
    'msg' => $msg,
    'redirectTo' => (isset($redirectTo)) ? $redirectTo : "member.php"
])->render();
