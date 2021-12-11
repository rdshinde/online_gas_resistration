

<?php
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

if(isset($_POST["send-message"])){
    $consumer_id = $_POST['consumer-id'];
    $booking_id = $_POST['booking-id'];
    $complaint_id = $_POST['complaint-id'];

    $message = $_POST["message"];
    
    sendMessage($conn, $consumer_id, $booking_id, $complaint_id, $message);
    mysqli_close($conn);

}
else{
    header("location: ../Admin.php");
   
}
?>