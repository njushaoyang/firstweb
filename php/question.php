<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$xml = $_POST["xml"];
$name = $_POST["author"];
$title = $_POST["title"];
if (is_dir("../question/" . $name)) {
    file_put_contents("../question" . "/$name" . "/$title", $xml);
    print("success");
} else {
    mkdir("../question" . "/$name");
    file_put_contents("../question" . "/$name" . "/$title", $xml);
    print("success");
}


