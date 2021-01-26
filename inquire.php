<!DOCTYPE html>
<html>

<head>
    <h1 align="center">叫修紀錄查詢</h1>
    <meta charset="utf-8">
</head>

<body bgcolor="	#FFB5B5" 　text="#0000EE">
    <title>叫修紀錄查詢</title>
    <a href="http://127.0.0.1/myproject/myphp.php" >
    <input type="button" name="button" value="新增叫修" style="font-size: x-large">
    </a>
    <a href="http://127.0.0.1/myproject/inquire_modify.php">
    <input type="button" name="button" value="修改資料" style="font-size: x-large">
    </a>
    <input type="submit" name="loadout_excel" value="匯出excel" style="font-size: x-large">
    <div class="logout">
    <a href="http://127.0.0.1/myproject/logout.php" style="font-size: x-large" >
    <input type="button" value="登出">
    </div>
</a>
    <hr size="5" align="left" noshade width="90%" color="#1A1A1A">


    <form method="POST" action=" <?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="search_center">
        <input type="submit" name="button1" value="近一周紀錄" style="font-size: x-large" >
	    <input type="submit" name="button2" value="近一個月紀錄" style="font-size: x-large"></br>
        <br>
            <input type="date"  name="from_date" style="font-size: x-large" >
            to <input type="date" value="<?php echo date('Y-m-d'); ?>" name="to_date" style="font-size: x-large" >
            <input type="search" name="search" placeholder="輸入關鍵字" size="" style="font-size: x-large">
            <input type="submit" value="搜尋" style="font-size: x-large"></br>
        </div>
    </form>
    <style type="text/css">
        .search_center {
            text-align: center;
        }

        .odd {
            background:	#53FF53;
        }

        .even {
            background: #A6FFA6;
            
        }
        .logout{
            text-align:right;
        }
        table {
            border-collapse:collapse;
            width:90%;
        }
        tr,td {padding:6px; border-width:3px;border-color:#FFFFFF;}
        th,td{border-color:#FFFFFF;;padding:6px; border-width:3px;}
        tr.heading{background:	#00DB00;}
        body {background:pink;}
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

    $button1= " ";
    $button2= " ";
    $where = [];
    if(isset($_POST['button1']))
    { 
     $button1= "DATE_SUB(CURDATE(), INTERVAL 7 DAY) <=date1";
     $where[]=$button1;
    } 
    else if(isset($_POST['button2'])) 
    { 
     $button2= "DATE_SUB(CURDATE(), INTERVAL 30 DAY) <=date1";
     $where[]=$button2;
    }
    else if($date1&&$date2)
    {   $nextDate =  date('Y-m-d', strtotime("$date2+ 1 day"));
        $string ="(date1 >= '$date1' and date1 < '$nextDate' )";
        $where[]=$string;
    }

    else if ($date2){
        $nextDate =  date('Y-m-d', strtotime("$date2 + 1 day"));
        $string = " date1 >= '$date2' and date1 < '$nextDate'  ";
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

    if (!mysqli_num_rows($result)) {
        die("<div align=center>總共 0 筆資料</div>");
    }
    echo "<tr class='heading' align='center' style='font-size: large'><th width='100'>叫修日期</th><th width='150'>店櫃名稱</th><th width='200'>報修問題</th><th width='200'>處理方式</th><th width='100'>備註</th><th width='150'>問題分類</th><th width='90'>處理人員</th></tr>";
    
    $i = 1;
    //如果返回的是多條資料，函式 fetch_assoc() 將結合集放入到關聯陣列並迴圈輸出。 while() 迴圈出結果集，並輸出 Id，Rank，Name，ATK和HP 四個欄位值。
    while ($row = mysqli_fetch_array($result))
    {
      
       
        if ($i % 2 == 1) {
            echo "<tr class='odd' style='font-size: large'>";
            echo "<td align='center' >" . $row["date1"] . "</td><td align='center' >" . $row["shopname"] . "</td><td >" . $row["problem"] . "</td><td >" . $row["solution"] . "</td><td  width='100'>" . $row["remark"] . "</td><td align='center'  >" . $row["sort"] . "</td><td align='center' >".$row["engineer"]."</td>";
            echo "</tr>";
        } else {
            echo "<tr class='even' style='font-size: large'>";
            echo "<td align='center' >" . $row["date1"] . "</td><td align='center' >" . $row["shopname"] . "</td><td>" . $row["problem"] . "</td><td >" . $row["solution"] . "</td><td  width='100'>" . $row["remark"] . "</td><td align='center'  >" . $row["sort"] . "</td><td align='center'  >".$row["engineer"]."</td>";
            echo "</tr>";
        }
        $i++;
    }
    $i=$i-1;
    echo "<div align=center>總共 ".$i." 筆資料</div>";
    echo "<br>";
}  
    
    ?>

<META HTTP-EQUIV="REFRESH" CONTENT="600;URL=logout.php"><!--10分鐘後自動登出-->
</body>

</html>