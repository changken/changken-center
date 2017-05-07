<?php
require_once("config.inc.php");

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$level = "user"; //會員等級預設為普通會員
$password_md5 = md5($password); //密碼加密

$code = $member->reg($username, $email, $password, $password2, $password_md5, $level); //使用註冊函數

	switch ($code) 
	{
		case 0:
			echo "<span style=\"color:red;\">錯誤！使用者名稱不能為空！</span>";
			echo '<meta http-equiv="refresh" content="2; url=reg.php">';
		break;
		case 1:
			echo "<span style=\"color:red;\">錯誤！密碼不能為空！</span>";
			echo '<meta http-equiv="refresh" content="2; url=reg.php">';
		break;
		case 2:
			echo "<span style=\"color:red;\">錯誤！密碼(再輸入一次)不能為空！</span>";
			echo '<meta http-equiv="refresh" content="2; url=reg.php">';
		break;
		case 3:
			echo "<span style=\"color:red;\">錯誤！密碼輸入不一致！</span>";
			echo '<meta http-equiv="refresh" content="2; url=reg.php">';
		break;
		case 4:
			echo "<span style=\"color:green;\">註冊成功！</span>";
			echo '<meta http-equiv="refresh" content="2; url=reg.php">';
		break;
		case 5:
			echo "<span style=\"color:red;\">註冊失敗！</span>";
			echo '<meta http-equiv="refresh" content="2; url=reg.php">';
		break;
	}
