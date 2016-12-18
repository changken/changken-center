<?php 
session_start();
require_once("function.php");//引入函數庫

$member = new member();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$level = $_POST['level'];//會員等級不可更改

$member->getUserinfoBn($username);

if($password==null)
{
	$password_md5 = $member->getuser_row['password'];
}
else
{
	$password_md5 = md5($password);
}
$member->update($username,$email,$password_md5,$level);//使用更新帳號資訊函數
?>