<?php
//クロスサイトスクリプション対策の関数ファイル読み込み
require_once("function.php");

//セッションの開始
session_start();

//初めてアクセス時
if(empty($_POST))
{
    require_once("set_pass_input.php");
}
else
{
	//IDとpassの体裁がオッケーだったら
	if($_POST["id"] != null && $_POST["pass"] != null)
	{
		//セッションに設定
		$_SESSION["id"] = $_POST["id"];
		$_SESSION["pass"] = $_POST["pass"];

		//IDとパスワードの設定
        $set_id = $_POST["id"];
        $set_pass = $_POST["pass"];
		$set_secret = $_POST["serectText"];

		//IDとパスをテキストに保存して管理
		//glob関数ディレクトリ内のファイル一覧を配列で取得
		$all_file = glob("data/*");
		//ファイルの数を取得
		$file_num = count($all_file); 

		//ファイルがなかったら作成して書き込み
		$file = fopen( "./data/{$file_num}.txt", "a");
		flock($file,LOCK_EX);
		fwrite($file,"{$set_id}/{$set_pass}/{$set_secret}");
		flock($file,LOCK_UN);
		fclose($file);

		//アウトプットに移動
		require_once ("set_pass_output.php");
	}
	else
	{
		//設定フォームに戻る
		print h("入力されたIDかパスワードが正しくありません");

		require_once("set_pass_input.php");
	}
}