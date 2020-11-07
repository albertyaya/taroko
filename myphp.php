

<html>
<head ><h1 align="center">新增叫修紀錄</h1></head>
<body bgcolor="#48D1CC"　text="#0000EE"  >
<?php 
  session_start();
   if(!isset($_SESSION["login"]) || ($_SESSION["login"]==""))
  { 
 
  
    header("Location:login.php");
  }
  else{};
?>
 <title >新增叫修紀錄</title>
 <a href="http://127.0.0.1/myproject/inquire.php" >
    <input type="button" value="回查詢首頁">
</a>
<a href="http://127.0.0.1/myproject/logout.php" >
    <input type="button" value="登出">
</a>


 <hr size="5" align="left" noshade width="90%" color="#1A1A1A">
 <form action="insert.php" method="post">
   
    <div class="content">
        <div class="Data-Title">
                <label for ="shopname"><h3>櫃位名稱:</h3></label>
                <input type="text"  name="shopname" size="28" maxlength="16"  placeholder="名稱最多16個字元" required></div>

                <div class="Data-Title">
                <label for ="problem"><h3>問題說明:</h3></label>
                <textarea name="problem" rows="5" cols="40"  required></textarea>

                
                <div class="Data-Title"></label>
                <label for ="solution"><h3>解決方法:</h3></label>
                <textarea name="solution" rows="5" cols="40"  required></textarea>

                <div class="Data-Title">
                <label for ="remark"><h3>備註:</h3></label><br/>
                <textarea name="remark" rows="5" cols="40" placeholder="ex:借給店櫃的設備" ></textarea>

                <div class="Data-Title">
                <input type="file" name="filename" size="30" value="上傳檔案" multiple></br>
                </div>
               
                <div class="Data-Title">
                <div class="Data-Title">
                   <h3>工程師:</h3>
                    <select name="address" >
                        <option value="monkey">monkey</option>
                        <option value="Dog">Dog</option>
                        <option value="Cat">Cat</option>
                        <option value="Hamster">Hamster</option>
                        <option value="Parrot">Parrot</option>
                        
                    </select>
                </div>
    
            <div class="Data-submit">
            <input type="submit" name="submit" value="完成">
            <input type="RESET" name="RESET" value="清除">
        </div>   
    </div>  

    <style type="text/css">
            .Data-Title{
                width:400px;
                display: block;
                margin:5px 0;
               
            
            }
        .Data-submit{
                text-align: right ;
                width:280px;
        }
        label {
                display: inline-block;
                
                text-align: right;
                margin-right: 10px;
               
        }
        .content{
            text-align: left;
            width:600px;

        }
        

</style>
</form>
<META HTTP-EQUIV="REFRESH" CONTENT="600;URL=logout.php"> <!--10分鐘後自動登出-->
</body>
</html>