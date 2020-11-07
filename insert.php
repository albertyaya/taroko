
<?php

function jumpWeb()
{
  echo "
  <script>
  setTimeout(function(){window.location.href='myphp.php';},1500);
  </script>";
//如果錯誤使用js 1秒後跳轉到登入頁面重試;
 
}


include("sql_connect.php");
 
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
  echo '新增成功'.'<br>';
  
  jumpWeb();
} 
else 
{
    echo "錯誤: " . $insertSql . "<br>" . $connect->error;
}
?>
<!--<a href="http://127.0.0.1/myproject/inquire.php" >
    <input type="button" value="回查詢首頁">
   </a>-->


   