<?php

if(isset($_POST['submit-admin-login'])){
    $email = $_POST['admin-email'];
    $password = $_POST['admin-password'];

    require_once 'dbh.inc.php';
    require_once 'auth_functions.inc.php';

    if(emptyLoginInputs($email, $password) !== false){
        header("location: ../admin_login.php?err=emptyInputs");
        exit();
    }

    adminLogin($conn,$email,$password);

    
}
else{
    header("location: ../admin_login.php");
    exit();
}