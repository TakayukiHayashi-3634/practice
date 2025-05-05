<?php
//クロスサイトスクリプション対策の関数ファイル読み込み
require_once("../../function/InputCheck.php");

//practiceでも読み込みをしているため関数かクラスにできるかも

//セッションの開始
session_start();

//ID,パスの要素番号用の定数
const ID = 0;
const PASS = 1;
const SECRET = 2;

//ファイル操作に使う変数
$fileStore;
$fileArray;
$fileIDPass;

//glob関数ディレクトリ内のファイル一覧を配列で取得
$allFile = glob("../../data/*");
//ファイルの数を取得
$fileNum = count($allFile);

//初めてアクセス時
if(empty($_POST))
{
    require_once("forget_pass_input.php");
}
else
{
	//入力されたIDと秘密の質問が一致していたらパスワードを再設定したい
	if($_POST["id"] != null && $_POST["secret"] != null && $_POST["secretText"] != null)
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
		}

		for($i = 0;$i < $fileNum;$i++)
		{
			//入力されたIDと秘密の質問が一致していたら
			if($_POST["id"] == $fileIDPass[$i][ID] && $_POST["secretText"] == $fileIDPass[$i][SECRET])
			{
				$storeID = $fileIDPass[$i][ID];
				//再設定するページに移動
				require_once ("re_pass.php");
				break;
			}
		}
	}
	else
	{
		//設定フォームに戻る
		print h("入力されたIDかパスワードが正しくありません");

		require_once("forget_pass_input.php");
	}
}