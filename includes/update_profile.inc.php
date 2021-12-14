<?php 
include_once 'dbh.inc.php';

if(isset($_POST['edit-profile'])){
    $id = $_POST['consumer-id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile-no'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];

    $sql = "UPDATE Customer SET consumer_email='$email',consumer_name = '$name',consumer_mob='$mobile',consumer_address='$address',consumer_city='$city', consumer_pincode='$pincode' WHERE consumer_id=$id"; 
   
    
    if ( $result = mysqli_query($conn,$sql)) {
        header('Location: ../profile.php?err=profile-updated');
      } else {
        header('Location: ../profile.php?err=not-updated');
    }
    exit();
}