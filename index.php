<?php
include_once "public/base.php"
?>

<?php 
    if(isset($_SESSION["consumerID"])){
      echo '<div class="container px-lg-5 my-5">
      <div class="p-4 p-lg-5 bg-light rounded-3">
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
                  <input type="text" class="form-control" value="'.$_SESSION["consumerID"].'" disabled id="consumer-id" />
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
                  <button type="submit" class="btn btn-primary">
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
    else{
      echo '<!-- Header-->
      <header class="py-5">
        <div class="container px-lg-5">
          <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
            <div class="m-4 m-lg-5">
              <h1 class="display-5 fw-bold">A warm welcome!</h1>
              <p class="fs-4">
                <b>AAR Gas Agency</b> now provides services in more than
                <b>20 cities of Maharashtra</b> . Register yourself now for availing
                stunning benefits of online system.
              </p>
              <a class="btn btn-secondary btn-lg" href="signup.php">Take a New Connection </a>
            </div>
          </div>
        </div>
      </header>
      <!-- Page Content-->
      <section class="pt-4">
        <div class="container px-lg-5">
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
                    <i class="bi bi-collection"></i>
                  </div>
                  <h2 class="fs-4 fw-bold">Fresh new layout</h2>
                  <p class="mb-0">
                    With Bootstrap 5, we have created a fresh new layout for this
                    template!
                  </p>
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
                    <i class="bi bi-cloud-download"></i>
                  </div>
                  <h2 class="fs-4 fw-bold">Free to download</h2>
                  <p class="mb-0">Now you can download your bills anytime.</p>
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
                    <i class="bi bi-card-heading"></i>
                  </div>
                  <h2 class="fs-4 fw-bold"></h2>
                  <p class="mb-0">
                    The heroic part of this template is the jumbotron hero header!
                  </p>
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
                    <i class="bi bi-bootstrap"></i>
                  </div>
                  <h2 class="fs-4 fw-bold">Quick Bookings and Delivery</h2>
                  <p class="mb-0">
                    We are the fastest service provider in Maharashtra!
                  </p>
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
                  <h2 class="fs-4 fw-bold">Simple online interface</h2>
                  <p class="mb-0">
                    Simple to use interface of online registration portal.
                  </p>
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
                  <h2 class="fs-4 fw-bold">A name you trust</h2>
                  <p class="mb-0">
                    Foudation of our growth is faith of 50,000+ customers.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>';
    }
?>


<?php
include_once "public/footer.php"
?>
