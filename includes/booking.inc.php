<?php
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

if(isset($_POST["make-booking"])){
    
    $consumerId = (int)$_POST["consumer-id"];
    makeBooking($conn, $consumerId);
    mysqli_close($conn);

}
else{
    header("location: ../index.php");
   
}
?>