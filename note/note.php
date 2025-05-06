<?php
//クロスサイトスクリプション対策の関数ファイル読み込み
require_once("../function/InputCheck.php");

//セッションの開始
session_start();

//初めてアクセス時
if(empty($_POST))
{
    require_once("login/practice_input.php");
}
else
{
    
}