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
<p> 帳 號 <input type=text name="name" required></p>
<p> 密 碼 <input type=password name="password" required></p>


<?PHP
session_start();
function jumpWeb()
{
   echo "
  <script>
  setTimeout(function(){window.location.href='login.html';},1000);
  </script>";
//如果錯誤使用js 1秒後跳轉到登入頁面重試;
 //sleep(1000);
 //header('Location:http://127.0.0.1/myproject/login.html');
}


include("sql_connect.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
 {
$name = $_POST['name'];//post獲得使用者名稱錶單值
$pa = $_POST['password'];//post獲得使用者密碼單值;

if ($name =="admin" && $pa == "admin") {
  
   


//$sql = "select * from userdata where username = '$name' and password='$pa'";//檢測資料庫是否有對應的username和password的sql
//$result=mysqli_query($connect, $sql);//執行sql

//if(mysqli_num_rows($result))//0 false 1 true
//{
     
     
     $_SESSION["login"]=$name;
    // echo "登入成功";
     echo "
  <script>
  setTimeout(function(){window.location.href='myphp.php';},0);
  </script>";
} else {
    //如果使用者名稱或密碼有空
    echo "<font color='red'>帳號或密碼錯誤 請重新輸入！</font>";
   // jumpWeb();
}
 }
?>
</fieldset>
<p><input type="submit" name="submit" value="登入"></p>
</form>

</body>
</html>