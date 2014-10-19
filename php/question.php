<?php
header("Content-type: text/html;charset=utf-8");
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$xml = $_POST["xml"];
$name = $_POST["author"];
$title = $_POST["title"];
$filename = "";
if (is_dir("../question/" . $name)) {
    $filename = $name . time();
    file_put_contents("../question" . "/$name" . "/$filename", $xml);
} else {
    mkdir("../question" . "/$name");
    $filename = $name . time();
    file_put_contents("../question" . "/$name" . "/$filename", $xml);
}
$mypath="../question" . "/$name" . "/$filename";
if ($xml != "") {
    $link = mysql_connect("localhost", "root", "123456");
    if ($link) {
        mysql_select_db("mywork", $link);
        $sql = "insert into question(title,address,authorname) values('$title','$mypath','$name')";
        $result = mysql_query($sql);
        $num = mysql_affected_rows();
        if (mysql_affected_rows() != -1) {
            $res = "success";
        }else{
            $res = "failed";
        }
    } else {
        $res = "failed";
    }
} else
    $res = "failed";
echo $res;

