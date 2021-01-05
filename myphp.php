

<html>
<head ><h1 align="center">新增叫修紀錄</h1></head>
<body bgcolor="#02C874"　text="#0000EE"  >
<?php 
  /*session_start();
   if(!isset($_SESSION["login"]) || ($_SESSION["login"]==""))
  { 
 
  
    header("Location:login.php");
  }
  else{};*/
?>
 <title >新增叫修紀錄</title>
 <a href="http://127.0.0.1/myproject/inquire.php">
    <input type="button" value="回查詢首頁">
</a>
<a href="http://127.0.0.1/myproject/logout.php">
    <input type="button" value="登出">
</a>


 <hr size="5" align="left" noshade width="90%" color="#1A1A1A">
 <form action="insert.php" method="post">
   
    
        <div class="Data-Title">
           
        
                <label for ="shopname"><b style="font-size: large;">櫃位名稱:</b></label>
                <input type="text"  name="shopname" size="28" maxlength="16"  placeholder="名稱最多16個字元" required><br>
                <div class="sort">
               
                <div class=option>
                <b style="font-size: large;">問題類型: &nbsp</b>
                <select name="problem_sort" > 
                
                        <option value="刷卡機硬體故障">刷卡機硬體故障</option>
                        <option value="刷卡機網路異常">刷卡機網路異常</option>
                        <option value="收銀機網路異常">收銀機網路異常</option>
                        <option value="骨幹網路">骨幹網路</option>
                        <option value="網路線材異常">網路線材異常</option>
                        <option value="收銀機主機故障">收銀機主機故障</option>
                        <option value="一卡通異常">一卡通異常</option>
                        <option value="讀卡機異常">讀卡機異常</option>
                        <option value="掃描器異常">掃描器異常</option>
                        <option value="發票機異常">發票機異常</option>
                        <option value="UPS異常">UPS異常</option>
                        <option value="錢箱異常">錢箱異常</option>
                        <option value="收銀機程式異常">收銀機程式異常</option>
                        <option value="會員系統異常">會員系統異常</option>
                        <option value="停車折抵異常">停車折抵異常</option>
                        <option value="收銀人員操作異常">收銀人員操作異常</option>
                        <option value="讀卡機與一卡通擺放太近">讀卡機與一卡通擺放太近</option>
                        <option value="商品主檔或合約異常">商品主檔或合約異常</option>
                        <option value="與資訊部無關叫修">與資訊部無關叫修</option>
                        
                </select><br></div>
                </div>
                <div class="problem">
                <label for ="problem"><b style="font-size: large;">報修內容:</b></label>
                <textarea name="problem" rows="5" cols="40"  required></textarea><br>
                </div>
                
                <div class="solution">
                <label for ="solution"><b style="font-size: large;">處理方式:</b></label>
                <textarea name="solution" rows="5" cols="40"  required></textarea><br>
                </div>

                <div class="content">
                <label for ="remark"><b style="font-size: large;">備註:</b></label>
                <textarea name="remark" rows="5" cols="40" placeholder="ex:借給店櫃的設備" ></textarea><br>
                </div>
                <label for ="contract"><b style="font-size: large;">撤櫃日期:</b></label>
                <input type="date"  name="contract" ><b style="font-size: large;">(有裝機請輸入撤櫃時間)</b><br></div>
               <div class="engineer">
                   <b style="font-size: large;">處理人員: &nbsp</b>
                    <select name="address" >
                        <option value="正翰"> 正翰 </option>
                        <option value="啟倫"> 啟倫 </option>
                        <option value="柏文"> 柏文 </option>
                        <option value="書翰"> 書翰 </option>
                        
                        
                    </select>
                    
                 <!--  <label for ="contract"><b>合約到期日:</b></label>
                <input type="date"  name="contract"  ><br>-->
        
    
    </div>  
            <div class="Data-submit">
            <input type="submit" name="submit" value="完成">
            <input type="RESET" name="RESET" value="清除">
            </div> 

    <style type="text/css">
          
           .option{
            margin:5px 0;
            width:1500px;
            
           }
            .Data-Title{
                width:1000px;
                display: block;
                margin:5px 0;
                
                text-align:left;
            }
        .Data-submit{
                text-align: right ;
                width:280px;
        }
        label {
                display: inline-block;
                
                text-align:left;
                margin-right: 10px;
               
        }
        .content{
            margin:10px 36;
            width:1000px;

        }
        .engineer{
            margin:10px 0;
            width:1000px;
            font:30px ;
        }
        .sort{
            margin:10px 0;
            width:1000px;
            
        }
        .problem{
            margin:10px 0;
            width:1000px;
        }
        .solution{
            margin:10px 0;
            width:1000px;
        }

</style>
</form>
<META HTTP-EQUIV="REFRESH" CONTENT="600;URL=logout.php"> <!--10分鐘後自動登出-->
</body>
</html>