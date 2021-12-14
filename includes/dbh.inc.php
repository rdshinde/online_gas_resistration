<?php

$serverName = "localhost";
$dbUsername = "id18109467_root";
$dbPassword = "h+%}Jal7f141*Du1";
$dbName = "id18109467_online_gas_booling";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    
    die("Connection Failed.".mysqli_connect_error());
    
}
