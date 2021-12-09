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
                <th scope="col">Status</th>
                <th scope="col">Price</th>
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
                      <td><select class="form-select form-select-sm">
                            <option value="pending">Pending</option>
                            <option value="delivered">Delivered</option>
                          </select>
                      </td>
                      <td>&#8377;990</td>
                      <td><span><button class="btn btn-sm btn-warning">Update Status</button></span></td>
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
                <th scope="col">Status</th>
                <th scope="col">Price</th>
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
                      <td><select class="form-select form-select-sm">
                            <option value="Pending">Pending</option>
                            <option value="Delivered" selected>Delivered</option>
                          </select>
                      </td>
                      <td>&#8377;990</td>
                      <td><span><button class="btn btn-sm btn-warning">Update Status</button></span></td>
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
</script>