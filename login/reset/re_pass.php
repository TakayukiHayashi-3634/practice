<?php
//クロスサイトスクリプション対策の関数ファイル読み込み
require_once("../../function/InputCheck.php");

//ID,パスの要素番号用の定数
$id = 0;
$pass = 1;
$secret = 2;

//ID,パスの要素番号用の定数
//ファイル操作に使う変数
$fileStore;
$fileArray;
$fileIDPass;

//glob関数ディレクトリ内のファイル一覧を配列で取得
$allFile = glob("../../data/*");
//ファイルの数を取得
$fileNum = count($allFile);

//初めてアクセス時
if($_POST["newPass"] == "")
{
    require_once("re_pass_input.php");
}
else
{
	//var_dump($_POST["newPass"]);
	//パスワードが再設定されていたら
	if($_POST["newPass"] != null)
	{
		//ファイルを読み込む
		for($i = 0;$i < $fileNum;$i++)
		{
			//ファイル読み込み
			$file = fopen( "../../data/{$i}.txt", "r");
			flock($file,LOCK_EX);
			while($line = fgets($file,1024))
			{
				//ファイルの中身を保存
				$fileStore[$i] = $line;
			}
			flock($file,LOCK_UN);
			fclose($file);
			//ファイルの中身を/ごとに配列にする
			$fileArray = explode("/",$fileStore[$i]);

			//$fileIDPassの[0][0]がID,[0][1]がPass,[0][2]が秘密の質問になるように格納
			for($j = 0;$j < count($fileArray);$j++)
			{
				$fileIDPass[$i][$j] = $fileArray[$j];
			}

			for($j = 0;$j < count($fileArray);$j++)
			{
				//パスワードを変更したいIDを見つけたとき
				if($fileIDPass[$i][0] == $_POST["storeID"])
				{
					$fileIDPass[$i][1] = $_POST["newPass"];

					//ファイルがなかったら作成して書き込み
					$file = fopen( "../../data/{$i}.txt", "w");
					flock($file,LOCK_EX);
					fwrite($file,"{$fileIDPass[$i][$id]}/{$fileIDPass[$i][$pass]}/{$fileIDPass[$i][$secret]}");
					flock($file,LOCK_UN);
					fclose($file);

					require_once ("re_pass_output.php");
					break;
				}
			}
		}
	}
	else
	{
		//設定フォームに戻る
		print h("入力された新しいIDの形式が正しくありません。");
		//ページ2のインプットに移動
		require_once ("forget_pass_input_page2.php");
	}
}