<!DOCTYPE html> 
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>php制作</title>
	</head>
	
	<body>
		<p>IDとパスワードを設定します。<br>
		IDとパスワードを入力してください。
		</p>
		
		<form action="set_pass.php" method="post">

			ID　　　　：<input type="text" name="id"><br>
	
            パスワード：<input type="text" name="pass"><br>
			
			秘密の質問：
			<select name="secret">
				<option value="ペット">飼っていペットの名前</option>
				<option value="出身">出身</option>
				<option value="習い事">子供のころの習っていたこと</option>
			</select><br>
			　　　　　　<input type="text" name="serectText"><br>

            <input type="submit" value="送信">
		</form>
	</body>
</html>