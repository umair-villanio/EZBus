<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "ezbus";

$con = new mysqli($server,$username,$password,$database);

if ($con->connect_error){
    die("Connectiuon Error!!");
}
else{
    // echo "Connection successfully established.<br><br>";
}


?>