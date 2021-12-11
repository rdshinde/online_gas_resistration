<script>
const moreInfoDiv = document.querySelector(".more-info");
const totalBookingsDiv = document.querySelector(".total-bookings");
const totalcomplaintsDiv = document.querySelector(".complaints-made");
const deliveredBookingsDiv = document.querySelector(".delivered-bookings");
const activeCustomersDiv = document.querySelector(".active-customers");

activeCustomersDiv.addEventListener('click',()=>{
    moreInfoDiv.innerHTML = customerStr;
})
totalBookingsDiv.addEventListener('click',()=>{
    moreInfoDiv.innerHTML = bookingsStr;
})

totalcomplaintsDiv.addEventListener('click',()=>{
    moreInfoDiv.innerHTML = complaintsStr;
})
deliveredBookingsDiv.addEventListener('click',()=>{
    moreInfoDiv.innerHTML = deliveredBookingsStr;
})

const customerStr = `<!-- Registered Customers -->
<div class="container px-lg-2 my-5">
  <div class="p-1 p-lg-2 rounded-3">
    <h1 class="display-5 text-center">Registered Customers</h1>
    <div class="m-1 m-lg-1">
      <section>
        <div
          class="
            container
            table-responsive
            shadow
            p-3
            rounded
            border
            col-lg-6 col-xxl-12 col-centered
            text-center
          "
        >
          <table class="table table-hover p-3">
            <thead>
              <tr>
                <th scope="col">Sr.No.</th> 
                <th scope="col">Consumer ID</th> 
                <th scope="col">Customer Name</th> 
                <th scope="col">Mobile No.</th> 
                <th scope="col">Email</th> 
                <th scope="col">Address</th> 
                <th scope="col">Total Bookings</th> 
                
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                    $sql = "SELECT * FROM Customer";
                    $results = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($results);
                    if($resultCheck >0){
                      $sr = 1;
                      while($row = mysqli_fetch_assoc($results)){
                        $id = $row["consumer_id"];
                        $name = $row["consumer_name"];
                        $mobileNo = $row["consumer_mob"];
                        $email = $row["consumer_email"];
                        $address = $row["consumer_address"];
                        $city = $row["consumer_city"];
                        $pincode = $row["consumer_pincode"];
                        $totalBookings = bookingsNo($conn , $id);
                        echo '<th>'.$sr.'</th>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$mobileNo.'</td>
                        <td>'.$email.'</td>
                        <td>'.$address.' '.$city.'-'.$pincode.'</td>
                        <td>'.$totalBookings.'</td>
                        <td><form action="./complaint.php" method="GET"><button type="submit" name="complaint" value="'.$id.'" class="btn btn-sm btn-info" >View Complaints</button></form></td>
                        <td><span><form action="includes/delete.inc.php" method="POST"><button type="submit" name="remove" value="'.$id.'" class="btn btn-sm btn-danger">Remove Customer</button></form></span></td>
                      </tr>
                      ';
                        $sr = $sr +1;
                      }
                    }
                        
    
                ?>


                
              
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>
</div>
`;

const bookingsStr = `<!-- BOOKINGS -->
<div class="bookings-class container px-lg-2 my-5">
  <div class="p-1 p-lg-2 rounded-3">
    <h1 class="display-5 text-center">Bookings</h1>
    <div class="m-1 m-lg-1">
      <section>
        <div
          class="
            container
            table-responsive
            shadow
            p-3
            rounded
            border
            col-lg-6 col-xxl-12 col-centered
            text-center
          "
        >
          <table class="table table-hover p-3">
            <thead>
              <tr>
                <th scope="col">Sr.No.</th> 
                <th scope="col">Consumer ID</th> 
                <th scope="col">Booking ID</th> 
                <th scope="col">Customer Name</th> 
                <th scope="col">Mobile No.</th> 
                <th scope="col">Address</th>
                <th scope="col">Price</th> 
                <th scope="col">Status</th>
                
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                
                  $sql = "SELECT * FROM Booking";
                  $results = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($results);
                  if($resultCheck >0){
                    $sr = 1;
                    while($row = mysqli_fetch_assoc($results)){
                      $id = $row["consumer_id"];
                      $userInfo = userData($conn , $id);
                      $bookingId = $row["booking_id"];
                      $name = $userInfo["consumer_name"];
                      $mobileNo = $userInfo["consumer_mob"];
                      $address = $userInfo["consumer_address"];
                      $city = $userInfo["consumer_city"];
                      $pincode = $userInfo["consumer_pincode"];
                      echo '<th>'.$sr.'</th>
                      <td>'.$id.'</td>
                      <td>'.$bookingId.'</td>
                      <td>'.$name.'</td>
                      <td>'.$mobileNo.'</td>
                      <td>'.$address.' '.$city.'-'.$pincode.'</td>
                      <td>&#8377;990</td>
                      
                        <td>
                            <form action="includes/change_status.inc.php" method="GET">
                                <select name="status" class="form-select form-select-sm">
                                      <option value="Pending">Pending</option>
                                      <option value="Delivered">Delivered</option>
                                </select>
                                <button type="submit" name="id" value="'.$bookingId.'" class="btn btn-sm btn-warning m-1">Update Status</button>
                            </form>
                      <td>
                    </tr>';
                    $sr = $sr + 1;
                    }
                  }
                
                ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>
</div>
`;

const deliveredBookingsStr = `<!-- BOOKINGS -->
<div class="bookings-class container px-lg-2 my-5">
  <div class="p-1 p-lg-2 rounded-3">
    <h1 class="display-5 text-center">Delivered Bookings</h1>
    <div class="m-1 m-lg-1">
      <section>
        <div
          class="
            container
            table-responsive
            shadow
            p-3
            rounded
            border
            col-lg-6 col-xxl-12 col-centered
            text-center
          "
        >
          <table class="table table-hover p-3">
            <thead>
              <tr>
                <th scope="col">Sr.No.</th> 
                <th scope="col">Consumer ID</th> 
                <th scope="col">Booking ID</th> 
                <th scope="col">Customer Name</th> 
                <th scope="col">Mobile No.</th> 
                <th scope="col">Address</th> 
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                
                  $sql = "SELECT * FROM Booking WHERE status_field='Delivered'";
                  $results = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($results);
                  if($resultCheck >0){
                    $sr = 1;
                    while($row = mysqli_fetch_assoc($results)){
                      $id = $row["consumer_id"];
                      $userInfo = userData($conn , $id);
                      $bookingId = $row["booking_id"];
                      $name = $userInfo["consumer_name"];
                      $mobileNo = $userInfo["consumer_mob"];
                      $address = $userInfo["consumer_address"];
                      $city = $userInfo["consumer_city"];
                      $pincode = $userInfo["consumer_pincode"];
                      echo '<th>'.$sr.'</th>
                      <td>'.$id.'</td>
                      <td>'.$bookingId.'</td>
                      <td>'.$name.'</td>
                      <td>'.$mobileNo.'</td>
                      <td>'.$address.' '.$city.'-'.$pincode.'</td>
                      <td>&#8377;990</td>
                      <td>
                        <form action="includes/change_status.inc.php" method="GET">
                          <select name="status" class="form-select form-select-sm">
                              <option value="Pending">Pending</option>
                              <option selected value="Delivered">Delivered</option>
                          </select>
                          <button type="submit" name="id" value="'.$bookingId.'" class="btn btn-sm btn-warning m-1">Update Status</button>
                        </form>
                      </td>
                      
                      
                    </tr>';
                    $sr = $sr + 1;
                    }
                  }
                
                ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>
</div>`;


const complaintsStr = `<!-- Complaints -->
<div class="container px-lg-2 my-5">
  <div class="p-1 p-lg-2 rounded-3">
    <h1 class="display-5 text-center">Complaints</h1>
    <div class="m-1 m-lg-1">
      <section>
        <div
          class="
            container
            table-responsive
            shadow
            p-3
            rounded
            border
            col-lg-6 col-xxl-12 col-centered
            text-center
          "
        >
          <table class="table table-hover p-3">
            <thead>
              <tr>
                <th scope="col">Sr.No.</th> 
                <th scope="col">Consumer ID</th> 
                <th scope="col">Complaint ID</th> 
                <th scope="col">Booking ID</th> 
                <th scope="col">Date</th> 
                <th scope="col">Status</th>
                <th scope="col">Price</th>
                <th scope="col">Details</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php 
                    $sql = "SELECT * FROM Complaints";
                    $results = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($results);
                    if($resultCheck >0){
                      $sr = 1;
                      while($row = mysqli_fetch_assoc($results)){
                        $id = $row["consumer_id"];
                        $userInfo = userData($conn , $id);
                        $name = $userInfo["consumer_name"];
                        
                        $mobileNo = $userInfo["consumer_mob"];
                        $bookingId = $row["booking_id"];
                        $status = $row["complaint_status"];
                        $date = $row["date_field"];
                        $complaintID = $row["complaint_id"];
                        $complaint = $row["complaint_details"];
                        echo '<th>'.$sr.'</th>
                        <td>'.$id.'</td>
                        <td>'.$complaintID.'</td>
                        <td>'.$bookingId.'</td>
                        <td>'.$date.'</td>
                        <td>'.$status.'</td>
                        <td>&#8377;990</td>
                        <td>'.$complaint.'</td>
                        <td><button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Message</button></td>
                      </tr>
                      ';
                        $sr = $sr + 1;
                      }
                    }
                    
                
                ?>
                
            </tbody>
          </table>
        </div>
        <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="includes/message.inc.php" method="POST">
                          <div class="mb-3 text-start">
                            <label for="consumer-id" class="form-label">Consumer ID</label>
                            <input type="text" name="consumer-id" class="form-control" id="consumer-id" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-3 text-start">
                            <label for="booking-id" class="form-label">Booking ID</label>
                            <input type="text" name="booking-id" class="form-control" id="booking-id" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-3 text-start">
                            <label for="complaint-id" class="form-label">Complaint ID</label>
                            <input type="text" name="complaint-id" class="form-control" id="complaint-id" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-3 text-start">
                            <label for="message" class="form-label">Message</label>
                            <textarea type="text" name="message" class="form-control" id="message" aria-describedby="emailHelp"></textarea>
                          </div>
                          <button type="submit" name="send-message" class="btn btn-primary">Send Message</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
      </section>
    </div>
  </div>
</div>
`;
</script>