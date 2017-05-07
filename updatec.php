<?php
session_start();

require_once("config.inc.php");

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$level = $_POST['level']; //會員等級不可更改

$row = $member->getUserinfoBn($username);

if ($password == null) 
{
	$password_md5 = $row['password'];
} 
else 
{
	$password_md5 = md5($password);
}

$code = $member->update($username, $email, $password_md5, $level); //使用更新帳號資訊函數

	switch ($code) 
	{
		case 0:
			echo "<span style=\"color:green;\">更新成功！</span>";
			echo '<meta http-equiv="refresh" content="2; url=member.php">';
		break;
		case 1:
			echo "<span style=\"color:red;\">更新失敗！</span>";
			echo '<meta http-equiv="refresh" content="2; url=member.php">';
		break;
	}
