<?php
function createBill($conn, $consumer_id , $booking_id){
    $sql = "INSERT INTO Bills (booking_id , consumer_id, amount) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(! mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../profile.php?err=stmtFailed");
        exit();
    }
    else{
        $amount = rand(850,1000);
        mysqli_stmt_bind_param($stmt, "sss", $booking_id, $consumer_id, $amount);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../profile.php?err=none");
        exit();
    }
}
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
            $last_id = mysqli_insert_id($conn);
            createBill($conn, $consumerId , $last_id);
            // header("location: ../profile.php?err=$last_id");
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
            $lastBookingID = mysqli_insert_id($conn);
            mysqli_stmt_close($stmt);
            createBill($conn, $consumerId , $lastBookingID);
            header('location: ../profile.php?err=complaint-registered');
            exit();
        }
    }

    function sendMessage($conn, $consumer_id, $booking_id, $complaint_id, $message){
        $sql = "INSERT INTO Messages (consumer_id, booking_id , complaint_id , cmessage) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(! mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../Admin.php?err=stmtFailed");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ssss", $consumer_id, $booking_id, $complaint_id, $message);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: ../Admin.php?err=message-sent");
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

    function bookingsNo($conn , $id){
        $sql = "SELECT * FROM Booking WHERE consumer_id=$id";
        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);
        if($resultCheck > 0){
            return $resultCheck;
        }else{
            return 0;
        }
       
    }

    function totalCustomers($conn){
        $sql = "SELECT * FROM Customer";
        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);
        if($resultCheck > 0){
            return $resultCheck;
        }else{
            return 0;
        }
       
    }

    function totalBookings($conn){
        $sql = "SELECT * FROM Booking";
        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);
        if($resultCheck > 0){
            return $resultCheck;
        }else{
            return 0;
        }
       
    }
    function deliveredBookings($conn){
        $sql = "SELECT * FROM Booking WHERE status_field ='Delivered'";
        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);
        if($resultCheck > 0){
            return $resultCheck;
        }else{
            return 0;
        }
       
    }

    function totalComplaints($conn){
        $sql = "SELECT * FROM Booking";
        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);
        if($resultCheck > 0){
            return $resultCheck;
        }else{
            return 0;
        }
       
    }

    function customerBookings($conn, $id){
        $sql = "SELECT * FROM Booking WHERE consumer_id=$id";
        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);
        if($resultCheck > 0){
            return $resultCheck;
        }else{
            return 0;
        }
       
    }
    function deliveredCustomerBookings($conn, $id){
        $sql = "SELECT * FROM Booking WHERE consumer_id=$id AND status_field='Delivered'";
        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);
        if($resultCheck > 0){
            return $resultCheck;
        }else{
            return 0;
        }
       
    }

    function getBookingPrice($conn, $id){
        $sql = "SELECT * FROM Bills WHERE booking_id=$id";
        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);
        if($resultCheck > 0){
            $row = mysqli_fetch_assoc($results);
            return $row["amount"];
        }else{
            return "N/A";
        }
    }

?>