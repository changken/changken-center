<?php 
session_start();

require_once("config.inc.php");

$username = $_POST['username'];

$code = $member->delete_u($username);//使用刪除函數

	switch ($code) 
	{
		case 0:
			echo "<span style=\"color:red;\">使用者不能為空！</span>";
			echo '<meta http-equiv="refresh" content="2; url=delete.php">';
		break;
		case 1:
			echo "<span style=\"color:red;\">使用者不存在！</span>";
			echo '<meta http-equiv="refresh" content="2; url=delete.php">';
		break;
		case 2:
			echo "<span style=\"color:green;\">刪除成功！</span>";
			echo '<meta http-equiv="refresh" content="2; url=member.php">';
		break;
		case 3:
			echo "<span style=\"color:red;\">刪除失敗！</span>";
			echo '<meta http-equiv="refresh" content="2; url=member.php">';
		break;
		case 4:
			echo "<span style=\"color:red;\">帳號權限不足！</span><br />";
			echo "<span style=\"color:red;\">目前您的帳號權限為一般會員</span>";
			echo '<meta http-equiv="refresh" content="2; url=member.php">';
		break;
		case 5:
			echo "<span style=\"color:red;\">您尚未登入！</span>";
			echo '<meta http-equiv="refresh" content="2; url=login.php">';
		break;		
	}
	