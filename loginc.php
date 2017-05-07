<?php
session_start();

require_once("config.inc.php");

$username = $_POST['username'];
$password = $_POST['password'];
$password_md5 = md5($password); //密碼加密

$code = $member->login($username, $password, $password_md5); //使用登入函數

	switch ($code) 
	{
		case 0:
			echo "<span style=\"color:red;\">錯誤！使用者名稱不能為空！</span>";
			echo '<meta http-equiv="refresh" content="2; url=login.php">';
		break;
		case 1:
			echo "<span style=\"color:red;\">錯誤！密碼不能為空！</span>";
			echo '<meta http-equiv="refresh" content="2; url=login.php">';
		break;
		case 2:
			echo "<span style=\"color:red;\">錯誤！查無使用者或密碼錯誤！</span>";
			echo '<meta http-equiv="refresh" content="2; url=login.php">';
		break;
		case 3:
			echo "<span style=\"color:green;\">登入成功！</span>";
			echo "您的會員權限為:普通會員";
			echo '<meta http-equiv="refresh" content="2; url=member.php">';
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "user";
		break;
		case 4:
			echo "<span style=\"color:green;\">登入成功！</span>";
			echo "您的會員權限為:管理員";
			echo '<meta http-equiv="refresh" content="2; url=member.php">';
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "admin";
		break;
		case 5:
			echo "<span style=\"color:red;\">登入失敗！</span>";
			echo '<meta http-equiv="refresh" content="2; url=login.php">';
		break;
	}
