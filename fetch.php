<?php
$host = 'localhost';

$user = 'root';

$passwd = '';
 
$database = 'taroko';

$connect = new mysqli($host, $user, $passwd, $database);
 
if ($connect->connect_error) 
{
    die("連線失敗: " . $connect->connect_error);
}
echo "連線成功";
echo '<br>';
 



$connect->query("SET NAMES 'utf8'");

//$shopname=$_GET['search']'';
$shopname='泰山火鍋';
$selectSql = "SELECT * FROM fix where shopname='$shopname' " ;
echo $selectSql;
$memberData = $connect->query($selectSql);

if ($memberData->num_rows > 0) 
{
    while ($row = $memberData->fetch_assoc())
    {
        print_r($row);
        echo '<br>';
    
    }
    
} 
else
{
    echo '0筆資料';
}
