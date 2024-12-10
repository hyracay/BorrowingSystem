<?php
include("src/db_conn.php");

if (isset($_POST['submitAdd'])) {
    // Get data from POST request
    $equipmentName = $_POST['equipmentName'];
    $equipmentCode = $_POST['equipmentCode'];
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $status = $_POST['status'];

    // Insert new equipment into the database
    $sql = "INSERT INTO equipment (equipmentName, equipmentCode, brand, category, status) VALUES ('$equipmentName', '$equipmentCode', '$brand' , '$category', '$status')";

    if (mysqli_query($conn, $sql)) {
        // Refresh page to show new equipment
        header("Location: equipments.php"); // Use header redirection to prevent form resubmission
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// if (isset($_GET['id'])) {
//     $equipmentCode = $_GET['id'];

//     $query = "SELECT * FROM equipment WHERE equipmentCode = '$equipmentCode'";
//     $result = mysqli_query($conn, $query);

//     if ($result && mysqli_num_rows($result) > 0) {
//         $equipment = mysqli_fetch_assoc($result);
//     } else {
//         echo "No found.";
//         exit();
//     }
// } else {
//     echo "No profile ID specified.";
//     exit();
// }

if (isset($_POST['editEquipment'])) {
    $equipmentName = $_POST['equipmentName'];
    $equipmentCode = $_POST['equipmentCode'];
    $brand = $_POST['brand'];
    $category = $_POST['category'];
    $status = $_POST['status'];

    $update = "UPDATE equipment SET
                equipmentName = '$equipmentName',
                equipmentCode = '$equipmentCode',
                brand = '$brand',
                category = '$category',
                status = '$status',
                WHERE equipmentCode = '$equipmentCode'";

    $result = mysqli_query($conn, $update);
    if ($result) {
        header("location: equipment.php");
    }
}

// Fetch equipment data from the database
$sql = "SELECT equipmentCode, equipmentName, brand, category, status FROM equipment";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowing System</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <div class="logo-header" data-background-color="dark">
                    <a href="dashboard.php" class="logo">
                        <img src="src/UB.png" alt="navbar brand" class="navbar-brand" height="50" />
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
                        <li class="nav-item active">
                            <a href="equipments.php">
                                <p>Equipments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="reservation.php">
                                <p>Reservation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="borrow.php">
                                <p>Borrow</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="recycle.php">
                                <p>Recycle Bin</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Panel -->
        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <div class="logo-header" data-background-color="dark">
                        <a href="dashboard.php" class="logo">
                            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">EQUIPMENTS</h4>
                                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add New
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal for Adding Equipment -->
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> New</span>
                                                <span class="fw-light"> Row </span>
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="equipments.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Equipment</label>
                                                            <input id="addEquipment" type="text" class="form-control"
                                                                placeholder="Equipment Name" name="equipmentName"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Brand</label>
                                                            <input id="equipmentBrand" type="text" class="form-control"
                                                                placeholder="Brand" name="brand" required />
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Category</label>
                                                                <input id="equipmentCategory" type="text"
                                                                    class="form-control" placeholder="Category"
                                                                    name="category" required />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Status</label>
                                                                <input id="equipmentStatus" type="text"
                                                                    class="form-control" placeholder="Status"
                                                                    name="status" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="submit" class="btn btn-primary" name="submitAdd">
                                                        Add
                                                    </button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Table for Equipment List -->
                            <div class="table-responsive">
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
                                                            <button type="button"
                                                                class="btn btn-link btn-primary btn-lg edit-btn"
                                                                data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"
                                                                data-id="<?= $row['equipmentCode'] ?>"
                                                                data-name="<?= $row['equipmentName'] ?>"
                                                                data-brand="<?= $row['brand'] ?>"
                                                                data-category="<?= $row['category'] ?>"
                                                                data-status="<?= $row['status'] ?>">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-link btn-danger delete-btn"
                                                                data-id="<?= $row['equipmentCode'] ?>" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="Delete">
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- putting edit modal outside of the loop, we only need one -->
                <!-- Edit modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit
                                    Equipment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form name="editForm" id="editForm" method="POST">
                                    <div class="mb-3">
                                        <label for="equipmentName" class="form-label">Equipment
                                            Name</label>
                                        <input type="text" class="form-control" id="equipmentName" name="equipmentName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="brand" class="form-label">Brand</label>
                                        <input type="text" class="form-control" id="brand" name="brand" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <input type="text" class="form-control" id="category" name="category"
                                            placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <input type="text" class="form-control" id="status" name="status"
                                            placeholder="">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="editEquipment" form="editForm" class="btn btn-primary">Save
                                    Changes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <!-- Additional JS Libraries -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize DataTable
            var table = $("#add-row").DataTable({
                pageLength: 5,
            });
        });
    </script>
    <script>
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function () {
                const equipmentData = {
                    equipmentCode: this.dataset.id,
                    equipmentName: this.dataset.name,
                    brand: this.dataset.brand,
                    category: this.dataset.category,
                    status: this.dataset.status
                };

                // Show modal
                const editModal = new bootstrap.Modal(document.getElementById('editModal'));
                editModal.show();

                // Populate modal fields
                // document.getElementById('equipmentCode').value = equipmentData.equipmentCode;
                document.getElementById('equipmentName').value = equipmentData.equipmentName;
                document.getElementById('brand').value = equipmentData.brand;
                document.getElementById('category').value = equipmentData.category;
                document.getElementById('status').value = equipmentData.status;
            });
        });

        // Handle form submission
        document.getElementById('editForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '/update.php',
                data: formData,
                contentType: false,
                processData: false,
            }).done(function (data) {
                if (data.success) {
                    alert('Equipment updated successfully!');
                    location.reload(); // Reload page to reflect changes
                } else {
                    alert('Error updating equipment.');
                }
            }).fail(function (error) {
                console.error('Error:', error);
            });
        });

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
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

        document.getElementById('editModal').addEventListener('hidden.bs.modal', function () {
            const backdrop = document.querySelector('.modal-backdrop');
            if (backdrop) {
                backdrop.remove();
            }
        });
    </script>
</body>

</html>