<?php

header("Content-type: text/html;charset=utf-8");
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$xml = $_POST["xml"];
$author = $_POST["author"];
$title = $_POST["title"];
$name = $_SESSION["name"];
$xml = str_replace("%2B", "+", $xml);
$xml = str_replace("%25", "%", $xml);
$xml = str_replace("%26", "&", $xml);
$filename = $name . time();
file_put_contents("../answer" . "/$filename", $xml);

$mypath = "../answer" . "/$filename";
if ($xml != "") {
    $link = mysql_connect("localhost", "root", "123456");
    if ($link) {
        mysql_select_db("mywork", $link);
        $sql = "insert into answer(name,address,articalTitle,articalauthor) values('$name','$mypath','$title','$author')";
        $result = mysql_query($sql);
        $num = mysql_affected_rows();
        if (mysql_affected_rows() != -1) {
            $res = "success";
        } else {
            $res = "failed";
        }
    } else {
        $res = "failed";
    }
} else
    $res = "failed";
echo $res;
