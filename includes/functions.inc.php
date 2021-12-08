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


?>