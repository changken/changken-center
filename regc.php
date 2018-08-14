<?php
require_once("load.php");

$code = $member->reg([
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'password2' => $_POST['password2'],
    'level' => 'user' //會員等級預設為普通會員
]); //使用註冊函數

	switch ($code) 
	{
		case 0:
		    $status = 0;
		    $msg = "錯誤！使用者名稱不能為空！";
		break;
		case 1:
            $status = 0;
			$msg =  "錯誤！密碼不能為空！";
		break;
		case 2:
		    $status = 0;
			$msg = "錯誤！密碼(再輸入一次)不能為空！";
		break;
		case 3:
		    $status = 0;
			$msg = "錯誤！密碼輸入不一致！";
		break;
		case 4:
		    $status = 1;
			$msg = "註冊成功！";
		break;
		case 5:
		    $status = 0;
			$msg = "註冊失敗！";
		break;
	}

	//blade
	echo $view->view()->make('tpl.msg',[
	    'title' => '註冊',
        'status' => $status,
        'msg' => $msg,
        'redirectTo' => 'reg.php'
    ])->render();
