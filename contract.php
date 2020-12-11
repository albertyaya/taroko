<!DOCTYPE html>
<html>

<head>
    <h1 align="center">撤櫃查詢</h1>
    <meta charset="utf-8">
</head>

<body bgcolor="#89CFF0"　text="#0000EE">
    <title>撤櫃查詢</title>
    <a href="http://127.0.0.1/myproject/myphp.php">
    <input type="button" name="button" value="新增叫修">
    </a>
    <a href="http://127.0.0.1/myproject/inquire_modify.php">
    <input type="button" name="button" value="修改資料">
    </a>
    <a href="http://127.0.0.1/myproject/inquire.php">
    <input type="button" name="contract" value="回查詢首頁">
    </a>
    <div class="logout">
    <a href="http://127.0.0.1/myproject/logout.php" >
    <input type="button" value="登出">
    </div>
</a>
    <hr size="5" align="left" noshade width="90%" color="#1A1A1A">


    <form method="POST" action=" <?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="search_center">
   	    <input type="submit" name="button1" value="近七天撤櫃店家" >
	    <input type="submit" name="button2" value="近一個月撤櫃店家"></br>
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
   // $botton=$_POST['week'];
   

   
   
   $where = [];
   if(array_key_exists('button1', $_POST)) 
   { 
    $button1= "DATEDIFF(date1,NOW())<7 AND DATEDIFF(date1,NOW())>=0";
    $where[]=$button1;
   } 
   else if(array_key_exists('button2', $_POST)) 
   { 
    $button2= "DATEDIFF(date1,NOW())<30 AND DATEDIFF(date1,NOW())>=0";
    $where[]=$button2;
   } 
   
   else if($date1&&$date2)
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
        $where[] = "(shopname like '%$shopname%')";
    }

    $where = implode('and', $where);
    
    $selectSql = "SELECT * FROM fix where {$where}  ORDER BY date1 ASC";

    //echo $selectSql;
    $result = mysqli_query($connect, $selectSql);
    if ($button1=='' &&  $shopname == '' && $date1 == '' && $button2=='') {
        die('name is empty');
    }

    echo "<tr align='center' background='#000000'><th width='150'>日期</th><th width='150'>店櫃</th><th width='150'>撤櫃時間</th></tr>";
    if (!mysqli_num_rows($result)) {
        die('0筆資料');
    }
    $i = 1;
    //如果返回的是多條資料，函式 fetch_assoc() 將結合集放入到關聯陣列並迴圈輸出。 while() 迴圈出結果集，並輸出 Id，Rank，Name，ATK和HP 四個欄位值。
    
    while ($row = mysqli_fetch_assoc($result))
    {
        $date=date('Y-m-d',strtotime($row['date1']));
       
        if ($i % 2 == 1) {
            echo "<tr class='odd'>";
            echo "<td width='150' align='center'>" . $date . "</td><td width='150' align='center'>" . $row["shopname"] . "</td><td width='200' align='center'>" . $row["contract"] . "</td>";
            echo "</tr>";
        } else {
            echo "<tr class='even'>";
            echo "<td width='150' align='center'>" . $date . "</td><td width='150' align='center'>" . $row["shopname"] . "</td><td width='200' align='center'>" . $row["contract"] . "</td>";
            echo "</tr>";
        }
        $i++;
    }
    $i=$i-1;
    echo "<div align=center>總共".$i."資料</div>";
    echo "<br>";


}
?>