<!DOCTYPE html> 
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>パスワード設定ページ２</title>
	</head>
	
	<body>
		<form action="re_pass.php" method="post">
			<p>
				IDと質問を確認しました。<br>
				パスワードを再設定してください。
			</p>
			再設定パスワード：<input type="text" name="newPass"><br>
			
			<?php print "<input type=\"hidden\" name=\"storeID\" value=\"{$storeID}\"><br>"?>

			<input type="submit" value="設定">
		</form>
	</body>
</html>