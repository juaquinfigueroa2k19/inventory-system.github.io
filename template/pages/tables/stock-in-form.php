<?php 
include('../../connect.php');
include('../../date.php');
include('../../notify.php');

if (empty($_SESSION['admin_id'])) {
  header("location: ../form/login.php");
}
unset($_SESSION['ing_search_id']);

if (!empty($_SESSION['error_msg-stock-in'])) {

  if ($_SESSION['error_msg-stock-in'] == 1) {
    echo "<script type='text/javascript'>alert('Failed to add item!!');</script>";
    unset($_SESSION['error_msg-stock-in']);
  }elseif ($_SESSION['error_msg-stock-in'] == 2) {
    echo "<script type='text/javascript'>alert('No available record!!');</script>";
    unset($_SESSION['error_msg-stock-in']);
  }elseif ($_SESSION['error_msg-stock-in'] == 3) {
    echo "<script type='text/javascript'>alert('Stock-in success!!');</script>";
    unset($_SESSION['error_msg-stock-in']);
  }else{
    unset($_SESSION['error_msg-stock-in']);
  }
}elseif (!empty($_SESSION['error_msg-add-unit'])) {
  
  if ($_SESSION['error_msg-add-unit'] == 1) {
    echo "<script type='text/javascript'>alert('invalid input unit!!');</script>";
    unset($_SESSION['error_msg-add-unit']);
  }elseif ($_SESSION['error_msg-add-unit'] == 2) {
    echo "<script type='text/javascript'>alert('invalid input unit pcs!!');</script>";
    unset($_SESSION['error_msg-add-unit']);
  }elseif ($_SESSION['error_msg-add-unit'] == 3) {
    echo "<script type='text/javascript'>alert('Unit update!!');</script>";
    unset($_SESSION['error_msg-add-unit']);
  }elseif ($_SESSION['error_msg-add-unit'] == 4) {
    echo "<script type='text/javascript'>alert('Failed to update!!');</script>";
    unset($_SESSION['error_msg-add-unit']);
  }elseif ($_SESSION['error_msg-add-unit'] == 5) {
    echo "<script type='text/javascript'>alert('No result!!');</script>";
    unset($_SESSION['error_msg-add-unit']);
  }elseif ($_SESSION['error_msg-add-unit'] == 6){
    echo "<script type='text/javascript'>alert('no input!!');</script>";
    unset($_SESSION['error_msg-add-unit']);
  }elseif ($_SESSION['error_msg-add-unit'] == 7) {
    echo "<script type='text/javascript'>alert('unit and pcs update!!');</script>";
    unset($_SESSION['error_msg-add-unit']);
  }else{
    unset($_SESSION['error_msg-add-unit']);
  }
}

$insert = "INSERT INTO log_record (name, activity, timeT, dateT) VALUES ('$name', 'stock-in-form', '$timeT', '$dateT')";
    echo mysqli_query($conn,$insert);

$sql = "SELECT * FROM ingredients";
$result = mysqli_query($conn, $sql);

$count

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sanvills Inventory</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
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
              <h3 class="page-title">Stock in </h3>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" style="height: 700px;">
                      <table class="table table-bordered table-contextual">
                      
                        <thead>
                          <tr>
                            <th> Items </th>
                            <th> Stocks </th>
                            <th> Done </th>
                          </tr>
                        </thead>
                        
                        <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($ing = mysqli_fetch_assoc($result)) {
                                  $_SESSION['ingid'] = $ing['id'];
                                  $ingid = $_SESSION['ingid'];

                                  if ($ing['stocks'] <= $ing['minimum']) {

                                    if (empty($ing['unit'])) {
                                      echo "<tbody>
                                          <form action='sql-stock-in.php' method='post'>
                                          <tr>
                                            <td> ".$ing['product_name']." </td>
                                            <td> <input type='number' name='quan' pattern='[0-9]{1,50}' required='required'> /".$ing['measure']."</td>
                                            <td>
                                                <input type='hidden' name='id' value='$ingid'>
                                                <button class='btn btn-light btn-rounded btn-fw'> done </button> 
                                            </td>
                                          </tr>
                                          </form>
                                        </tbody>";
                                      
                                    }else{
                                      if (!empty($ing['unit_pcs'])) {
                                        echo "<tbody>
                                          <form action='sql-add-ing-unit.php' method='post'>
                                          <tr>
                                            <td> ".$ing['product_name']." </td>
                                            <td>
                                              <input type='number' name='byunit' pattern='[0-9]{1,50}' required='required' >
                                              /unit[".$ing['unit_pcs'].".pcs]
                                            </td>
                                            <td>
                                                <input type='hidden' name='id' value='$ingid'>
                                                <input type='hidden' name='quan' value='".$ing['unit_pcs']."'>
                                                <button class='btn btn-light btn-rounded btn-fw'> done </button> 
                                            </td>
                                          </tr>
                                          </form>
                                        </tbody>";
                                      }else{
                                        echo "<tbody>
                                          <form action='sql-add-ing-unit.php' method='post'>
                                          <tr>
                                            <td> ".$ing['product_name']." </td>
                                            <td>
                                              <input type='number' name='byunit' pattern='[0-9]{1,50}' required='required'> /unit
                                              <input type='number' name='quan' pattern='[0-9]{1,50}' required='required'> /pcs
                                            </td>
                                            <td>
                                                <input type='hidden' name='id' value='$ingid'>
                                                <button class='btn btn-light btn-rounded btn-fw'> done </button> 
                                            </td>
                                          </tr>
                                          </form>
                                        </tbody>";
                                      }
                                    }
                                    
                                  } 
                                }
                            }else{
                                  echo "<tbody>
                                          <tr>
                                            <td colspan='5'><center> No available data yet.</td>
                                          </tr>
                                        </tbody>";
                            }
                        ?>
                                       
                      </table>
                    </div>
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
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>