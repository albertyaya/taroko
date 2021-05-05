
<?php

require_once("sql_connect.php");
$date=$_GET['date'];
$problem_sort=$_GET['problem_sort'];
$problem=$_GET['problem'];
$solution=$_GET['solution'];
$engineer=$_GET['address'];
$remark=$_GET['remark'] ?? '';
$processtime=$_GET['processtime'];
$whether=$_GET['whether'];

$date1=date_create($date);
$date2=date_format($date1,"Y/m/d");

$insertSql = "INSERT INTO fix (date1,problem,solution,remark,engineer,sort,processtime,whether) VALUES ('{$date2}','{$problem}','{$solution}','{$remark}','{$engineer}','{$problem_sort}','{$processtime}','{$whether}')" ;

$status=mysqli_query($connect,$insertSql);
if ($status)
{
  
  
  echo "<font size=\"15\" >新增成功....</font>";
  
  header("Refresh:1;url=myphp.php");
}
else 
{
    echo "錯誤 ";
}
?>



   