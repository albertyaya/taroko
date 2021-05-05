

<html>
<head ><h1 align="center">新增叫修紀錄</h1></head>
<body bgcolor="#A3D1D1"　 >
<?php 
  /*session_start();
   if(!isset($_SESSION["login"]) || ($_SESSION["login"]==""))
  { 
 
  
    header("Location:login.php");
  }
  else{};*/
?>
 <title >新增叫修紀錄</title>
 <a href="/inquire.php">
    <input type="button" value="回查詢首頁" style="font-size: x-large">
</a>



 <hr size="5" align="left" noshade width="90%" >
 <form action="insert.php" method="get">
   
      <table class=box>
      <tr>
      <td>
        <div class="Data-Title">
                <div class=date>
                <label ><b style="font-size: x-large;" style="font-family:標楷體;">報修日期:</b></label>
                <input type='date' name="date" style="font-size: x-large" value="<?php echo date('Y-m-d'); ?>" ><br>
                </div>
				
				<div class=shopname>
                
               
               

				</div>
               
                <div class=sort>
                <b style="font-size:x-large;">問題類型:</b>
                <select name="problem_sort" style="font-size:x-large" required> 
	<option value="">----------------------</option>
	<option value="收銀機">收銀機
	<option value="刷卡機">刷卡機 
	<option value="週邊設備">週邊設備
	<option value="網路">網路
	<option value="使用者">使用者
	<option value="其他">其他
        </select><br>
	</div>
				
                <div class=problem>
                <label for ="problem"><b style="font-size:x-large;">報修內容:</b></label>
                <textarea name="problem" rows="5" cols="40" style="font-size:x-large"; required></textarea><br>
                </div>
                
                <div class=solution>
                <label for ="solution"><b style="font-size:x-large">處理方式:</b></label>
                <textarea name="solution" rows="5" cols="40" style="font-size:x-large"; required></textarea><br>
                </div>

                <div class=remark>
                <label for ="remark"><b style="font-size:x-large;">備註:</b></label>
                <textarea name="remark" rows="5" cols="40" style="font-size:x-large";></textarea><br>
                </div>
				<div class=processtime>
				<label for ="processtime"><b style="font-size:x-large;">處理時間:</b></label><input type='number' min='1' max='480' name='processtime' style="font-size:x-large" required>分鐘<br>
                </div>
                
                   <b style="font-size:x-large;">處理人員:</b>
                    <select name="address" style="font-size:x-large"; >
                        
                        <option value="啟倫"> 啟倫 </option>
                        <option value="書翰"> 書翰 </option>   
						<option value="柏文"> 俊豪 </option>
                    </select><br>
                 <div class=finish>
				<label for ="whether"><b style="font-size:x-large;">是否完成:</b></label><input type='radio' name='whether' style="font-size:x-large" value='完成' style="font-size:x-large" checked>完成
                <input type='radio' name=whether style="font-size:x-large" value='未完成' style="font-size:x-large">未完成<br>
				</div>   
					
            <div class=submit>
            <input type="submit" name="submit" value="完成" style="font-size:x-large"; >
            <input type="RESET" name="RESET" value="清除" style="font-size:x-large";>
            </div>
        </td>
        </tr>
        </table>
    <style type="text/css">
        
        table.box{
  width: 500px;
  height: 250px;
  margin: auto;}

  table.box td{
  vertical-align: middle;
  text-align: center;
  width: 1000px;
}
         .Data-Title{
  width: 400px;
  
  display: inline-block;
  text-align: left;
  
}
            .shopname{
				margin:5px 0;
				width: 1000px;
			}
			.sort{
				margin:10px 0;
				width: 1000px;
			}
			.problem{
                margin:5px 0;
				width: 1000px;
				valign=top;
            }
			.solution{
				 margin:5px 0;
				width: 1000px;
				
			}
            .remark{
                margin:5px 48;
                width: 1000px;
            }
            .submit{
                text-align: center;
                margin:20px 0;
				
            }
			.processtime{
				
				width: 1000px;
			}
            .finish{
				
				margin:5px 0;
				width: 1000px;
			}
        

</style>
</form>

</body>
</html>