<?php
//ログイン後開いている人のIDとパスワードを保存するクラス
class Personal_Information
{
    private $id;
    private $password;
    private $serect;
    private $nickname;
    private $icon;

    //コンストラクタ
    public function __construct($id,$password,$serect,$nickname ="",$icon ="")
    {
        $this->id = $id;
        $this->password = $password;
        $this->serect = $serect;
        $this->nickname = $nickname;
        $this->$icon = $icon;
    }

    //ゲッター
    public function GetId()
    {
        return $this->id;
    }
    public function GetPassword()
    {
        return $this->password;
    }
    public function GetSerect()
    {
        return $this->serect;
    }
    public function GetNickname()
    {
        return $this->nickname;
    }
    public function GetIcon()
    {
        return $this->icon;
    }

    //セッター
    public function SetId($id)
    {
        $this->id = $id;
    }
    public function SetPassword($password)
    {
        $this->password = $password;
    }
    public function SetSerect($serect)
    {
        $this->serect = $serect;
    }
}