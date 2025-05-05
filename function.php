<?php
// XSS対策としてhtmlspecialcharsをかける関数
// 戻り値としてエスケープ済みの文字列を返します
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

// XSS対策としてhtmlspecialcharsをかけ、それをprintする関数
// 戻り値はありません
function ph($str)
{
    print h($str);
}