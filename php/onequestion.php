<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$name = $_SESSION["name"];
$filename = $_GET["art"];
$address = "../question/$filename";
if (file_exists($address)) {
    $xml = simplexml_load_file($address);
    echo ""
    . "<div class='art-head' id='art-title'>"
    . "$xml->title"
    . "</div>"
    . "<div class='author-wrapper'>"
    . "<a class='author-ref' id='art-author' href='#'>" . $xml->author . "</a>"
    . "</div>"
    . "<div class='art-text'>"
    . "$xml->content"
    . "</div>";
    echo "<div class='tag-head'>";
    if ($xml->tag) {
        $arr = $xml->tag;
        foreach ($arr as $tep) {
            echo"<div class='tag'>"
            . "$tep"
            . "</div>";
        }
    };
    echo "</div>"
    . "<div class=content-bottom>"
    . "<div class='gift-score'>"
    . "悬赏分数： $xml->score"
    . "</div>"
    . "<div class='vote-heart'onclick='vote();'></div>"
    . "<div class='art-vote' id='votenumber'>"
    . "赞同数： $xml->vote"
    . "</div>"
    . "<input style='display:none' id='voteaddress'value=$filename />"
    . "</div>"
    ;
    $link = mysql_connect("localhost", "root", "123456");
    if ($link) {
        mysql_select_db("mywork", $link);
        $sql = "select * from answer where articalTitle='$filename'";
        $result = mysql_query($sql);
        $num = mysql_affected_rows();
        if (mysql_affected_rows() > 0) {
            while ($row = mysql_fetch_array($result)) {
                $answerAdd = $row[1];
                $answerAu = $row[0];
                $xml = simplexml_load_file($answerAdd);
                echo""
                . "<div class='answerlist-wrapper'>"
                . "<div class='answer-list'>"
                . $xml
                . "</div>"
                . "</div>";
            }
        }
    }
}


