
<?php

require_once("sql_connect.php");

$shopname=$_POST['shopname'];
$problem_sort=$_POST['problem_sort'];
$problem=$_POST['problem'];
$solution=$_POST['solution'];
$engineer=$_POST['address'];
$remark=$_POST['remark'] ?? '';
$contract=$_POST['contract'];
echo $contract;
/*if ($remark) {
  $remark = '';
}
依樣的意思*/


$insertSql = "INSERT INTO fix (shopname,problem,solution,remark,engineer,contract,sort) VALUES ('{$shopname}','{$problem}','{$solution}','{$remark}','{$engineer}','{$contract}','{$problem_sort}')" ;
echo $insertSql;
$status=mysqli_query($connect,$insertSql);//呼叫query方法(SQL語法)
if ($status)
{
  echo '新增成功'.'<br>';
  
  header("location:http://127.0.0.1/myproject/inquire.php");
  
} 
else 
{
    echo "錯誤 ";
}
?>



   