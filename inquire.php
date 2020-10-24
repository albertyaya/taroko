<!DOCTYPE html>
<html>
<head >
    <h1 align="center">叫修紀錄查詢</h1>
    <meta charset="utf-8">
</head>
<body bgcolor="#48D1CC"　text="#0000EE"  >
 <title >叫修紀錄查詢</title>
 <a href="http://127.0.0.1/myphp.html" >
  <img src="129.png" width="80px" height="40px">
 </a>
 <hr size="5" align="left" noshade width="90%" color="#1A1A1A">
 
 
 <form method="POST" action=" <?php echo $_SERVER['PHP_SELF'];?>">
   <div class="search_center">  
     <input type="search" name="search" placeholder="輸入關鍵字"  size="60">
     <input type="submit"  value="搜尋" ></br>
   </div> 
</form>
   
 
 <?php
 $host = 'localhost';
 
 $user = 'root';
 
 $passwd = '';
  
 $database = 'taroko';
 
 $connect = new mysqli($host, $user, $passwd, $database);
 
 echo "<table align='center' border=2px  bordercolor='#1A1A1A' background='#FFFFFF'>";

 if (!$connect) 
 {
     die("連線失敗: " .mysqli_connect_error());
 }
 //echo "連線成功";
 echo '<br>';
  
  
 
 $connect->query("SET NAMES utf8");
 
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
  $sqldate="SELECT date1 FROM fix   " ;
  $results=mysqli_query($connect,$sqldate);
  $shopname=$_POST['search'];
  $selectSql = "SELECT * FROM fix where shopname like '%$shopname%' or date1 like '%$shopname%' or engineer like '%$shopname%' " ;
  $result=mysqli_query($connect,$selectSql);
  
 

  //if (empty($shopname)) {echo "Name is empty";} 
   // else {echo $selectSql;}
   
 //$fixData = $connect->query($selectSql);
 //如果返回的是多條資料，函式 fetch_assoc() 將結合集放入到關聯陣列並迴圈輸出。 while() 迴圈出結果集，並輸出 Id，Rank，Name，ATK和HP 四個欄位值。


 
 echo "<tr align='center' background='#000000'><th>日期</th><th>店櫃</th><th>問題</th><th>解法</th><th>備註</th><th>工程師</th></tr>";
 if (mysqli_num_rows($result)>0) 
 { 
     while ($row = mysqli_fetch_assoc($result))
     { echo "<tr background='#000000'>";
       echo "<td width='150' align='center'>". $row["date1"] . "</td><td width='150' align='center'>". $row["shopname"] . "</td><td width='200'>" . $row["problem"] . "</td><td width='200'>" . $row["solution"] . "</td><td width='200'>" . $row["remark"] . "</td><td width='150' align='center'>".$row["engineer"]."</td>";       
       echo "</tr>"; 
      
      
     }
     
 } 
 else
 {
     echo '0筆資料';
 }
}
 ?>
 <style type="text/css">
     .search_center{
         text-align: center;
       table {background:pink;}
     }

   </style>

</body>
</html>