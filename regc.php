<?php 
require_once("function.php");//引入函數庫
$member = new member();
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$level = "user";//會員等級預設為普通會員
$password_md5 = md5($password); //密碼加密
$member->reg($username,$email,$password,$password2,$password_md5,$level);//使用註冊函數
?>