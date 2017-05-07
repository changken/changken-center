<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zh-TW">

	<head>
		<meta charset="UTF8">
		<title>會員中心</title>
	</head>

	<body>
		<h1 style="text-align: center;">會員中心</h1>
		<div style="text-align: center;">
			<?php 
			if(isset($_SESSION['level'])) //2016.5.21
			{
			?>
				<p><a href="reg.php">新增會員</a>     <a href="update.php">更新帳號資訊</a>     <a href="delete.php">刪除會員</a>     <a href="logout.php">登出【<?php echo $_SESSION['username'];?>】</a></p>
				<p>歡迎使用會員中心！！！</p>
				<p>您現在的權限是:<?php echo $_SESSION['level'];?></p>
			<?php
			}
			else
			{
			?>
				<span style="color:red;">您尚未登入！</span>
			<?php
			}
			?>
		</div>
	</body>

</html>