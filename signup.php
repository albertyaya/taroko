<?php 
$host = 'localhost';
 
$user = 'root';

$password = '';
 
$database = 'user';

$connect = new mysqli($host, $user, $password, $database);

if (!$connect) 
{
    die("連線失敗: " .mysqli_connect_error());
}
//echo "連線成功";

$name=$_POST['name'];
$password=$_POST['password'];


$q="INSERT INTO userdata(username,password) values ('{$name}','{$password}')";//向資料庫插入表單傳來的值的sql
$status = $connect->query($q);
 
if ($status)
{
  echo '註冊成功'.'<br>';
} 
else 
{
    echo "錯誤: " . $q . "<br>" . $connect->error;
}
?>