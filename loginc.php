<?php
require_once("load.php");

$code = $member->login([
    'username' => $_POST['username'],
    'password' => $_POST['password']
]); //使用登入函數

	switch ($code) 
	{
		case 0:
		    $status = 0;
			$msg = "錯誤！使用者名稱不能為空！";
		break;
		case 1:
            $status = 0;
            $msg = "錯誤！密碼不能為空！";
		break;
		case 2:
            $status = 0;
            $msg = "錯誤！查無使用者或密碼錯誤！";
		break;
		case 3:
            $status = 1;
            $msg = "登入成功！您的會員權限為:普通會員";
            $redirectTo = "member.php";
            //session
			$session->login([
			    'username' => $_POST['username'],
                'level' => 'user'
            ]);
		break;
		case 4:
            $status = 1;
            $msg = "登入成功！您的會員權限為:管理員";
            $redirectTo = "member.php";
            //session
            $session->login([
                'username' => $_POST['username'],
                'level' => 'admin'
            ]);
		break;
		case 5:
            $status = 0;
            $msg = "登入失敗！";
		break;
	}

	//blade
	echo $view->view()->make('tpl.msg',[
	    'title' => '登入',
        'status' => $status,
        'msg' => $msg,
        'redirectTo' => (isset($redirectTo)) ? $redirectTo : "login.php"
    ])->render();
