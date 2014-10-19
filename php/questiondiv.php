<?php

$name = $_SESSION["name"];
$link = mysql_connect("localhost", "root", "123456");
if ($link) {
    mysql_select_db("mywork", $link);
    $sql = "select * from question where authorname='$name'";
    $result = mysql_query($sql);
    $num = mysql_affected_rows();
    if (mysql_affected_rows() != -1) {
        while ($row = mysql_fetch_array($result)) {
            echo "<br />";
            $title = $row[0];
            $address = $row[1];
            $vote = $row[3];
            if (file_exists($address)) {
                $xml = simplexml_load_file($address);
                echo""
                . "<div class='que-wrapper'>"
                . "<div class='que-vote-wrapper'>"
                . "赞$xml->vote"
                . "</div>"
                . "<div class='que-content-wrapper'>"
                . "<div class='que-title'>"
                . "<a class='t-ref' href='#'>$title</a>"
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

