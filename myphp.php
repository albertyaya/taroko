

<html>
<head ><h1 align="center">新增叫修紀錄</h1></head>
<body bgcolor="#02C874"　text="#0000EE"  >
<?php 
  session_start();
   if(!isset($_SESSION["login"]) || ($_SESSION["login"]==""))
  { 
    header("Location:login.php");
  }
  
?>
 <title >新增叫修紀錄</title>
 <a href="/myproject/inquire.php">
    <input type="button" value="回查詢首頁" style="font-size: x-large">
</a>



 <hr size="5" align="left" noshade width="90%" color="#1A1A1A">
 <form action="insert.php" method="post">
   
      <table class=box>
      <tr>
      <td>
        <div class="Data-Title">
                <div class=date>
                <label ><b style="font-size: x-large;" style="font-family:標楷體;">報修日期:</b></label>
                <input type='date' value="<?php echo date('Y-m-d'); ?>"  name="date" style="font-size: x-large" ><br>
                </div>
				
				<div class=shopname>
                <label for ="shopname"><b style="font-size:x-large;">櫃位名稱:</b></label>
                <input  list="shop" name="shopname" size="26" maxlength="16"  placeholder="名稱最多16個字元" style="font-size:x-large";  required><br>
                <datalist id="shop">
				   <option value="new balance">
				   <option value="adidas">
				   <option value="UNDER ARMOUR">
				   <option value="NIKE">
				   <option value="Reebok">
				   <option value="MIZUNO">
				   <option value="CROCS">
				   <option value="PONY">
				   <option value="BROOKS">
				   <option value="Hurley">
				   <option value="ABC MART">
				   <option value="TINO BELLINI">
				   <option value="MAGY">
				   <option value="AS">
				   <option value="ROOTS">
				   <option value="POLAR BEAR">
				   <option value="Original Tattoo Wear">
				   <option value="Samsonite Bag Store">
				   <option value="UNIQLO">
				   <option value="MUJI無印良品">
				   <option value="GUESS Accessories">
				   <option value="6ixty8ight">
				   <option value="H&M">
				   <option value="iStore">
				   <option value="GUESS">
				   <option value="NAUTICA">
				   <option value="Timberland">
				   <option value="ESTEE LAUDER">
				   <option value="ORIGINS">
				   <option value="MAC">
				   <option value="KOSE">
				   <option value="KANEBO">
				   <option value="ELIZABETH ARDEN">
				   <option value="belif">
				   <option value="NARS">
				   <option value="O'right">
				   <option value="Olivia Garden">
				   <option value="KIEHL'S">
				   <option value="THE BODY SHOP">
				   <option value="CLARINS">
				   <option value="L'OCCITANE">
				   <option value="SHU UEMURA">
				   <option value="MAKE UP FOR EVER">
				   <option value="THREE">
				   <option value="SK-II">
				   <option value="SHISEIDO">
				   <option value="LANCOME">
				   <option value="Levi's">
				   <option value="EDWIN">
				   <option value="歐都納">
				   <option value="Columbia">
				   <option value="The North Face">
				   <option value="JINS">
				   <option value="FILA">
				   <option value="SKECHERS">
				   <option value="PUMA">
				   <option value="小本愛玉">
				   <option value="頂呱呱">
				   <option value="Bigtom">
				   <option value="TINO'S PIZZA">
				   <option value="虎次">
				   <option value="小越廚">
				   <option value="春水堂">
				   <option value="Funbox">
				   <option value="頑皮族寵物生活館">
				   <option value="瓦城">
				   <option value="MyAnime Square">
				   <option value="Life8">
				   <option value="GODIVA">
				   <option value="ChrisDan">
				   <option value="WeSport">
				   <option value="Kipling">
				   <option value="COLORSMITH">
				   <option value="BBL寢具">
				   <option value=" ">
				   <option value=" ">
				   <option value=" ">
				   <option value=" ">
				   <option value=" ">
				   <option value=" ">
				   <option value=" ">
				   <option value=" ">
				   <option value=" ">
				   <option value=" ">
				   <option value=" ">
				   <option value=" ">
				   <option value=" ">
				   
				</datalist>
				</div>
               
                <div class=sort>
                <b style="font-size:x-large;">問題類型:</b>
                <select name="problem_sort" style="font-size:x-large" > 
	<option value="">----</option>
	<optgroup label="POS機">
	<option value="收銀機主機故障">收銀機主機故障
	<option value="收銀機網路異常">收銀機網路異常
	<option value="收銀機程式異常">收銀機程式異常
	<option value="會員系統異常">會員系統異常
	<optgroup label="刷卡機">
	<option value="刷卡機硬體故障">刷卡機硬體故障
	<option value="刷卡機網路異常">刷卡機網路異常

	<optgroup label="周邊設備"> 
	<option value="一卡通異常">一卡通異常
	<option value="讀卡機異常">讀卡機異常
	<option value="停車折抵異常">停車折抵異常
	<option value="讀卡機與一卡通擺放太近">讀卡機與一卡通擺放太近
	<option value="掃描器異常">掃描器異常
	<option value="發票機異常">發票機異常
	<option value="UPS異常">UPS異常
	<option value="錢箱異常">錢箱異常
	<option value="網路線材異常">網路線材異常

	<optgroup label="其他">
	<option value="收銀人員操作異常">收銀人員操作異常
	<option value="商品主檔或合約異常">商品主檔或合約異常
	<option value="與資訊部無關叫修">與資訊部無關叫修
	<option value="骨幹網路">骨幹網路
                        
                </select><br>
				</div>
				
                <div class=problem>
                <label for ="problem"><b style="font-size:x-large;">報修內容:</b></label>
                <textarea name="problem" rows="5" cols="40" style="font-size:x-large"; required></textarea><br>
                </div>
                
                <div class=solution>
                <label for ="solution"><b style="font-size:x-large">處理方式:</b></label>
                <textarea name="solution" rows="5" cols="40" style="font-size:x-large"; ></textarea><br>
                </div>

                <div class=remark>
                <label for ="remark"><b style="font-size:x-large;">備註:</b></label>
                <textarea name="remark" rows="5" cols="40" placeholder="借給店櫃的設備 ex:hub、ups、網路線" style="font-size:x-large";></textarea><br>
                </div>

                
                
                   <b style="font-size:x-large;">處理人員:</b>
                    <select name="address" style="font-size:x-large"; >
                        <option value="正翰"> 正翰 </option>
                        <option value="啟倫"> 啟倫 </option>
                        <option value="柏文"> 柏文 </option>
                        <option value="書翰"> 書翰 </option>   
                    </select><br>
                 
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
  background: #02C874;
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
            
        

</style>
</form>

</body>
</html>