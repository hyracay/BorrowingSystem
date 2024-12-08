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
              <li class="nav-item">
                <a href="borrow.php"><p>Borrow</p></a>
              </li>
              <li class="nav-item active">
                <a href="recycle.php"><p>Recycle Bin</p></a>
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
          <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <div class="logo-header" data-background-color="dark">
                        <a href="dashboard.php" class="logo">
                            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Recycle Bin</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Table for Equipment List -->
                            <div class="table-responsive">
                                <form id="equipmentForm" method="POST">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Equipment</th>
                                                <th>Code</th>
                                                <th>Brand</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Equipment</th>
                                                <th>Code</th>
                                                <th>Brand</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        
                                        <tbody>
                                            <?php if (mysqli_num_rows($result) > 0): ?>
                                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                                    <tr>
                                                        <td><?= $row['equipmentName'] ?></td>
                                                        <td><?= $row['equipmentCode'] ?></td>
                                                        <td><?= $row['brand'] ?></td>
                                                        <td><?= $row['category'] ?></td>
                                                        <td><?= $row['status'] ?></td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <!-- restore button -->
                                                                <button type="button" class="btn btn-link btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"
                                                                    data-id="<?= $row['equipmentCode'] ?>"
                                                                    data-name="<?= $row['equipmentName'] ?>"
                                                                    data-brand="<?= $row['brand'] ?>"
                                                                    data-category="<?= $row['category'] ?>"
                                                                    data-status="<?= $row['status'] ?>">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-link btn-danger delete-btn" 
                                                                    data-id="<?= $row['equipmentCode'] ?>" 
                                                                    data-bs-toggle="tooltip" 
                                                                    data-bs-placement="top" 
                                                                    title="Delete">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="4">No equipment found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const equipmentData = {
                        equipmentCode: this.dataset.id,
                        equipmentName: this.dataset.name,
                        brand: this.dataset.brand,
                        category: this.dataset.category,
                        status: this.dataset.status
                    };

                    // Populate modal fields
                    document.getElementById('equipmentCode').value = equipmentData.equipmentCode;
                    document.getElementById('equipmentName').value = equipmentData.equipmentName;
                    document.getElementById('brand').value = equipmentData.brand;
                    document.getElementById('category').value = equipmentData.category;
                    document.getElementById('status').value = equipmentData.status;

                    // Show modal
                    const editModal = new bootstrap.Modal(document.getElementById('editModal'));
                    editModal.show();
                    });
                });

                // Handle form submission
                document.getElementById('editForm').addEventListener('submit', function(e) {
                    e.preventDefault();

                    const formData = new FormData(this);

                    fetch('update_equipment.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Equipment updated successfully!');
                                location.reload(); // Reload page to reflect changes
                            } else {
                                alert('Error updating equipment.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    });

                    document.querySelectorAll('.delete-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const equipmentCode = this.dataset.id;

                        // Confirm deletion
                        if (confirm('Are you sure you want to delete this equipment?')) {
                            // Send a POST request to delete the equipment
                            fetch('delete.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                                body: `equipmentCode=${equipmentCode}`
                            })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        location.reload(); // Reload page to update the table
                                        alert('Equipment deleted successfully!');
                                    } else {
                                        alert(`Error deleting equipment: ${data.error}`);
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    alert('An error occurred while deleting the equipment.');
                                });
                        }
                    });
                });
            </script>
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
