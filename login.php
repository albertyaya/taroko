<?PHP

$host = 'localhost';
 
$user = 'root';

$password = '';
 
$database = 'user';

$connect = new mysqli($host, $user, $password, $database);

if (!$connect) 
{
    die("連線失敗: " .mysqli_connect_error());
}
echo "連線成功";


$name = $_POST['name'];//post獲得使用者名稱錶單值
$passowrd = $_POST['password'];//post獲得使用者密碼單值



if ($name && $passowrd)//如果使用者名稱和密碼都不為空
{
  $sql = "select * from userdata where username = '$name' and password='$passowrd'";//檢測資料庫是否有對應的username和password的sql
  
  $result=mysqli_query($connect,$sql);//執行sql
  $row = mysqli_fetch_assoc($result);
  echo $row["name"];
  if($row["name"]==$name && $row["password"]==$password)
  {//0 false 1 true
   // header('Location: http://127.0.0.1/myproject/inquire.php');
   //exit;
   echo "登入成功";
  }
  else
  {
    echo "使用者名稱或密碼錯誤";
   /* echo "
    <script>
    setTimeout(function(){window.location.href='login.html';},1000);
    </script>
    ";//如果錯誤使用js 1秒後跳轉到登入頁面重試;
  */
}

}
else
{//如果使用者名稱或密碼有空
  echo "表單填寫不完整";
  echo "
  <script>
  setTimeout(function(){window.location.href='login.html';},1000);
  </script>";
//如果錯誤使用js 1秒後跳轉到登入頁面重試;
}


?>