<?php
include_once "public/base.php";
include_once "includes/dbh.inc.php";
include_once "includes/functions.inc.php";
?>

<!-- Page Content-->
<!-- Message Section -->
<section>
  <div class="col-md-12 mt-1 text-center">
        <?php
            if(isset($_GET['err'])){
              if($_GET['err'] == "none"){
                  echo '<div class="alert alert-success" role="alert">
                  <b>Booking Made Successfully!</b>
                </div>';
              }
              else if($_GET['err'] == "complaint-registered"){
                  echo '<div class="alert alert-success" role="alert">
                  <b>Complaint Registered Successfully!</b>
                </div>';
              }
            }
          ?>
  </div>
</section>
<!-- Profile Edit Section and Complaint messages section. -->
<section class="pt-4 my-5">
  <div class="container px-lg-5">
    <!-- Page Features-->
    <div class="row gx-lg-5">
      
      <div class="col-lg-9 col-xxl-8 mb-5">
        <div class="card bg-light border-0 h-100 rounded-3 shadow">
          <div class="card-body  p-4 p-lg-5 pt-0 pt-lg-0">
          <?php
              if(isset($_SESSION["consumerID"])){
                    echo '<div class="p-3">
                    <div class="">
                      <h1 class="display-3 mb-3 pb-2 text-center ">Your Profile</h1>
                      <div class="">
                        <section class="booking">
                          
                          <div class="">
                            <form class="row g-3" method="POST" action="includes/booking.inc.php">
                            <div class="col-md-6">
                                <label for="consumer-id" class="form-label"
                                  >Consumer ID*</label
                                >
                                <input type="text" class="form-control" value="'.$_SESSION["consumerID"].'" readonly id="consumer-id" />
                              </div>
                              <div class="col-md-6">
                                <label for="mobile-no" class="form-label"
                                  >Mobile Number*</label
                                >
                                <input type="text" value="'.$_SESSION["mobileNo"].'" class="form-control" id="mobile-no" />
                              </div>
                              <div class="col-md-6">
                                <label for="email" class="form-label">Name*</label>
                                <input type="email" value="'.$_SESSION["name"].'" class="form-control" id="email" />
                              </div>
                              <div class="col-md-6">
                                <label for="email" class="form-label">Email*</label>
                                <input type="email" value="'.$_SESSION["email"].'" class="form-control" id="email" />
                              </div>
                              
                              <div class="col-md-12">
                                <label for="inputAddress" class="form-label">Address*</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="inputAddress"
                                  value="'.$_SESSION["address"].'"
                                />
                              </div>
                  
                              <div class="col-md-7">
                                <label for="inputCity" class="form-label">City</label>
                                <input type="text" value="'.$_SESSION["city"].'" class="form-control" id="inputCity" />
                              </div>
                              <div class="col-md-5">
                                <label for="inputZip" class="form-label">Pincode*</label>
                                <input type="text" value="'.$_SESSION["pincode"].'" class="form-control" id="inputZip" />
                              </div>
                              <div class="col-12">
                                
                              <div class="col-12">
                                <button type="submit" name="edit-profile" class="btn btn-primary">
                                Save Changes
                                </button>
                              </div>
                            </form>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>';
                  }
              ?>
          </div>
        </div>
      </div>
      <aside class="col-lg-6 col-xxl-4 mb-5 ">
        <div class="card bg-light shadow rounded-3 border-0 h-100 text-center p-3">
          <div class="text-center p-1">
            <div><h2 class="display-5">Messages</h2></div>
          </div>
          <div class="msg bg-dark text-light rounded-3 m-2">
                  <p class="mb-0 p-2">Acoount Created Successfully!</p>
          </div>
        </div>
      </aside>

      <div class="col-lg-12 text-center p-5">
            <div><h2 class="display-3">Statistics</h2></div>
      </div>
      <section class="stats d-flex justify-content-evenly mt-md-5 flex-wrap">
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
                <i class="bi bi-code"></i>
              </div>
              <h2 class="fs-4 fw-bold">Total Bookings.</h2>
              <h2 class="mb-0">
                    <?php 
                    $id = $_SESSION["consumerID"];
                    
                    echo customerBookings($conn, $id)
                    ?>
              </h2>
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
                <i class="bi bi-code"></i>
              </div>
              <h2 class="fs-4 fw-bold">Bookings Delivered Successfully.</h2>
              <h2 class="mb-0">
              <?php 
                    $id = $_SESSION["consumerID"];
                    
                    echo deliveredCustomerBookings($conn, $id)
                    ?>
              </h2>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</section>
      <?php
      if(isset($_SESSION["consumerID"])){
            echo '<div class="container px-lg-5 my-5">
            <div class=" p-lg-5 bg-light rounded-3 shadow">
              <h1 class="display-3 text-center ">Welcome, '.$_SESSION["name"].'</h1>
              <div class="m-4 m-lg-5">
                <section class="booking">
                  <h2 class="display-6 text-center pb-3">Book Your Cylinder Now!</h2>
                  <div class="m-4 m-lg-5">
                    <form class="row g-3" method="POST" action="includes/booking.inc.php">
                    <div class="col-md-3">
                        <label for="consumer-id" class="form-label"
                          >Consumer ID*</label
                        >
                        <input type="text" class="form-control" value="'.$_SESSION["consumerID"].'" readonly id="consumer-id" />
                      </div>
                      <div class="col-md-3">
                        <label for="mobile-no" class="form-label"
                          >Mobile Number*</label
                        >
                        <input type="text" value="'.$_SESSION["mobileNo"].'" class="form-control" id="mobile-no" />
                      </div>
                      <div class="col-md-6">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" value="'.$_SESSION["email"].'" class="form-control" id="email" />
                      </div>
                      
                      <div class="col-12">
                        <label for="inputAddress" class="form-label">Address*</label>
                        <input
                          type="text"
                          class="form-control"
                          id="inputAddress"
                          value="'.$_SESSION["address"].'"
                        />
                      </div>
          
                      <div class="col-md-6">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" value="'.$_SESSION["city"].'" class="form-control" id="inputCity" />
                      </div>
                      <div class="col-md-4">
                        <label for="inputState" class="form-label">State</label>
                        <select id="inputState" class="form-select">
                          <option selected>Choose...</option>
                          <option selected>Maharashtra</option>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <label for="inputZip" class="form-label">Pincode*</label>
                        <input type="text" value="'.$_SESSION["pincode"].'" class="form-control" id="inputZip" />
                      </div>
                      <div class="col-12">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            id="gridCheck"
                            required
                          />
                          <label class="form-check-label" for="gridCheck">
                            Accept all <a href="#">terms and conditions.</a>
                          </label>
                        </div>
                      </div>
                      <div class="col-12">
                        <button type="submit" name="make-booking" class="btn btn-primary">
                          Make Booking
                        </button>
                      </div>
                    </form>
                  </div>
                </section>
              </div>
            </div>
          </div>';
          }
      ?>
<div class="container px-lg-2 my-5">
  <div class="p-1 p-lg-2 rounded-3">
    <h1 class="display-5 text-center">Your Booking's History</h1>
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
                <th scope="col">Booking ID</th> 
                <th scope="col">Date</th> 
                <th scope="col">Status</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <?php
                    $id = $_SESSION["consumerID"];
                    
                    $sql = "SELECT * FROM Booking WHERE consumer_id=$id";
                    $results = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($results);
                    if($resultCheck >0){
                      $sr = 1;
                      while($row = mysqli_fetch_assoc($results)){
                        $booking_id = $row["booking_id"];
                        $status = $row["status_field"];
                        $date = substr($row["mtimestamp"],0,10);
                        echo '<tr>
                                <th>'.$sr.'</th>
                                <td>'.$booking_id.'</td>
                                <td>'.$date.'</td>
                                <td>'.$status.'</td>
                                <td>&#8377;990</td>
                                <td><span><button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Make Complaint</button></span></td>
                                <td><button class="btn btn-sm btn-secondary">Download Bill</button></td>
                              </tr>
                             
                                <!-- Modal -->
                                  <div class="modal fade" id="exampleModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title text-danger" id="exampleModal">Make Complaint</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <!-- Complaint Form in Modal -->
                                        <form method="POST" action="includes/complaint.inc.php">
                                            <div class="mb-3 text-start">
                                              <label for="consumer-id" class="form-label">Consumer ID</label>
                                              <input type="number" name="consumer-id" class="form-control" value="'.$_SESSION["consumerID"].'" readonly id="consumer-id">
                                            </div>
                                            <div class="mb-3 text-start">
                                              <label for="booking-id"  class="form-label">Booking ID</label>
                                              <input type="text" name="booking-id" class="form-control" placeholder="Enter Booking ID"  value="'.$booking_id.'" id="booking-id">
                                            </div>
                                            <div class="form-floating text-start mt-3 mb-3">
                                              
                                              <textarea class="form-control" name="complaint" id="complaint-details"></textarea>
                                              <label for="complaint-details">Complaint Details</label>
                                            </div>
                                            <button type="submit" name="make-complaint" class="btn btn-danger">Register Complaint</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </tr>';
                        $sr = $sr+1;  
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

<?php
include_once "public/footer.php"
?>