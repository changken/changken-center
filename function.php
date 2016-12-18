<?php
/**
 *changken會員系統專用函數庫
 *簡介:為促進程式開發人員方便開發，changken特別製作專用函數庫。
 *作者:changken 
 *使用方式:請將函數直接複製即可。注意！一定要引入此函數庫，不然不能使用！
 *函數:reg()、login()、update()、delete_u()、logout()、getUserinfoBn()
 *版本:v1.2
 */
require_once("config.inc.php");
class member
{	
	var $reg;
	var $reg_sql;
	var $login;
	var $login_sql;
	var $login_row;
	var $update;
	var $update_sql;
	var $delete_u;
	var $delete_sql;
	var $getuser_sql;
	var $getuser;
	var $getuser_row;
	var $version_value = "12";

	function __construct()
	{
		//not thing
	}
	//函數庫版本顯示函數
	function version_show()
	{
		echo "版本:v1.2";
	}
	//註冊函數
	function reg($username,$email,$password,$password2,$password_md5,$level)
	{
		global $db;
		if($username==null)
		{
			echo"<span style=\"color:red;\">錯誤！使用者名稱不能為空！</span>";
			echo'<meta http-equiv="refresh" content="2; url=reg.php">';
		}
		elseif($password==null)
		{
			echo"<span style=\"color:red;\">錯誤！密碼不能為空！</span>";
			echo'<meta http-equiv="refresh" content="2; url=reg.php">';
		}
		elseif($password2==null)
		{
			echo"<span style=\"color:red;\">錯誤！密碼(再輸入一次)不能為空！</span>";
			echo'<meta http-equiv="refresh" content="2; url=reg.php">';
		}
		elseif($password!=$password2)
		{
			echo"<span style=\"color:red;\">錯誤！密碼輸入不一致！</span>";
			echo'<meta http-equiv="refresh" content="2; url=reg.php">';
		}
		else
		{
			$this->reg_sql="INSERT INTO `user` (`username`, `email`, `password`, `level`) VALUES (:username, :email, :password_md5, :level);";
			$this->reg = $db->prepare($this->reg_sql); 
			$this->reg->bindParam(":username",$username);
			$this->reg->bindParam(":email",$email);
			$this->reg->bindParam(":password_md5",$password_md5);
			$this->reg->bindParam(":level",$level);
			if($this->reg->execute())
			{
				echo"<span style=\"color:green;\">註冊成功！</span>";
				echo'<meta http-equiv="refresh" content="2; url=reg.php">';
			}
			else
			{
				echo"<span style=\"color:red;\">註冊失敗！</span>";
				echo'<meta http-equiv="refresh" content="2; url=reg.php">';
			}
		}
	}
	//登入函數
	function login($username,$password,$password_md5)
	{
		global $db;
		$this->login_sql="SELECT * FROM `user` WHERE `username`=:username AND `password`=:password_md5;";
		$this->login = $db->prepare($this->login_sql);
		$this->login->bindParam(":username", $username);
		$this->login->bindParam(":password_md5", $password_md5);
		$this->login->execute();
		$this->login_row = $this->login->fetch();
		if($username==null)
		{
			echo"<span style=\"color:red;\">錯誤！使用者名稱不能為空！</span>";
			echo'<meta http-equiv="refresh" content="2; url=login.php">';
		}
		elseif($password==null)
		{
			echo"<span style=\"color:red;\">錯誤！密碼不能為空！</span>";
			echo'<meta http-equiv="refresh" content="2; url=login.php">';
		}
		elseif($username!=$this->login_row['username'] or $password_md5!=$this->login_row['password'])
		{
			echo"<span style=\"color:red;\">錯誤！查無使用者或密碼錯誤！</span>";
			echo'<meta http-equiv="refresh" content="2; url=login.php">';
		}
		else
		{
			if($this->login_row['level']=="user")
			{
				echo"<span style=\"color:green;\">登入成功！</span>";
				echo"您的會員權限為:普通會員";
				echo'<meta http-equiv="refresh" content="2; url=member.php">';
				$_SESSION['username']=$username;
				$_SESSION['level']="user";
			}
			elseif($this->login_row['level']=="admin")
			{
				echo"<span style=\"color:green;\">登入成功！</span>";
				echo"您的會員權限為:管理員";
				echo'<meta http-equiv="refresh" content="2; url=member.php">';
				$_SESSION['username']=$username;
				$_SESSION['level']="admin";
			}
			else
			{
				echo"<span style=\"color:red;\">登入失敗！</span>";
				echo'<meta http-equiv="refresh" content="2; url=login.php">';
			}
		}
	}
	//更新帳號資訊函數
	function update($username,$email,$password_md5,$level)
	{
		global $db;
		$this->update_sql = "UPDATE `user` SET `email` = :email, `password` = :password_md5, `level` = :level WHERE `username` = :username;";
		$this->update = $db->prepare($this->update_sql);
		$this->update->bindParam(":email",$email);
		$this->update->bindParam(":password_md5",$password_md5);
		$this->update->bindParam(":level",$level);
		$this->update->bindParam(":username",$username);
		if($this->update->execute())
		{
			echo"<span style=\"color:green;\">更新成功！</span>";
			echo'<meta http-equiv="refresh" content="2; url=member.php">';
		}
		else
		{
			echo"<span style=\"color:red;\">更新失敗！</span>";
			echo'<meta http-equiv="refresh" content="2; url=member.php">';
		}
	}
	//刪除會員函數(限管理員可使用)
	function delete_u($username)
	{
		global $db;
		if($_SESSION['level']=="admin")
		{
			$this->delete_sql = "DELETE FROM user WHERE username = :username;";
			$this->delete_u = $db->prepare($this->delete_sql);
			$this->delete_u->bindParam(":username",$username);
			if($this->delete_u->execute())
			{
				echo"<span style=\"color:green;\">刪除成功！</span>";
				echo'<meta http-equiv="refresh" content="2; url=member.php">';
			}
			else
			{
				echo"<span style=\"color:red;\">刪除失敗！</span>";
				echo'<meta http-equiv="refresh" content="2; url=member.php">';
			}
		}
		elseif($_SESSION['level']=="user")
		{
			echo"<span style=\"color:red;\">帳號權限不足！</span><br />";
			echo"<span style=\"color:red;\">目前您的帳號權限為一般會員</span>";
			echo'<meta http-equiv="refresh" content="2; url=member.php">';
		}
		elseif($_SESSION['level']==null)
		{
			echo"<span style=\"color:red;\">您尚未登入！</span>";
			echo'<meta http-equiv="refresh" content="2; url=login.php">';
		}
	}
	//登出函數
	function logout()
	{
		unset($_SESSION['username']);
		unset($_SESSION['level']);
		echo "登出中...";
		echo'<meta http-equiv="refresh" content="2; url=login.php">';
	}
	//取得使用者資訊函數
	function getUserinfoBn($username)
	{
		global $db;
		$this->getuser_sql = "SELECT * FROM `user` WHERE `username`= :username;";
		$this->getuser = $db->prepare($this->getuser_sql);
		$this->getuser->bindParam(":username",$username);
		$this->getuser->execute();
		$this->getuser_row= $this->getuser->fetch();
		return  $this->getuser_row;
	}
}
?>