<?php
require_once('load.php');
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
			<?php if($session->check()):?>
				<p><a href="reg.php">新增會員</a>     <a href="update.php">更新帳號資訊</a>     <a href="delete.php">刪除會員</a>     <a href="logout.php">登出【<?=$session->getUsername();?>】</a></p>
				<p>歡迎使用會員中心！！！</p>
				<p>您現在的權限是:<?=$session->getLevel();?></p>
			<?php else: ?>
				<span style="color:red;">您尚未登入！</span>
			<?php endif; ?>
		</div>
	</body>

</html>