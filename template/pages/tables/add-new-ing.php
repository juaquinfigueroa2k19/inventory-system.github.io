<?php 
include('../../connect.php');
include('../../date.php');
include('../../notify.php');
date_default_timezone_set('Asia/Manila');

if (empty($_SESSION['admin_id'])) {
  header("location: ../form/login.php");
}

unset($_SESSION['ing_search_id']);

$insert = "INSERT INTO log_record (name, activity, timeT, dateT) VALUES ('$name', 'register-form-ingredient', '$timeT', '$dateT')";
echo mysqli_query($conn,$insert);

if (!empty($_SESSION['error_msg-add-ing'])) {
  
  if ($_SESSION['error_msg-add-ing'] == 1) {
    
    echo "<script type='text/javascript'>alert('Item already exists!!');</script>";
    unset($_SESSION['error_msg-add-ing']);
  }elseif ($_SESSION['error_msg-add-ing'] == 3) {
    echo "<script type='text/javascript'>alert('Failed to add product!!');</script>";
    unset($_SESSION['error_msg-add-ing']);
  }
}

$sql = "SELECT * FROM ingredients";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.php -->
      
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.php"><img src="../../assets/images/sanvills.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="table.php">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Inventory</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="add-new-ing.php">
              <span class="menu-icon">
                <i class="mdi mdi-note-plus"></i>
              </span>
              <span class="menu-title">Add Product</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="stock-in-form.php">
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
            <a class="nav-link" href="stock-out-form.php">
              <span class="menu-icon">
                <i class="mdi mdi-database-minus"></i>
              </span>
              <span class="menu-title">Stock-out</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/record-log/record-log.php">
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
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="../../index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
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
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="../../assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['admin_name']; ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="../../logout.php">
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
          <div class="content-wrapper"  style="background-image: url('../../assets/images/auth/Login_bg.jpg'); background-size: cover;">
            <div class="page-header">
              <h3 class="page-title">Add Product </h3>
            </div>
            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Measure:</h4>
                    <p class="card-description"> kg, pcs, g</p>
                    <form class="forms-sample" action="sql-add-ing.php" method="post">
                      <div class="form-group">
                        <label>Product Name: </label>
                        <input type="text" class="form-control" name="name" pattern="[a-zA-Z ]{1,50}" required='required' title="Letters only."> 
                      </div>
                      <div class="form-group">
                      <label>Measure:</label>
                      <select class="js-example-basic-single" name="meas">
                        <option value="">Choose</option>
                          <option value="pcs">Pieces (pcs)</option>
                          <option value="kg">Kilograms (kg)</option>
                          <option value="g">Grams (g)</option>
                      </select>
                      </div>
                      <div class="form-group">
                        <label>Category: </label>
                        <select class="js-example-basic-single" name="cate" style="text-decoration-color: white;" required>
                          <option value="">Choose</option>
                          <option value="vegetables">Vegetables</option>
                          <option value="spices">Spices and Herbs</option>
                          <option value="meat">Meat</option>
                          <option value="Dairy">Dairy Products</option>
                          <option value="fruits">Fruits</option>
                          <option value="seafood">Seafood</option>
                          <option value="sugar">Sugar Products</option>
                          <option value="nuts">Nuts and Oil</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Minimum: </label>
                        <input type="number" class="form-control" pattern="[0-9\]{1,50}" name="min" required='required' title="Letters are not allowed">
                      </div>
                      <div class="form-group">
                        <label>Maximum: </label>
                        <input type="number" class="form-control" pattern="[0-9\]{1,50}" name="max" required='required' title="Letters are not allowed">
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <!-- <button class="btn btn-dark">Cancel</button> -->
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Measure:</h4>
                    <p class="card-description"> unit, ml, L </p>
                    <form class="forms-sample" action="sql-add-unit-ing.php" method="post">
                      <div class="form-group">
                        <label>Product Name: </label>
                        <input type="text" class="form-control" name="name" pattern="[a-zA-Z ]{1,50}" required='required' title="Letters only."> 
                      </div>
                      <div class="form-group">
                        <label>Measure: </label>
                        <select class="js-example-basic-single" name="meas" style="text-decoration-color: white;" required>
                          <option value="">Choose</option>
                          <option value="unit">Unit (unit)</option>
                          <option value="ml">Milliliter (ml)</option>
                          <option value="L">Liter (L)</option>
                          <option value="gal">Gallon (gal)</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Category: </label>
                        <select class="js-example-basic-single" name="cate" style="text-decoration-color: white;" required>
                          <option value="">Choose</option>
                          <option value="vegetables">Vegetables</option>
                          <option value="spices">Spices and Herbs</option>
                          <option value="meat">Meat</option>
                          <option value="Dairy">Dairy Products</option>
                          <option value="fruits">Fruits</option>
                          <option value="seafood">Seafood</option>
                          <option value="sugar">Sugar Products</option>
                          <option value="nuts">Nuts and Oil</option>
                          <option value="beverage">Beverage</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Minimum by-unit: </label>
                        <input type="number" class="form-control" pattern="[0-9\.]{1,50}" name="min" required='required' title="number are not allowed">
                      </div>
                      <div class="form-group">
                        <label>Maximum by-unit: </label>
                        <input type="number" class="form-control" pattern="[0-9\.]{1,50}" name="max" required='required' title="number are not allowed">
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <!-- <button class="btn btn-dark">Cancel</button> -->
                    </form>
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
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/select2/select2.min.js"></script>
    <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>
  </body>
</html>