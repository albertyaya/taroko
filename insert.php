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
echo "連線成功" ;
echo '<br>';
//設定連線編碼，防止中文字亂碼
$connect->query("SET NAMES 'utf8'");



$datetime=date("Y-m-d H:i:s",time()+6*60*60);

$shopname=$_GET['shopname'];
$problem=$_GET['problem'];
$solution=$_GET['solution'];
$engineer=$_GET['address'];
$remark=$_GET['remark'] ?? '';
/*if ($remark) {
  $remark = '';
}
依樣的意思*/


$insertSql = "INSERT INTO fix (date1,shopname,problem,solution,remark,engineer) VALUES ('{$datetime}','{$shopname}','{$problem}','{$solution}','{$remark}','{$engineer}')" ;
//呼叫query方法(SQL語法)

$status = $connect->query($insertSql);
 
if ($status)
{
  echo '新增成功';
} 
else 
{
    echo "錯誤: " . $insertSql . "<br>" . $connect->error;
}
?>