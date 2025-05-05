<!DOCTYPE html> 
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>パスワード設定ページ２</title>
	</head>
	
	<body>
		<p>
			IDと質問を確認しました。<br>
			パスワードを再設定してください。
		</p>

		<form action="forget_pass.php" method="post">
			
			再設定パスワード：<input type="text" name="new"><br>
			
			<input type="submit" value="設定">
		</form>
	</body>
</html>