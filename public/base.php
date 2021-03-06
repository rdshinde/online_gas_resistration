<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="AAR Gas Agency now provides services in more than 20 cities of Maharashtra . Register yourself now for availing stunning benefits of online system.">
    <meta name="author" content="" />
    <title>AAR Gas Agency</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Bootstrap icons-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="./css/style.css" rel="stylesheet" />
    <!-- Fontawesome CDN -->
    <script src="https://kit.fontawesome.com/fde0352739.js" crossorigin="anonymous"></script>

  </head>
  <body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
      <div class="container px-lg-5">
        <a class="navbar-brand h1 mb-0" href="./index.php">AAR Gas Agency</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <strong><a class="nav-link px-md-5" aria-current="page" href="./index.php">Home</a></strong>
            </li>
            <?php 
                if(isset($_SESSION["adminID"])){
                  echo '<li class="nav-item px-md-3"><a class="nav-link" href="./admin.php">'.$_SESSION["adminID"].'</a></li>
                        <li class="nav-item px-md-3">
                              <a class="nav-link text-warning" href="includes/logout.inc.php" 
                                ><button class="btn btn-sm btn-danger"> Logout</button>
                              </a>
                            </li>
                  ';
                      
                }
                else if(isset($_SESSION["consumerID"])){
                  echo '<li class="nav-item px-md-3"><a class="nav-link" href="./profile.php">Profile</a></li>
                          <li class="nav-item px-md-3">
                          <a class="nav-link" href="includes/logout.inc.php" 
                            ><button class="btn btn-sm btn-danger"> Logout</button>
                          </a>
                        </li>
                  ';
                }
                else{
                    echo '
                    <li class="nav-item px-md-3"><a class="nav-link" href="./admin_login.php">Admin Login</a></li>
                    <li class="nav-item px-md-3">
                          <a class="nav-link" href="./login.php"
                            ><button class="btn btn-sm btn-primary">Customer Login</button>
                          </a>
                        </li>';
                }
            ?>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header-->
    
