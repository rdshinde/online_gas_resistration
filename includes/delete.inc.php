<?php
include_once 'dbh.inc.php';

if(isset($_POST['remove'])){
    $id = $_POST['remove'];
    $query = "DELETE FROM Customer WHERE consumer_id=$id"; 
    $result = mysqli_query($conn,$query);
    header('Location: ../admin.php?err=removed');
    exit();
}

