<?php
require_once('load.php');
?>
<!DOCTYPE html>
<html lang="zh-TW">

	<head>
		<meta charset="UTF8">
		<title>刪除會員</title>
	</head>

	<body>
		<h1 style="text-align: center;">刪除會員</h1>
		<div style="text-align: center;">
			<?php if($session->check(function ($user, $level) {
			    return $level == "admin";
            })):?>
				<span style="color:red;">此動作不可回復！</span>
				<form method="post" action="deletec.php" name="delete">
					<table style="text-align: center; width: 100px; margin-left: auto; margin-right: auto;" border="1" cellpadding="2" cellspacing="2">
						<tbody>
							<tr>		
								<td style="vertical-align: top;">
									使用者:<input name="username" type="text"><br>
									<input name="delete" value="刪除" type="submit"><br>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			<?php else:?>
				<span style="color:red;">帳號權限不足或您尚未登入！</span>
			<?php endif;?>
		</div>
	</body>

</html>