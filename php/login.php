<?php

session_start();
$email = $_POST["email"];
$password = $_POST["password"];
if ($email != "" && $password != "") {
    $link = mysql_connect("localhost", "root", "123456");
    if ($link) {
        mysql_select_db("mywork", $link);
        $sql = "select * from user where email='$email'";
        $result = mysql_query($sql);
        $num = mysql_affected_rows();
        if (mysql_affected_rows() != -1) {
            $row = mysql_fetch_row($result);
            if ($row[2] == $password) {
                $name = $row[0];
                $res = "success";
                $_SESSION["email"] = $email;
                $_SESSION["name"] = $name;
            } else {
                $res = "failed";
            }
        }else {
            $res = "failed";
        }
    }
}else{
    $res = "failed";
}
print $res;
?>