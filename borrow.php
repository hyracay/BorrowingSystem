<?php
  include("src/db_conn.php")

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Borrowing System</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <!-- <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    /> -->

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
    </head>
    <style>
        .body{
            padding: 7%;
        }
        .card .card-body, .card-light .card-body{
            padding: 2.25rem;
        }
        .card .card-header {
            background-color: #2c0a04;
            color: #fff;
            border-radius: 10px 10px 0 0 !important;
            text-align: left;
        }
        
        .btn-primary {
            background: #2c0a04 !important;
            border: none;
            cursor: pointer;
            /* border-radius: 5px; */
        }

        .btn-primary:hover {
            background-color: #531212 !important;
        }
        #backbutton {
            background: none;
            border: none;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }
        #backbutton:hover {
            color: #ccc;
        }
    </style>
  <body>
  <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="dashboard.php" class="logo">
              <img
                src="src/UB.png"
                alt="navbar brand"
                class="navbar-brand"
                height="50"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item">
                <a href="dashboard.php" aria-expanded="false">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>
              <li class="nav-item">
                <a href="equipments.php"><p>Equipments</p></a>
              </li>
              <li class="nav-item">
                <a href="reservation.php"><p>Reservation</p></a>
              </li>
              <li class="nav-item active">
                <a href="borrow.php"><p>Borrow</p></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->
      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="dashboard.php" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
    <div class="body">
        <div class="card text-center">
            <div class="card-header">
                <button type="button" id="backbutton">< Back</button>
            </div>
            <div class="card-body">
                <form id="borrowForm">
                    <div class="form-group">
                    <h5>What would you like to borrow?</h5>
                        <label for="equipmentcode">Enter equipment code/room</label>
                        <input type="text" class="form-control" id="equipmentcode" placeholder="Example:ABC123">
                    </div>
                    <a href="#" class="btn btn-primary">Next</a>
                    <button type="button" class="btn btn-danger" id="alertButton3">Show Alert</button>
                  </form>
            </div>
            <div class="card-footer text-muted">
                &#169; University of Baguio
            </div>
        </div>
    </div>


    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>
    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>
    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>
    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>


    <script>
        document.getElementById('alertButton3').addEventListener('click', function() {
            swal("Equipment code does not exist.", {
                icon: "error",
                buttons: {
                    confirm: {
                        className: 'btn btn-danger'
                    }
                },
            });
        });
    </script>

</body>

</html>
