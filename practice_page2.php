<!DOCTYPE html> 
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>php制作_個人ページ</title>
	</head>
	
    <!--このファイルは分離で来ていない-->
	<body>
        <?php
            //クロスサイトスクリプション対策の関数ファイル読み込み
            require_once("function/InputCheck.php");
            
            //セッションの開始
            session_start();
            
            //nullではなくログインしていたら
            if($_SESSION["login"] ?? false)
            {
                $str = "ID:{$_SESSION["login"]}さんの詳細ページです。";
                //for文回す
                //ファイル探す
                //$_GETとファイル名が一致している
                if($_GET["id"] != null)
                {
                    ph ($str);
                    print "<br><a href=\"practice.php\">クリック</a>でログインページに戻る ";	
                }
            }
            //していなかったら
            else
            {
                $error_msg = "このページにはアクセスできません";
                require_once("practice_output_error.php");
            }

        ?>
        <br>
    </body>
</html>