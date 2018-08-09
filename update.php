<?php
require_once("load.php");
$row = $member->getUserinfoBn($session->getUsername());
?>
<!DOCTYPE html>
<html lang="zh-TW">

	<head>
		<meta charset="UTF8">
		<title>更新帳號資訊</title>
	</head>

	<body>
		<h1 style="text-align: center;">更新帳號資訊</h1>
		<div style="text-align: center;">
		<?php if($session->check()):?>
			<form method="post" action="updatec.php" name="reg">
				<table style="text-align: center; width: 100px; margin-left: auto; margin-right: auto;" border="1" cellpadding="2" cellspacing="2">
					<tbody>
						<tr>
							<td style="vertical-align: top;">
								使用者:<input name="username" type="text" readonly="readonly" value="<?=$row['username'];?>"><br>
								email:<input name="email" type="text" value="<?=$row['email'];?>"><br>
								密碼:<input name="password" type="password"><br>
								<input name="level" type="hidden" value="<?=$row['level'];?>"><br>
								<input name="reg" value="更新" type="submit"><br>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		<?php else:?>
			<span style="color:red;">您尚未登入！</span>
		<?php endif;?>
		</div>
	</body>

</html>