<?php

require_once("sql_connect.php");

         $id=$_POST['id'];
         $sh_date=$_POST['sh_date'];
         $sh_name=$_POST['sh_name'];
         $sh_problem=$_POST['sh_problem'];
         $sh_solution=$_POST['sh_solution'];
         $sh_remark=$_POST['sh_remark'];
         $sh_sort=$_POST['sh_sort'];
         $sh_engineer=$_POST['sh_engineer'];
         $submit=$_POST['submit'];
         $sh_contract=$_POST['sh_contract'];
        // echo $id;
         if($submit=='修改')
         {   if($sh_problem==''||$sh_name==''|| $sh_solution==''){}
            else{
              $sql="UPDATE fix set shopname='$sh_name',problem='$sh_problem',solution='$sh_solution',remark='$sh_remark',sort='$sh_sort',engineer='$sh_engineer',contract='$sh_contract' where id='$id' ";
              
              ECHO "修改成功"; } 
        }
        else if($submit=='刪除')
        {
            $sql="DELETE from fix where id='$id'";
            echo "刪除成功";

        }
        $result=mysqli_query($connect,$sql);
        header("location:inquire_modify.php");
?>