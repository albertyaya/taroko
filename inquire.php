<!DOCTYPE html>
<html>

<head>
    <h1 align="center">叫修紀錄查詢</h1>
    <meta charset="utf-8">
</head>

<body  style="background:#DDDDFF" 　>
 
    <title>叫修紀錄查詢</title>
    <a href="/myphp.php">
    <input type="button" name="button" value="新增紀錄" style="font-size: x-large">
    </a>
    <a href="/inquire_modify.php">
    <input type="button" name="button" value="修改資料" style="font-size: x-large">
    </a>
    <!--<input type="submit" name="loadout_excel" value="匯出excel" style="font-size: x-large">
    <div class="logout">
    <a href="/myproject/logout.php" style="font-size: x-large" >
    <input type="button" value="登出">
    </div>
</a>-->
    <hr size="5" align="left" noshade width="90%" >


    <form method="get" action=" <?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="search_center">
        <input type="submit" name="button1" value="近一周紀錄" style="font-size: x-large" >
	    <input type="submit" name="button2" value="近一個月紀錄" style="font-size: x-large"></br>
        <br>
            <h2>起 <input type="date"  name="from_date" style="font-size: x-large" >
             迄 <input type="date" value="<?php echo date('Y-m-d'); ?>" name="to_date" style="font-size: x-large" >
<label><input list="shop" name="search" placehol  der="輸入關鍵字" style="font-size:x-large"></label>
<datalist id="shop">
						<option value="啟倫"></option>
                        <option value="書翰"></option>   
						<option value="俊豪"></option>

</datalist>

            <input type="submit" value="搜尋" style="font-size: x-large">
			</br>
        </div>
    </form>
    <style type="text/css">
        .search_center {
            text-align: center;
        }

        .odd {
            background:	#EBD3E8;
        }

        .even {
            background:	#EBD3E8;
            
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
        tr.heading{background:	#E2C2DE;}
        body {background:pink;}
    </style>

    <?php
   require_once("sql_connect.php");
   
    echo "<table align='center' border=2px  bordercolor='#1A1A1A' >";

    echo '<br>';

if($_SERVER["REQUEST_METHOD"] == "GET")
{   
 
   $shopname =$_GET['search']??'';
    $date1 =$_GET['from_date']??'';
   $date2=$_GET['to_date']??'';
   
/*if($_GET['search']==''){$_GET['search']='';}
   els{ $shopname =$_GET['search'];}
  if($_GET['from_date']==''){$_GET['from_date']='';}
   els{ $shopname =$_GET['from_date'];}
   if($_GET['to_date']==''){$_GET['to_date']='';}
   els{ $shopname =$_GET['to_date'];}
  */ 
    if(isset($_GET['loadout_excel']))
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
    if(isset($_GET['button1']))
    { 
     $button1= "DATE_SUB(CURDATE(), INTERVAL 7 DAY) <=date1";
     $where[]=$button1;
    } 
    else if(isset($_GET['button2'])) 
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
        $where[] = "(sort='$shopname' or engineer='$shopname' or problem like '%$shopname%')";
    }

    $where = implode('and', $where);
    $selectSql = "SELECT * FROM fix where {$where}  ORDER BY date1 ASC";
    //echo $selectSql;
    $result =mysqli_query($connect, $selectSql);
    //SELECT * FROM fix where (shopname like '%糖果森林%' or engineer like '%糖果森林%') and ( date1 >= '2020-11-06' and date1 < '2020-11-07' )
    //需要括號，不然會變成shopname like '%糖果森林%' or (engineer like '%糖果森林%' and date1 >= '2020-11-06' and date1 < '2020-11-07' )
    //前面成立後面就不會判斷了
    if ($shopname == '' && $date2 == '' ) {
        die("<div align=center>無資料輸入</div>");
    }

    
  // echo $shopname;
  
   if (!mysqli_num_rows($result)) {
        die("<div align=center>總共 0 筆資料</div>");
    }
	 echo "<tr class='heading' align='center' style='font-size: large' width=1000><th width='100'>叫修日期</th><th width='150'>問題分類</th><th width='200'>報修問題</th><th width='200'>處理方式</th><th width='100'>備註</th><th width='90'>處理人員</th><th width='100'>處理時間</th><th width='100'>是否完成</th><th width='150'>功能</th></tr>";
    $i = 1;
    //如果返回的是多條資料，函式 fetch_assoc() 將結合集放入到關聯陣列並迴圈輸出。 while() 迴圈出結果集，並輸出 Id，Rank，Name，ATK和HP 四個欄位值。
    while ($row = mysqli_fetch_array($result))
    {
       $new_date=date_create($row["date1"]);
        $new_date2=date_format($new_date,"Y/m/d");
       $id=$row['id'];
        if ($i % 2 == 1) {
            echo "<tr class='odd' style='font-size: large'><form  method=get action=update.php >";
            echo "<td align='center' >" .$new_date2 . "</td><td align='center'  >" . $row["sort"] . "</td><td >" . $row["problem"] . "</td><td >" . $row["solution"] . "</td><td >" . $row["remark"] . "</td><td align='center' >".$row["engineer"]."</td><td align='center' >".$row["processtime"].'分鐘'."</td><td align='center' >".$row["whether"]."</td>";
			echo "<td width='150' align='center'><input type='submit' name='submit' value='修改' style=font-size:large>
            <input type='submit' name='submit' value='刪除' style=font-size:large>
            <input type='hidden' name='id' value='$id'> </td>";
			
			echo "</tr></form>";
        } else {
             echo "<tr class='even' style='font-size: large'><form  method=get action=update.php >";
            echo "<td align='center' >" .$new_date2 . "</td><td align='center'  >" . $row["sort"] . "</td><td >" . $row["problem"] . "</td><td >" . $row["solution"] . "</td><td >" . $row["remark"] . "</td><td align='center' >".$row["engineer"]."</td><td align='center' >".$row["processtime"].'分鐘'."</td><td align='center' >".$row["whether"]."</td>";
			echo "<td width='150' align='center'><input type='submit' name='submit' value='修改' style=font-size:large>
            <input type='submit' name='submit' value='刪除' style=font-size:large>
            <input type='hidden' name='id' value='$id'> </td>";
			
			echo "</tr></form>";
        }
        $i++;
    }
    $i=$i-1;
    echo "<div align=center>總共 ".$i." 筆資料</div>";
    echo "<br>";
}  
   
    ?>

<!--<META HTTP-EQUIV="REFRESH" CONTENT="600;URL=logout.php">  10分鐘後自動登出-->
</body>

</html>