<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>使用者登入</title>
 <!--<script>window.alert("請先登入");</script> 嵌入java script對話方塊-->
</head>
<body>
   
<form name="login" action=" <?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <fieldset>  <!--將表單欄位群組起來-->
        <legend ><h1>使用者登入</h1></legend>
<p> 帳 號 <input type=text name="name" ></p>
<p> 密 碼 <input type=password name="password" ></p>


<?PHP
session_start();

require_once("user_connect.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$name = $_POST['name'];//post獲得使用者名稱錶單值
$pa = $_POST['password'];//post獲得使用者密碼單值;

if($name==''||$pa=='') { 
    echo "<font color='red'>帳號或密碼不完整 請重新輸入！</font>";
    exit;
}

$sql="SELECT * FROM userdata where username='$name' and password='$pa'";
$result=mysqli_query($connect,$sql);
$rows=mysqli_num_rows($result);

if (!$rows) {
    echo "<font color='red'>帳號或密碼錯誤 請重新輸入！</font>";
}

$_SESSION["login"]=$name;
// echo "登入成功";
header("Location:inquire.php");
 }
?>
</fieldset>
<input type="submit" name="submit" value="登入">
<a href="http://127.0.0.1/myproject/signup.php">
  <input type='button' value="註冊">
</a>
<a href="http://127.0.0.1/myproject/inquire.php" >
    <input type="button" value=" 回查詢首頁">
</a>
</form>
</body>
</html>