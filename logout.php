<?php session_start(); 

unset($_SESSION['login']);//將session清空
header("location:http://127.0.0.1/myproject/inquire.php");
?>