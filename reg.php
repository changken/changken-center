<!DOCTYPE html>
<html lang="zh-TW">

	<head>
		<meta charset="UTF8">
		<title>註冊</title>
	</head>

	<body>
		<h1 style="text-align: center;">註冊</h1>
		<div style="text-align: center;">
			<form method="post" action="regc.php" name="reg">
				<table style="text-align: center; width: 100px; margin-left: auto; margin-right: auto;" border="1" cellpadding="2" cellspacing="2">
					<tbody>
						<tr>
							<td style="vertical-align: top;">
								使用者:<input name="username" type="text"><br>
								email:<input name="email" type="text"><br>
								密碼:<input name="password" type="password"><br>
								密碼(再輸入一次):<input name="password2" type="password"><br>
								<input name="reg" value="註冊" type="submit"><br>
								已有帳號？<a href="login.php">登入</a>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</body>

</html>