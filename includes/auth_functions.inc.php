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




?>