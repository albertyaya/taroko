<?PHP

function jumpWeb()
{
    sleep(1000); //暫停一秒
    header('Location:/login.html');
}


$host = 'localhost';
 
$user = 'root';

$password = '';
 
$database = 'user';

$connect = new mysqli($host, $user, $password, $database);

if (!$connect) 
{
    die("連線失敗: " .mysqli_connect_error());
}
echo "連線成功";


$name = $_POST['name'];//post獲得使用者名稱錶單值
$pa = $_POST['password'];//post獲得使用者密碼單值;


if ($name === '' || $pa === '') {
    echo "表單填寫不完整";
    jumpWeb();
}

$sql = "select * from userdata where username = '$name' and password='$pa'";//檢測資料庫是否有對應的username和password的sql
$result=mysqli_query($connect, $sql);//執行sql
echo $sql;
if(mysqli_num_rows($result))
{
    echo "登入成功";
    $_SESSION['login'] = true;

} else {
    //如果使用者名稱或密碼有空
    echo "error";
    jumpWeb();
}
?>