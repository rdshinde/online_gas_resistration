<?php
    require_once "dbh.inc.php";
    require_once "auth_functions.inc.php";

if(isset($_POST["create-user"])){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobileNo = $_POST["mobile-no"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["repeat-pwd"];
    $address = $_POST["address"];
    $city = $_POST["city"];
   
    $pincode = $_POST["pincode"];

    

    if(emptySignupInputs($name, $email, $mobileNo, $pwd, $address, $pincode) !== false){
        header("location: ../signup.php?err=emptyInputs");
        exit();
    }
    
    if(invalidEmail($email) !== false){
        header("location: ../signup.php?err=invalidEmail");
        exit();
    }
    
    if(pwdCheck($pwd, $pwdRepeat) !== false){
        header("location: ../signup.php?err=passwordNotMatching");
        exit();
    }
    if(emailExists($conn , $email)!== false){
        header("location: ../signup.php?err=emailExists");
        exit();
    }
    
    addCustomer($conn, $name, $email, $mobileNo, $pwd, $address, $city, $pincode);
    mysqli_close($conn);

}
else{
    header("location: ../signup.php");
   
}