<?php 
include('connect.php');
include('date.php');
include('notify.php');

if (empty($_SESSION['admin_id'])) {
  header("location: pages/form/login.php");
}
unset($_SESSION['ing_search_id']);

$insert = "INSERT INTO log_record (name, activity, timeT, dateT) VALUES ('$name', 'dashboard', '$timeT', '$dateT')";
echo mysqli_query($conn,$insert);

$fetch = "SELECT * FROM ingredients";
$resulta = mysqli_query($conn, $fetch);
$resultb = mysqli_query($conn, $fetch);
$resultc = mysqli_query($conn, $fetch);
$resultd = mysqli_query($conn, $fetch);
$resulte = mysqli_query($conn, $fetch);
$resultf = mysqli_query($conn, $fetch);
$resultg = mysqli_query($conn, $fetch);
$resulth = mysqli_query($conn, $fetch);
$resulti = mysqli_query($conn, $fetch);
$resultj = mysqli_query($conn, $fetch);
$resultk = mysqli_query($conn, $fetch);
$resultl = mysqli_query($conn, $fetch);
$resultm = mysqli_query($conn, $fetch);
$resultn = mysqli_query($conn, $fetch);
$resulto = mysqli_query($conn, $fetch);
$resultp = mysqli_query($conn, $fetch);
$resultbeverageA = mysqli_query($conn, $fetch);
$resultbeverageB = mysqli_query($conn, $fetch);


?>

<!DOCTYPE html>
<php lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SanVills Inventory</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
        </div>
      </div>

      <!-- partial:partials/_sidebar.php -->
      
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.php"><img src="assets/images/sanvills.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="pages/tables/table.php">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Inventory</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="pages/tables/add-new-ing.php">
              <span class="menu-icon">
                <i class="mdi mdi-note-plus"></i>
              </span>
              <span class="menu-title">Add Product</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="pages/tables/stock-in-form.php">
              <span class="menu-icon">
                <i class="mdi mdi-database-plus"></i>
              </span>
              <span class="menu-title">Stock-in</span><h4 style="color: #ff4949; padding-left: 10px;" ><?php

              if (!empty($note)) {
                echo $note;
              }

               ?></h4>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="pages/tables/stock-out-form.php">
              <span class="menu-icon">
                <i class="mdi mdi-database-minus"></i>
              </span>
              <span class="menu-title">Stock-out</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="pages/record-log/record-log.php">
              <span class="menu-icon">
                <i class="mdi mdi-script"></i>
              </span>
              <span class="menu-title">Record Log</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- partial -->

      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.php -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown"  data-bs-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['admin_name']; ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="pages/form/signup.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Add Admin</p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item" href="#">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Add Account</p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item" href="logout.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper" style="background-image: url('assets/images/auth/Login_bg.jpg'); background-size: cover;">
            <div class="page-header">
              <h3 class="page-title">Place Order</h3>
            </div>
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Vegetables</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resulta) > 0) {
                      while ($ing = mysqli_fetch_assoc($resulta)) {
                        if ($ing['category'] == 'vegetables') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| min: ".$ing['minimum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Spices and Herbs</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultb) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultb)) {
                        if ($ing['category'] == 'spices') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| min: ".$ing['minimum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Meat</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultc) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultc)) {
                        if ($ing['category'] == 'meat') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| min: ".$ing['minimum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Dairy Product</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultd) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultd)) {
                        if ($ing['category'] == 'Dairy') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| min: ".$ing['minimum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Fruits</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resulte) > 0) {
                      while ($ing = mysqli_fetch_assoc($resulte)) {
                        if ($ing['category'] == 'fruits') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| min: ".$ing['minimum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Seafood</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultf) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultf)) {
                        if ($ing['category'] == 'seafood') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| min: ".$ing['minimum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Sugar Products</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultg) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultg)) {
                        if ($ing['category'] == 'sugar') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| min: ".$ing['minimum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>


              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Nuts and Oilseeds</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resulth) > 0) {
                      while ($ing = mysqli_fetch_assoc($resulth)) {
                        if ($ing['category'] == 'nuts') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| min: ".$ing['minimum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Beverages</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultbeverageA) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultbeverageA)) {
                        if ($ing['category'] == 'beverage') {
                          if ($ing['stocks'] <= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| min: ".$ing['minimum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

            </div>


            <div class="page-header">
              <h3 class="page-title">Overstock</h3>
            </div>
            <div class="row">
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Vegetables</th>
                      </tr>

                    <?php

                    if (mysqli_num_rows($resulti) > 0) {
                      while ($ing = mysqli_fetch_assoc($resulti)) {
                        if ($ing['category'] == 'vegetables') {
                          if ($ing['stocks'] >= $ing['maximum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| max: ".$ing['maximum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Spices and Herbs</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultj) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultj)) {
                        if ($ing['category'] == 'spices') {
                          if ($ing['stocks'] >= $ing['maximum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| max: ".$ing['maximum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Meat</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultk) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultk)) {
                        if ($ing['category'] == 'meat') {
                          if ($ing['stocks'] >= $ing['maximum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| max: ".$ing['maximum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Dairy Product</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultl) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultl)) {
                        if ($ing['category'] == 'Dairy') {
                          if ($ing['stocks'] >= $ing['maximum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| max: ".$ing['maximum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Fruits</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultm) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultm)) {
                        if ($ing['category'] == 'fruits') {
                          if ($ing['stocks'] >= $ing['maximum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| max: ".$ing['maximum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Seafood</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultn) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultn)) {
                        if ($ing['category'] == 'seafood') {
                          if ($ing['stocks'] >= $ing['maximum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| max: ".$ing['maximum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Sugar Products</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resulto) > 0) {
                      while ($ing = mysqli_fetch_assoc($resulto)) {
                        if ($ing['category'] == 'sugar') {
                          if ($ing['stocks'] >= $ing['maximum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| max: ".$ing['maximum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>


              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Nuts and Oilseeds</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultp) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultp)) {
                        if ($ing['category'] == 'nuts') {
                          if ($ing['stocks'] >= $ing['maximum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| max: ".$ing['maximum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table>
                      <tr>
                        <th>Beverages</th>
                      </tr>
                    <?php

                    if (mysqli_num_rows($resultbeverageB) > 0) {
                      while ($ing = mysqli_fetch_assoc($resultbeverageB)) {
                        if ($ing['category'] == 'beverage') {
                          if ($ing['stocks'] >= $ing['minimum']) {
                            echo "<tr>
                                    <td>".$ing['product_name']."</td>
                                    <td style='color: red;'>".$ing['stocks'].".".$ing['measure']."</td>
                                    <td>| min: ".$ing['minimum'].".".$ing['measure']."</td>
                                  </tr>";
                          }
                        }
                      }
                    }

                    ?>
                  </table>
                  </div>
                </div>
              </div>

            </div>



          </div>
          <!-- content-wrapper ends -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</php>