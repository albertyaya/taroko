<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>使用者註冊頁面</title>
<h1>使用者註冊</h1>
</head>
<body>
<form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
使用者名稱:<input type="text" name="name" required><br>
密 碼: <input type="text" name="password" required><br>
<input type="submit" name="submit" value="註冊">
</form>
<?php 
include("user_connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
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
}
?>
</body>
</html>