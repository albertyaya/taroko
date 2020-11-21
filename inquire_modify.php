<!DOCTYPE html>
<html>

<head>
    <h1 align="center">叫修紀錄查詢</h1>
    <meta charset="utf-8">
</head>

<body bgcolor="#48D1CC" 　text="#0000EE">
    <title>叫修紀錄查詢</title>
    <a href="http://127.0.0.1/myproject/myphp.php">
        <img src="129.png" width="100px" height="60px">
    </a>
    <input type="button" name="modify" value="修改資料">
    <hr size="5" align="left" noshade width="90%" color="#1A1A1A">


    <form method="POST" action=" <?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="search_center">
            <input type="date" name="from_date" >
            to <input type="date" name="to_date" ></br>
            <input type="search" name="search" placeholder="輸入關鍵字" size="60">
            <input type="submit" value="搜尋"></br>
        </div>
    </form>
    <style type="text/css">
        .search_center {
            text-align: center;
        }

        .odd {
            background: #53FF53;
        }

        .even {
            background: #A6FFA6;
        }
    </style>

    <?php
   
   include("sql_connect.php");
    $id=$_COOKIE["id"];
    $sql_id="SELECT * from fix where id=$id ";
    echo "<table align='center' border=2px  bordercolor='#1A1A1A' >";

    echo '<br>';
    
if($_SERVER["REQUEST_METHOD"] == "POST")
{  
    $shopname = $_POST['search'];
    $date1 = $_POST['from_date'];
    $date2 = $_POST['to_date'];

    $where = [];
    if($date1&&$date2)
    {   $nextDate =  date('Y-m-d', strtotime("$date2 +1 day"));
        $string ="(date1 >= '$date1' and date1 <= '$nextDate' )";
        $where[]=$string;
    }

    else if ($date1) {
        $nextDate =  date('Y-m-d', strtotime("$date1 +1 day"));
        $string = " date1 >= '$date1' and date1 < '$nextDate'  ";
        $where[] = $string;
    }
    if ($shopname) {
        $where[] = "(shopname='$shopname' or engineer='$shopname' or remark like '%$shopname%')";
    }

    $where = implode('and', $where);
    $selectSql = "SELECT * FROM fix where {$where}";
   // echo $selectSql;
    $result = mysqli_query($connect, $selectSql);
    
    //SELECT * FROM fix where (shopname like '%糖果森林%' or engineer like '%糖果森林%') and ( date1 >= '2020-11-06' and date1 < '2020-11-07' )
    //需要括號，不然會變成shopname like '%糖果森林%' or (engineer like '%糖果森林%' and date1 >= '2020-11-06' and date1 < '2020-11-07' )
    //前面成立後面就不會判斷了
    if ($shopname == '' && $date1 == '') {
        die('name is empty');
    }

    
    echo "<tr align='center' background='#000000'><th width='150'>日期</th><th width='150'>店櫃</th><th width='200'>問題</th><th width='200'>解法</th><th width='150'>備註</th><th width='150'>工程師</th><th width='150'>功能</th></tr>";
    if (!mysqli_num_rows($result)) {
        die('0筆資料');
    }
    $i = 1;
    
    //如果返回的是多條資料，函式 fetch_assoc() 將結合集放入到關聯陣列並迴圈輸出。 while() 迴圈出結果集，並輸出 Id，Rank，Name，ATK和HP 四個欄位值。
    while ($row = mysqli_fetch_row($result)) 
    { $i++;
        $id=$row[0];
        $date=$row[1];
        $shopname=$row[2];
        $problem=$row[3];
        $solution=$row[4];
        $remark=$row[5];
        $engineer=$row[6];
        echo $id."<br>" ;
            echo "<tr><form  method=POST action=update.php>";
            echo "<td width='150' align='center'><input type='text' name='sh_date' value='$date'></td>";
            echo "<td width='150' align='center'><input type='text' name='sh_name' value='$shopname'></td>";
            echo "<td width='150' align='center'><input type='text' name='sh_problem' value='$problem'></td>";
            echo "<td width='150' align='center'><input type='text' name='sh_solution' value='$solution'></td>";
            echo "<td width='150' align='center'><input type='text' name='sh_remark' value='$remark'></td>";
            echo "<td width='150' align='center'><input type='text' name='sh_engineer' value='$engineer'></td>";
            echo "<td width='150' align='center'><input type='submit' name='submit' value='修改'>
            <input type='submit' name='submit' value='刪除'>
            <input type='hidden' name='id' value='$id'> </td>";
            echo "</tr></form>";
     }
     
    
        
        
      
        
       
    $i=$i-1;
    echo "<div align=center>總共".$i."資料</div>";
    echo "<br>";
}
    ?>

<META HTTP-EQUIV="REFRESH" CONTENT="600;URL=logout.php"><!--10分鐘後自動登出-->
</body>

</html>