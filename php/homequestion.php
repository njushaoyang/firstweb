<?php

$name = $_SESSION["name"];
$link = mysql_connect("localhost", "root", "123456");
if ($link) {
    mysql_select_db("mywork", $link);
    $sql = "select * from question order by time desc";
    $result = mysql_query($sql);
    $num = mysql_affected_rows();
    if (mysql_affected_rows() != -1) {
        while ($row = mysql_fetch_array($result)) {
            echo "<br />";
            $title = $row[0];
            $address = $row[1];
            $author=$row[2];
            $vote = $row[3];
            $filename = substr($address, strrpos($address, "/") + 1);
            if (file_exists($address)) {
                $xml = simplexml_load_file($address);
                echo""
                . "<div class='que-wrapper'>"
                . "<div class='que-vote-wrapper'>"
                . "<div class='zan'></div>"
                . "<div class='zan-num'>$xml->vote</div>"
                . "</div>"
                . "<div class='que-content-wrapper'>"
                . "<div class='que-title'>"
                . "<a class='t-ref' href='questiondetial.php?art="."$filename'>$title</a>"
                . "</div>"
                . "<div class='que-tag-wrapper'>";
                if ($xml->tag) {
                    $arr = $xml->tag;
                    foreach ($arr as $tep) {
                        echo"<div class='tag'>"
                        . "$tep"
                        . "</div>";
                    }
                }
                echo "</div>"
                . "</div>"
                . "</div>";
            }
        }
    }
}