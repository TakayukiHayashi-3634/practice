<!DOCTYPE html> 
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>ニックネームの登録</title>
	</head>
	
	<body>
		<p>ニックネームとアイコンを設定してください。
		</p>
		
		<form action="login/login.php" method="post">

			ニックネーム　　　　：<input type="text" name="nic"><br>

            お好きなアイコンを選択してください。<br><br>
            <input type="radio" name="icon" value="iconA" checked="checked">A<img src="icon/A.png" width="75" height="75" alt="iconA">
			<input type="radio" name="icon" value="iconB">B<img src="icon/B.png" width="75" height="75" alt="iconB">
			<input type="radio" name="icon" value="iconC">C<img src="icon/C.png" width="75" height="75" alt="iconC">
			<input type="radio" name="icon" value="iconD">D<img src="icon/D.png" width="75" height="75" alt="iconD"><br><br>
            <input type="submit" value="送信">
		</form>
	</body>
</html>