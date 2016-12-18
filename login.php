<!DOCTYPE html>
<html lang="zh-TW">

	<head>
		<meta charset="UTF8">
		<title>登入</title>
	</head>

	<body>
		<h1 style="text-align: center;">登入</h1>
		<div style="text-align: center;">
			<form method="post" action="loginc.php" name="login">
				<table style="text-align: center; width: 100px; margin-left: auto; margin-right: auto;" border="1" cellpadding="2" cellspacing="2">
					<tbody>
						<tr>
							<td style="vertical-align: top;">
								使用者:<input name="username" type="text"><br>
								密碼:<input name="password" type="password"><br>
								<input name="login" value="登入" type="submit"><br>
								沒有帳號？<a href="reg.php">註冊</a>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</body>

</html>