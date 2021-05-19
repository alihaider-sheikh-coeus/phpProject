<?php
function openConn()
{$hostname = "localhost";
$username = "root";
$password = "pak@8096";
$database = "test";
$db_connect =  new mysqli($hostname, $username, $password, $database);
if($db_connect->connect_error) {
    die("Connection Failed: ".$db_connect->connect_error);
}
return $db_connect;
}
function CloseCon($conn)
{
    $conn -> close();
}

?>