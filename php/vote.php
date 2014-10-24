<?php

session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$name = $_SESSION["name"];
$address = $_GET["address"];
$link = mysql_connect("localhost", "root", "123456");
$res = "failed";
if ($link) {
    mysql_select_db("mywork", $link);
    $sql = "insert into vote values('$name','$address')";
    $result = mysql_query($sql);
    $num = mysql_affected_rows();
    if ($num == -1) {
        $res = "failed";
    } else {
        $fileaddress = "../question/" .$address;
        $xml = simplexml_load_file($fileaddress);
        $voteNum = (int) ($xml->vote) + 1;
        $xml->vote = $voteNum;
        $xml->saveXML($fileaddress);
        $res = "success";
    }
} else {
    $res = "failed";
}
print ($res);
?>