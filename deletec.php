<?php
require_once("load.php");

if($session->check(function ($user, $level) {
    return $level == "admin";
})){

    $code = $member->delete_u($_POST['username']);//使用刪除函數

	switch ($code) 
	{
		case 0:
		    $status = 0;
			$msg = "使用者不能為空！";
			$redirectTo = "delete.php";
		break;
		case 1:
            $status = 0;
            $msg = "使用者不存在！";
            $redirectTo = "delete.php";
		break;
		case 2:
            $status = 1;
            $msg = "刪除成功！";
            $redirectTo = "member.php";
		break;
		case 3:
            $status = 0;
            $msg = "刪除失敗！";
            $redirectTo = "member.php";
		break;
	}
}
else
{
    $status = 0;
    $msg = "帳號權限不足或您尚未登入！";
    $redirectTo = "login.php";
}

//blade
echo $view->view()->make('tpl.msg',[
    'title' => '刪除會員',
    'status' => $status,
    'msg' => $msg,
    'redirectTo' => $redirectTo
])->render();
