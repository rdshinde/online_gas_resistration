<?php
include_once "public/base.php"
?>
<section class="py-5">
<div class="container px-lg-5">
  <div class="p-4 p-lg-5 bg-light rounded-3 ">
  <h2 class="display-3 text-center p-3">Register for new Connection</h2>
    <div class="m-4 m-lg-5">
      
      <form class="row g-3" method="POST" action="./includes/signup.inc.php">
        <div class="col-md-12">
          <label for="name" class="form-label">Full Name</label>
          <input type="name" name="name" class="form-control" id="name" />
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="inputEmail4" />
        </div>
        <div class="col-md-6">
          <label for="mobile" class="form-label">Mobile Number</label>
          <input type="text" name="mobile-no" class="form-control" id="mobile" />
        </div>
        <div class="col-md-6">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="pwd" class="form-control" id="password" />
        </div>
        <div class="col-md-6">
          <label for="repeatPassword" class="form-label">Confirm Password</label>
          <input type="password" name="repeat-pwd" class="form-control" id="repeatPassword" />
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input
            type="text"
            class="form-control"
            id="inputAddress"
            name="address"
            placeholder="Shree Apartments, MG Road, Shivajinagar, Pune."
          />
        </div>
        
        <div class="col-md-6">
          <label for="inputCity" class="form-label">City</label>
          <input type="text" name="city" class="form-control" id="inputCity" />
        </div>
        <div class="col-md-4">
          <label for="inputState" class="form-label">State</label>
          <select id="inputState" name="state" class="form-select">
            <option selected>Choose...</option>
            <option value="Maharashtra">Maharashtra</option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="inputZip" class="form-label">Pincode</label>
          <input type="text" name="pincode" class="form-control" id="inputZip" />
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" required type="checkbox" id="gridCheck" required />
            <label class="form-check-label" for="gridCheck">
              Accept all <a href="#">terms and conditions.</a> 
            </label>
          </div>
        </div>
        <div class="col-12">
          <button type="submit" name="create-user" class="btn btn-primary">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
<?php
include_once "public/footer.php"
?>
