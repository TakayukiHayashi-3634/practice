<?php
//クロスサイトスクリプション対策の関数ファイル読み込み
require_once("function.php");

//セッションの開始
session_start();

//入力したidとpassを格納する変数

$_SESSION["login"] = false;

//ID,パスの要素番号用の定数
const ID = 0;
const PASS = 1;

//ファイル操作に使う変数
$fileStore;
$fileArray;
$fileIDPass;

$IDPassFlag = false;

//glob関数ディレクトリ内のファイル一覧を配列で取得
$all_file = glob("data/*");
//ファイルの数を取得
$file_num = count($all_file); 
//テキストとして保存した複数のパスとIDを管理したい
//ファイルの数だけ回す
for($i = 0;$i < $file_num;$i++)
{
	//ファイル読み込み
	$file = fopen( "./data/{$i}.txt", "r");
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

//初めてアクセス時
if(empty($_POST))
{
    require_once("practice_input.php");
}
else
{
	//ファイルの数だけ回す
	for($i = 0;$i < $file_num;$i++)
	{
		//保存したdataフォルダのidと入力が一致したら
		if((($fileIDPass[$i][ID] == $_POST["id"] ?? 0) && ($fileIDPass[$i][PASS] == $_POST["password"] ?? 0)))
		{	
			$IDPassFlag = true;
			$_SESSION["login"] = $fileIDPass[$i][ID];
			//$_GET["id"] = $fileIDPass[$i][ID];
			//誰のページを開くか保存
			$parsonID = $i;
			$parsonName ="ID:{$_POST['id']}さん";

			require_once("practice_loginpage.php");

			//header("Location:practice_page2.php");
		}
	}
	//IDかパスが間違っていた時
	if(!$IDPassFlag)
	{
		$_SESSION["login"] = false;
		print h("idかpsswordが違います");
		require_once("practice_input.php");
	}
}