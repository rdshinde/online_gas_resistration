<?php

function emptyLoginInputs($email, $password){
    $res = null;
    if(empty($email) || empty($password)){
        $res = true; 
    }else{
        $res = false;
    }
    return $res;
}

function adminLogin($conn,$email,$pwd){
    $sql = "SELECT * FROM Admin";
    $results = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($results);
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($results)){
            $adminEmail = $row["admin_id"];
            $adminPassword = $row["admin_password"];
        }
    }
    else{
        header("location: ../admin_login.php?err=no_admin_assigned");
        exit();
    }
    $checkPwd = null;
    if($pwd === $adminPassword && $email === $adminEmail){
        $checkPwd = true;
    }
    else{
        $checkPwd = false;
    }

    if($checkPwd === false){
        header("location: ../admin_login.php?err=wrongPassword");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["adminID"] = $adminEmail;
        header("location: ../admin.php");
        exit();
    }
}


function emptySignupInputs($name, $email, $mobileNo, $pwd, $address, $pincode){
    $res = null;
    if(empty($name) || empty($email) || empty($mobileNo) || empty($pwd) || empty($address) || empty($pincode)){
        $res = true; 
    }else{
        $res = false;
    }
    return $res;
}

function invalidEmail($email){
    $res = null;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $res = true;
    }else{
        $res = false;
    }
    return $res;
}

function pwdCheck($pwd, $pwdRepeat){
    $res = null;
    if(strlen($pwd)< 8){
        $res = true;
    }
    else if($pwd !== $pwdRepeat){
        $res = true;
    }
    else{
        $res = false;
    }
    return $res;
}

function emailExists($conn , $email){
    $sql = "SELECT * FROM Customer WHERE consumer_email = ?;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?err=stmt-Failed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s",$email);
    mysqli_stmt_execute($stmt);

    $data = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($data)){
        return $row;
    }else{
        $res = false;
        return $res;
    }
    mysqli_stmt_close($stmt);
}

function addCustomer($conn, $name, $email, $mobileNo, $pwd, $address, $city, $pincode){
    $sql = "INSERT INTO Customer ( consumer_pwd, consumer_email, consumer_name, consumer_mob,  consumer_address, consumer_city, consumer_pincode) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if(! mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?err=stmtFailed");
        exit();
    }
    else{
        $hashedPwd = base64_encode($pwd);
        mysqli_stmt_bind_param($stmt, "sssssss", $hashedPwd, $email, $name, $mobileNo,  $address, $city, $pincode);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../login.php?err=none");
        exit();
    }
}

function loginConsumer($conn,$email,$password){
    $emailExists = emailExists($conn , $email);

    if($emailExists === false){
        header("location: ../login.php?err=wrongLogin");
        exit();
    }
    $pwdHashed = $emailExists["consumer_pwd"];
    $checkPwd = null;
    if($pwdHashed === base64_encode($password)){
        $checkPwd = true;
    }
    else{
        $checkPwd = false;
    }

    if($checkPwd === false){
        header("location: ../login.php?err=wrongPassword");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["consumerID"] = $emailExists["consumer_id"];
        $_SESSION["name"] = $emailExists["consumer_name"];
        $_SESSION["address"] = $emailExists["consumer_address"];
        $_SESSION["city"] = $emailExists["consumer_city"];
        $_SESSION["pincode"] = $emailExists["consumer_pincode"];
        $_SESSION["mobileNo"] = $emailExists["consumer_mob"];
        $_SESSION["email"] = $emailExists["consumer_email"];
       
        header("location: ../index.php");
        exit();
    }

}



