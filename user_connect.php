<?php

$connect = new mysqli('localhost','root','','user');
if (!$connect) {
        die("Could not connect: " . mysqli_connect_error());
    }
    
$connect->query("SET NAMES utf8"); //設定連線編碼，防止中文字亂碼
?>