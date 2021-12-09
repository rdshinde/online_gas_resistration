




<?php
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

if(isset($_POST["make-complaint"])){
    // $d=strtotime("10:30pm April 15 2014");

    $consumerId = (int)$_POST["consumer-id"];
    $bookingId = (int)$_POST["booking-id"];
    $complaint = $_POST["complaint"];
    $mtimestamp = date("Y-m-d H:i:s");
    makeComplaint($conn, $consumerId, $bookingId, $complaint);
    mysqli_close($conn);

}



else{
    header("location: ../index.php");
   
}
?>

