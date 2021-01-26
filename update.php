<?php

require_once("sql_connect.php");

         $id=$_POST["id"];
         $sh_date=$_POST['sh_date'];
         $sh_name=$_POST['sh_name'];
         $sh_problem=$_POST['sh_problem'];
         $sh_solution=$_POST['sh_solution'];
         $sh_remark=$_POST['sh_remark'];
         $sh_engineer=$_POST['sh_engineer'];
         $submit=$_POST['submit'];
         if($submit=='修改')
         {
              $sql="UPDATE 'fix' set date1='$sh_date',shopname='$sh_name',problem='$sh_problem',solution='$sh_solution',remark='$sh_remark',engineer='$sh_engineer' where id='$id' ";
              ECHO "修改成功";    
        }
        else if($submit=='刪除')
        {
            $sql="DELETE from fix where id='$id'";
            echo "刪除成功";
        }
        $result=mysqli_query($connect,$sql);
        header("location:inquire_modify.php");
?>