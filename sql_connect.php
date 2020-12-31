
<?php
$serverName = "localhost\SQLExpress";
$connectionInfo = array( "Database"=>"taroko", "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
    // echo "Connection successful.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>

