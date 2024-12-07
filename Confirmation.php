<?php
    include("db_conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Borrowing System - Confirmation</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ["assets/css/fonts.min.css"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
    <style>
        .body {
            padding: 7%;
        }
        .card .card-body {
            padding: 2.25rem;
        }
        .card .card-header {
            background-color: #2c0a04;
            color: #fff;
            border-radius: 10px 10px 0 0 !important;
            text-align: left;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #d3d3d3;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .reserve-btn {
            background-color: #2c0a04;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .reserve-btn:hover {
            background-color: #531212;
        }
    </style>
</head>
<body>
<div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
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
              <li class="nav-item active">
                <a
                  href="homepage.php"
                  aria-expanded="false"
                >
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
            <a href="Confirmation.php"><p>Reservation</p></a>
          </li>

          <li class="nav-item">
            <a href="Reservation.php"><p>Borrowing</p></a>
          </li>
          <li class="nav-item">
              <a href="#"><p>Equipment Monitoring</p></a>
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
              <a href="index.html" class="logo">
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
                <h5>Check if the entered details are correct.</h5>
                <table>
                    <tr>
                        <th>NAME OF FACULTY MEMBER:</th>
                        <td>Cherrie Almazan</td>
                    </tr>
                    <tr>
                        <td>Equipment Code/Room</td>
                        <td>Date and Time of Use</td>
                    </tr>
                    <tr>
                        <td>Hakdog</td> <!-- example lang -->
                        <td>October 31, 2024, 2:00 PM - 4:00 PM</td> <!-- example lang -->
                    </tr>
                </table>
                <button type="button" class="reserve-btn" id="reserveButton">Reserve</button>
            </div>
            <div class="card-footer text-muted">
                &#169; University of Baguio
            </div>
        </div>
    </div>

    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <script src="assets/js/kaiadmin.min.js"></script>
    
    <script>
        document.getElementById('reserveButton').addEventListener('click', function() {
            swal("Reservation Confirmed!", {
                icon: "success",
                buttons: {
                    confirm: {
                        className: 'btn btn-success'
                    }
                },
            });
        });
    </script>
</body>
</html>
