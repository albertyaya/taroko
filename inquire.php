<!DOCTYPE html>
<html>

<head>
    <h1 align="center">叫修紀錄查詢</h1>
    <meta charset="utf-8">
</head>

<body bgcolor="#48D1CC" 　text="#0000EE">
    <title>叫修紀錄查詢</title>
    <a href="http://127.0.0.1/myproject/myphp.php">
    <input type="button" name="button" value="新增叫修">
    </a>
    <a href="http://127.0.0.1/myproject/inquire_modify.php">
    <input type="button" name="button" value="修改資料">
    </a>
    <a href="http://127.0.0.1/myproject/contract.php">
    <input type="button" name="contract" value="撤櫃查詢">
    </a>
    <input type="submit" name="loadout_excel" value="匯出excel">
    <div class="logout">
    <a href="http://127.0.0.1/myproject/logout.php" >
    <input type="button" value="登出">
    </div>
</a>
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
        .logout{
            text-align:right;
        }
    </style>

    <?php
   require_once("sql_connect.php");

    echo "<table align='center' border=2px  bordercolor='#1A1A1A' >";

    echo '<br>';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $shopname = $_POST['search'];
    $date1 = $_POST['from_date'];
    $date2 = $_POST['to_date'];
    
    if(isset($_post['loadout_excel']))
    {
        $headers=array("日期","店櫃","問題","解法","備註","問題分類","工程師");
        $data=array(
            array("name"=>"jack","website"=> "http://www.phschool.com.tw",),
        
           array("name"=>"jack","website"=> "http://www.phschool.com.tw",)
        );
        
        
        $fh=fopen("file.csv","w");
        
        fputcsv($fh,$headers);     // create the file
        
        foreach($data as $fields)     //populate the data
        {
          fputcsv($fh,$fields);
        }

    }

    $where = [];
    if($date1&&$date2)
    {   $nextDate =  date('Y-m-d', strtotime("$date2+ 1 day"));
        $string ="(date1 >= '$date1' and date1 < '$nextDate' )";
        $where[]=$string;
    }

    else if ($date1) {
        $nextDate =  date('Y-m-d', strtotime("$date1 + 1 day"));
        $string = " date1 >= '$date1' and date1 < '$nextDate'  ";
        $where[] = $string;
    }
    if ($shopname) {
        $where[] = "(sort='$shopname' or engineer='$shopname' or shopname like '%$shopname%')";
    }

    $where = implode('and', $where);
    $selectSql = "SELECT * FROM fix where {$where}  ORDER BY date1 ASC";
    //echo $selectSql;
    $result =mysqli_query($connect, $selectSql);
    //SELECT * FROM fix where (shopname like '%糖果森林%' or engineer like '%糖果森林%') and ( date1 >= '2020-11-06' and date1 < '2020-11-07' )
    //需要括號，不然會變成shopname like '%糖果森林%' or (engineer like '%糖果森林%' and date1 >= '2020-11-06' and date1 < '2020-11-07' )
    //前面成立後面就不會判斷了
    if ($shopname == '' && $date1 == '') {
        die('name is empty');
    }

    
    echo "<tr align='center' background='#000000'><th width='150'>叫修日期</th><th width='150'>店櫃名稱</th><th width='200'>報修問題</th><th width='200'>處理方式</th><th width='150'>備註</th><th width='200'>問題分類</th><th width='150'>處理人員</th></tr>";
    
    $i = 1;
   
    
    //如果返回的是多條資料，函式 fetch_assoc() 將結合集放入到關聯陣列並迴圈輸出。 while() 迴圈出結果集，並輸出 Id，Rank，Name，ATK和HP 四個欄位值。
    while ($row = mysqli_fetch_assoc($result))
    {
      
       
        if ($i % 2 == 1) {
            echo "<tr class='odd'>";
            echo "<td align='center'>" . $row["date1"] . "</td><td align='center'>" . $row["shopname"] . "</td><td>" . $row["problem"] . "</td><td>" . $row["solution"] . "</td><td>" . $row["remark"] . "</td><td align='center'>" . $row["sort"] . "</td><td align='center'>".$row["engineer"]."</td>";
            echo "</tr>";
        } else {
            echo "<tr class='even'>";
            echo "<td align='center'>" . $row["date1"] . "</td><td align='center'>" . $row["shopname"] . "</td><td>" . $row["problem"] . "</td><td>" . $row["solution"] . "</td><td>" . $row["remark"] . "</td><td align='center'>" . $row["sort"] . "</td><td align='center'>".$row["engineer"]."</td>";
            echo "</tr>";
        }
        $i++;
    }
    $i=$i-1;
    echo "<div align=center>總共".$i."筆資料</div>";
    echo "<br>";
}  
   
    ?>

<META HTTP-EQUIV="REFRESH" CONTENT="600;URL=logout.php"><!--10分鐘後自動登出-->
</body>

</html>