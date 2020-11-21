<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>使用者註冊頁面</title>
</head>
<body>
<form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<fieldset>  <!--將表單欄位群組起來-->
        <legend ><h1>使用者註冊</h1></legend>
帳 號 <input type="text" name="name" minlength=6 placeholder="至少輸入六位數"><br>
密 碼 <input type="text" name="password" minlength=6 placeholder="至少輸入六位數" ><br>


<?php 
require_once("user_connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$name=$_POST['name'];
$password=$_POST['password'];
$username="SELECT * from userdata where username='{$name}'";

//$result=sqli_query($username);

$status=mysqli_query($connect,$username);
$row=mysqli_fetch_row($status);
echo $row[1];
if(!$name||!$password)
{
  echo "<font color=red>帳號密碼輸入不完整！</font>";
}
 else if($row[1]==$name)
 {
    echo "<font color=red> 帳號已有人使用！</font>";
 }
  else if($name&&$password&&$row[1]!=$name) 
  {$q="INSERT INTO userdata(username,password) values ('{$name}','{$password}')";//向資料庫插入表單傳來的值的sql
    if(mysqli_query($connect,$q)) 
    {
      echo "<font color=blue>註冊成功</font>";
      echo '<meta http-equiv=REFRESH CONTENT=1;url=inquire.php>';
    }
  }   
 
}
?>

</fieldset> 
<input type="submit" name="submit" value="確認">
</form>

</body>
</html>