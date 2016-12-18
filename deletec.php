<?php 
session_start();
require_once("function.php");//引入函數庫
$member = new member();
$username = $_POST['username'];
$member->delete_u($username);//使用刪除函數
?>