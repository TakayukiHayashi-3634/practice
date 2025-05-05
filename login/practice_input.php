<!DOCTYPE html> 
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>php制作</title>
	</head>
	
	<body>
		<form action="practice.php" method="post">

            ID　　　　：<input type="text" name="id"><br>
			
			パスワード：<input type="password" name="password"><br>
		
            <input type="submit" value="ログイン"><br>
		</form>

		初めてログインする方は<a href ="login/create/set_pass.php">ここ</a>をクリック<br>
		パスワードを忘れた方は<a href ="login/reset/forget_pass.php">ここ</a>をクリック
	</body>
</html>