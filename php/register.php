<?php

session_start();
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
if ($name != "" && $email != "" && $password != "") {
    $link = mysql_connect("localhost", "root", "123456");
    if ($link) {
        mysql_select_db("mywork", $link);
        $sql = "insert into user(name,email,password) values('$name','$email','$password')";
        $result = mysql_query($sql);
        if (mysql_affected_rows() != -1) {
            $res = "success";
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $name;
        } else {
            $res = "failed";
        }
    }
}else
    $res="failed";
print $res;
?>