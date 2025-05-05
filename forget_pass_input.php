<!DOCTYPE html> 
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>パスワード再設定</title>
	</head>
	
	<body>
		<form action="forget_pass.php" method="post">

            <p>
				パスワードを再設定します。<br>質問に答えてください<br>
			</p>

			ID　　　　：<input type="text" name="id"><br>
	
			秘密の質問：
			<select name="secret">
				<option value="ペット">飼っていペットの名前</option>
				<option value="出身">出身</option>
				<option value="習い事">子供のころの習っていたこと</option>
			</select><br>
			　　　　　　<input type="text" name="secretText"><br>
			<input type="hidden" name="newPass" value=""><br>

			<input type="submit" value="送信">
		</form>
	</body>
</html>