<?php
//クロスサイトスクリプション対策の関数ファイル読み込み
//require_once("function/InputCheck.php");
//require_once("login/Presonal_Information.php");

//最初にこのページにアクセスされないように
//されたらpracticeに飛ぶような場合分けを書く

//アイコンかニックネームが未登録の場合
//print "AAAAAAAA";
//print $presonalInfo->GetId();

if($presonalInfo->GetNickname() == "" || $presonalInfo->getIcon() == "")
{
    require_once("login/create/Infor_input.php");
}
else
{
    print "入力完了";
}


//初めてアクセス時
//if(empty($_POST))
//{
//    require_once("login/practice_input.php");
//}
//else
//{
//	//ファイルの数だけ回す
//	for($i = 0;$i < $file_num;$i++)
//	{
//		//保存したdataフォルダのidと入力が一致したら
//		if((($fileIDPass[$i][ID] == $_POST["id"] ?? 0) && ($fileIDPass[$i][PASS] == $_POST["password"] ?? 0)))
//		{	
//			$IDPassFlag = true;
//			$_SESSION["login"] = $fileIDPass[$i][ID];
//			//誰のページを開くか保存
//			$parsonID = $i;
//			$parsonName ="ID:{$_POST['id']}さん";
//
//			//ログインしたアカウントの情報を記録するインスタンスを生成
//			$presonalInfo = new Presonal_Information($_POST["id"],$_POST["password"],$fileIDPass[$i][SERECT]);
//
//			require_once("login/practice_loginpage.php");
//		}
//	}
//	//IDかパスが間違っていた時
//	if(!$IDPassFlag)
//	{
//		$_SESSION["login"] = false;
//		print h("idかpsswordが違います");
//		require_once("login/practice_input.php");
//	}
//}