
<?php

require_once("sql_connect.php");

 
$date1=$_POST['date1'];
$shopname=$_POST['shopname'];
$problem_sort=$_POST['problem_sort'];
$problem=$_POST['problem'];
$solution=$_POST['solution'];
$engineer=$_POST['address'];
$remark=$_POST['remark'] ?? '';
$contract=$_POST['contract'];
/*if ($remark) {
  $remark = '';
}
依樣的意思*/


$insertSql = "INSERT INTO fix (date1,shopname,problem,solution,remark,engineer,sort) VALUES (?,?,?,?,?,?,?)" ;
//$insertSql="select * from fix ";
//echo $insertSql;
$params=array($date1,$shopname,$problem,$solution,$remark,$engineer,$problem_sort);
$statu =sqlsrv_query($conn,$insertSql,$params);//呼叫query方法(SQL語法)
 //$status =$connect->query($insertSql);
if ($statu)
{
  echo '新增成功'.'<br>';
  
  header("location:http://127.0.0.1/myproject/inquire.php");
  
} 
else 
{
    echo "錯誤 ";
}
?>



   