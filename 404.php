<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

require_once('partials/_head.php');
require_once('partials/_analytics.php');
?>

<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    ?>
    <!-- Header -->
    <div style="background-image: url(../admin/assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
      <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-4 col-lg-6">
              <a href="orders">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-purple text-white rounded-circle shadow">
                          <i class="fas fa-utensils"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-xl-4 col-lg-6">
              <a href="orders_reports">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                          <i class="fas fa-shopping-cart"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-xl-4 col-lg-6">
              <a href="payments_reports">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">

                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                          <i class="fas fa-wallet"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
             
            </div>
          </div>
        </div>
      </div>
		
      <div class="row mt-5">
        <div class="col-xl-12">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php require_once('partials/_footer.php'); ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>