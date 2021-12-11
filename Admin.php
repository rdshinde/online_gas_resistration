<?php
include_once "public/base.php";
include_once "includes/functions.inc.php";
include_once "includes/dbh.inc.php";
?>
<section>
  <div class="col-md-12 mt-1 text-center">
        <?php
            if(isset($_GET['err'])){
              if($_GET['err'] == "removed"){
                  echo '<div class="alert alert-warning" role="alert">
                  <b>Customer Removed Successfully!</b>
                </div>';
              }
              else if($_GET['err'] == "status-changed"){
                  echo '<div class="alert alert-warning" role="alert">
                  <b>Booking Status Changed Successfully!</b>
                </div>';
              }
              else if($_GET['err'] == "not-changed"){
                  echo '<div class="alert alert-danger" role="alert">
                  <b>Failed to change booking status!</b>
                </div>';
              }
              else if($_GET['err'] == "message-sent"){
                  echo '<div class="alert alert-success" role="alert">
                  <b>Message sent successfully!</b>
                </div>';
              }
              else if($_GET['err'] == "not-csent"){
                  echo '<div class="alert alert-danger" role="alert">
                  <b>Failed to send message!</b>
                </div>';
              }
            }
          ?>
  </div>
</section>
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





<?php
include_once "public/footer.php"
?>


</body>
</html>


