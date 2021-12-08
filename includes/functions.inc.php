<?php

    function makeBooking($conn, $consumerId, $mtimestamp){
        $sql = "INSERT INTO Booking (consumer_id, mtimestamp) VALUES (?, ?)";

        $stmt = mysqli_stmt_init($conn);

        if(! mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../index.php?err=stmtFailed");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $consumerId, $mtimestamp);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: ../profile.php?err=none");
            exit();
        }
    }
    function makeComplaint($conn, $consumerId, $bookingId, $complaint){
        $sql = "INSERT INTO Complaints (booking_id, complaint_details , consumer_id) VALUES (?, ? , ?)";

        $stmt = mysqli_stmt_init($conn);

        if(! mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../profile.php?err=stmtFailed");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "sss",$bookingId, $complaint,$consumerId,);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: ../profile.php?err=complaint-registered");
            exit();
        }
    }



    function userData($conn , $id){
        $sql = "SELECT * FROM Customer WHERE consumer_id = ?;";
    
        $stmt = mysqli_stmt_init($conn);
    
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../index.php?err=stmt-Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s",$id);
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

?>