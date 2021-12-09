<?php
include_once "public/base.php";
include_once "includes/functions.inc.php";
include_once "includes/dbh.inc.php";
?>

<section class="py-5 my-5">
  <div class="container px-lg-5 ">
    <!-- Page Features-->
    <div class="row gx-lg-5">
      <div class="col-lg-6 col-xxl-4 mb-5">
        <div class="card bg-light border-0 h-100">
          <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
            <div
              class="
                feature
                bg-primary bg-gradient
                text-white
                rounded-3
                mb-4
                mt-n4
              "
            >
            <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="20"
                  height="20"
                  fill="currentColor"
                  class="bi bi-person-plus-fill"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"
                  />
                  <path
                    fill-rule="evenodd"
                    d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"
                  />
                </svg>
            </div>
            <h2 class="fs-4 fw-bold">Active Customers</h2>
            <h3 class="mb-0">
              <?php echo totalCustomers($conn) ?>
            </h3>
            <button class="active-customers btn btn-sm btn-primary m-2">More Info</button>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xxl-4 mb-5">
        <div class="card bg-light border-0 h-100">
          <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
            <div
              class="
                feature
                bg-primary bg-gradient
                text-white
                rounded-3
                mb-4
                mt-n4
              "
            >
            <i class="bi bi-patch-check"></i>
            </div>
            <h2 class="fs-4 fw-bold">Bookings Delivered</h2>
            <h3 class="mb-0"><?php echo deliveredBookings($conn) ?></h3>
            <button class="delivered-bookings btn btn-sm btn-primary m-2">More Info</button>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xxl-4 mb-5">
        <div class="card bg-light border-0 h-100">
          <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
            <div
              class="
                feature
                bg-primary bg-gradient
                text-white
                rounded-3
                mb-4
                mt-n4
              "
            >
            <i class="bi bi-chat-square-dots-fill"></i>
            </div>
            <h2 class="fs-4 fw-bold">Complaints</h2>
            <h3 class="mb-0">
            <?php echo totalComplaints($conn) ?>
            </h3>
            <button class="complaints-made btn btn-sm btn-primary m-2">More Info</button>
          </div>
        </div>
      </div>
      
      
      <div class="col-lg-6 col-xxl-4 mb-5 m-auto">
        <div class="card bg-light border-0 h-100">
          <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
            <div
              class="
                feature
                bg-primary bg-gradient
                text-white
                rounded-3
                mb-4
                mt-n4
              "
            >
              <i class="bi bi-patch-check"></i>
            </div>
            <h2 class="fs-4 fw-bold">Total Bookings</h2>
            <h3 class="mb-0">
            <?php echo totalBookings($conn) ?>
            </h3>
            <button class="total-bookings btn btn-sm btn-primary m-2">More Info</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="more-info">


</section>

<!-- BOOKINGS -->
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



<!-- Registered Customers -->
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





<!-- Complaints -->
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
                <th scope="col">Customer Name</th> 
                <th scope="col">Mobile No.</th> 
                <th scope="col">Booking ID</th> 
                <th scope="col">Date</th> 
                <th scope="col">Status</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php 

                    
                
                ?>
                <th>01</th>
                <td>1001</td>
                <td>Abhay Pardeshi</td>
                <td>8999401355</td>
                <td>1002</td>
                <td>31/09/2021</td>
                <td>Delivered</td>
                <td>&#8377;990</td>
                <td><span><button class="btn btn-sm btn-secondary">View Complaint</button></span></td>
                <td><button class="btn btn-sm btn-warning">Message</button></td>
              </tr>
              
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>
</div>



<?php
include_once "public/footer.php"
?>


</body>
</html>


