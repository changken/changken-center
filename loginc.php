<?php 
session_start();
require_once("function.php");//引入函數庫
$member = new member();
$username = $_POST['username'];
$password = $_POST['password'];
$password_md5 = md5($password); //密碼加密
$member->login($username,$password,$password_md5);//使用登入函數
?>