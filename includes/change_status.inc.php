<?php 
include_once 'dbh.inc.php';

if(isset($_GET['id']) && isset($_GET['status'])){
    $id = $_GET['id'];
    $status = $_GET['status'];
    
    $sql = "UPDATE Booking SET status_field=$status WHERE booking_id=$id"; 
   
    
    if ( $result = mysqli_query($conn,$sql)) {
        header('Location: ../Admin.php?err=status-changed');
      } else {
        header('Location: ../Admin.php?err=not-changed');
      }
      
    
    exit();
}


?>