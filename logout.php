<?php session_start(); 

unset($_SESSION['login']);//將session清空
header("Location:/myproject/inquire.php");
?>