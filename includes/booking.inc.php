<?php
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

if(isset($_POST["make-booking"])){
    $consumerId = $_POST["consumer-id"];
    $mtimestamp = date("Y-m-d H:i:s");
    makeBooking($conn, $consumerId, $mtimestamp);
    mysqli_close($conn);

}
else{
    header("location: ../index.php");
   
}
