
<?php
$host = 'localhost';
//改成你登入phpmyadmin帳號
$user = 'root';
//改成你登入phpmyadmin密碼
$passwd = '';
//資料庫名稱
$database = 'taroko';
//實例化mysqli(資料庫路徑, 登入帳號, 登入密碼, 資料庫)
$connect = new mysqli($host, $user, $passwd, $database);
 
if ($connect->connect_error) {
    die("連線失敗: " . $connect->connect_error);
}
//echo "連線成功" ;
echo '<br>';
//設定連線編碼，防止中文字亂碼
$connect->query("SET NAMES 'utf8'");



$datetime=date("Y-m-d H:i:s",time()+6*60*60);
$shopname=$_POST['shopname'];
$problem=$_POST['problem'];
$solution=$_POST['solution'];
$engineer=$_POST['address'];
$remark=$_POST['remark'] ?? '';
/*if ($remark) {
  $remark = '';
}
依樣的意思*/


$insertSql = "INSERT INTO fix (shopname,problem,solution,remark,engineer) VALUES ('{$shopname}','{$problem}','{$solution}','{$remark}','{$engineer}')" ;
//呼叫query方法(SQL語法)

$status = $connect->query($insertSql);
 
if ($status)
{
  header('Location: http://127.0.0.1/myproject/inquire.php');
  echo '新增成功'.'<br>';
  
} 
else 
{
    echo "錯誤: " . $insertSql . "<br>" . $connect->error;
}
?>
<a href="http://127.0.0.1/myproject/inquire.php" >
    <input type="button" value="回查詢首頁">
   </a>


   