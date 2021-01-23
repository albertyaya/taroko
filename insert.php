
<?php

require_once("sql_connect.php");
$date=$_POST['date'];
$shopname=$_POST['shopname'];
$problem_sort=$_POST['problem_sort'];
$problem=$_POST['problem'];
$solution=$_POST['solution'];
$engineer=$_POST['address'];
$remark=$_POST['remark'] ?? '';
echo $contract;
/*if ($remark) {
  $remark = '';
}
依樣的意思*/


$insertSql = "INSERT INTO fix (date1,shopname,problem,solution,remark,engineer,sort) VALUES ('{$date}','{$shopname}','{$problem}','{$solution}','{$remark}','{$engineer}','{$problem_sort}')" ;
echo $insertSql;
$status=mysqli_query($connect,$insertSql);//呼叫query方法(SQL語法)
if ($status)
{
  echo '新增成功'.'<br>';
  
  header("location:/myproject/inquire.php?date1='2021-0117'");
  
} 
else 
{
    echo "錯誤 ";
}
?>



   