<?php

$connect = new mysqli('localhost','root','','taroko');
if (!$connect) {
        die("Could not connect: " . mysqli_connect_error());
    }
   // else{echo "connection!!!!";}
$connect->query("SET NAMES utf8"); //設定連線編碼，防止中文字亂碼
?>