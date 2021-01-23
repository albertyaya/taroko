<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once("user_connect.php");
        $name = $_POST['name']; //post獲得使用者名稱錶單值
        $pa = $_POST['password']; //post獲得使用者密碼單值;

        $sql = "SELECT * FROM userdata where username='$name' and password='$pa'";
        $result = mysqli_query($connect, $sql);
        $rows = mysqli_num_rows($result);
        if ($rows) {
            session_start();
            $_SESSION["login"] = $name;
            // echo "登入成功";
            header("location:inquire.php");
        }
            if ($name == '' || $pa == '') //如果使用者名稱或密碼有空
            {
                echo "<div class='alert alert-danger' role='alert'>
            帳號或密碼不完整 請重新輸入！
            </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
            帳號或密碼錯誤
            </div>";
            }
    }
