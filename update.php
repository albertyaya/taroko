<?php

require_once("sql_connect.php");

         $id=$_GET['id'];
        // $sh_date=$_GET['sh_date'];
        // $sh_problem=$_GET['sh_problem'];
        // $sh_solution=$_GET['sh_solution'];
        // $sh_remark=$_GET['sh_remark'];
        // $sh_sort=$_GET['sh_sort'];
        // $sh_engineer=$_GET['sh_engineer'];
         $submit=$_GET['submit'];
         
        $sql="select*from fix where id='$id'";
         if($submit=='修改')
         {   
             header("location:/inquire_modify.php");
              
              
             //echo "<font size=\"15\" >修改成功....</font>"; 
         }
        else if($submit=='刪除')
        {
            $sql="DELETE from fix where id='$id'";
            
			echo "<font size=\"15\" >刪除成功....</font>";
			 header("Refresh:1;url=inquire.php");
        }
        $result=mysqli_query($connect,$sql);
		
//$sql="UPDATE fix set date1='$sh_date',problem='$sh_problem',solution='$sh_solution',remark='$sh_remark',sort='$sh_sort',engineer='$sh_engineer' where id='$id' ";
?>