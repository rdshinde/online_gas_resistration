<?php
include_once "public/base.php"
?>
<section class="py-5">
<div class="container px-lg-5">
  <div class="p-4 p-lg-5 bg-light rounded-3 ">
      <h2 class="display-3 text-center p-3"> Administrator Login</h2>
    <div class="m-4 m-lg-5">
        <main class="container mt-5 col-md-6">
          <!-- Error Message Display -->
        <?php
          if(isset($_GET['err'])){
            if($_GET['err'] == "emptyInputs"){
                echo '<div class="alert alert-danger" role="alert">
                <b>Please fill all necessary inputs.</b>
              </div>';
            }
            else if($_GET['err'] == "wrongPassword"){
              echo '<div class="alert alert-danger" role="alert">
                <b>Passwords should match.</b>
              </div>';
            }
            
          }
        ?>
          <form class="form-group" action="includes/admin_login.inc.php" method="POST">
            <form>
              <div class="mb-3">
                <label for="admin-email" class="form-label"
                  >Admin ID</label
                >
                <input
                  type="email"
                  name="admin-email"
                  class="form-control"
                  id="admin-email"
                 
                />
                
              </div>
              <div class="mb-3">
                <label for="password" class="form-label"
                  >Password</label
                >
                <input type="password" name="admin-password" id="password" class="form-control" aria-describedby="passwordHelpBlock">
              </div>
              
              <div class="mb-3 form-check">
                <input
                  type="checkbox"
                  name="show-password"
                  class="form-check-input"
                  id="show-password"
                />
                <label class="form-check-label" for="show-password"
                  >See Password</label
                >
              </div>
              <div class="d-flex w-100 align-items-center justify-content-center">
              <button type="submit" name="submit-admin-login" class="btn btn-info">Login</button></div>
            
          </form>
        

               
      
    </main>
                    <script>
                      function showPassword() {
                        var ele = document.getElementById("password");
                        if (ele.type === "password") {
                          ele.type = "text";
                        } else {
                          ele.type = "password";
                        }
                      }
                      document.querySelector('#show-password').addEventListener('click',showPassword);
                    </script>
              </section>
          </div>
        </div>
      </div>
<?php
include_once "public/footer.php"
?>