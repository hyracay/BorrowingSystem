<button?php
    include("db_conn.php")

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
    </style>
  <body>
    <div class="body">
        <div class="card text-center">
            <div class="card-header">
                <h1>Equipment Borrowing System</h1>
                <p>SCHOOL OF INFORMATION TECHNOLOGY</p>
                <p>Telephone: (074) 442-3071 &nbsp;&nbsp;&nbsp; Website: ubaguio.edu &nbsp;&nbsp;&nbsp; UB@e.ubaguio.edu</p>
            </div>
            <div class="card-body">
                <form id="borrowForm">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <a href="#" class="btn btn-primary">Login</a>
                    <button type="button" class="btn btn-danger" id="alertButton1">Show Alert</button>
                    <button type="button" class="btn btn-danger" id="alertButton2">Show Alert</button>
                  </form>
            </div>
            <div class="card-footer text-muted">
                &#169; University of Baguio
            </div>
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <script>
        document.getElementById('alertButton1').addEventListener('click', function() {
            swal("Incorrect credentials!", {
                icon: "error",
                buttons: {
                    confirm: {
                        className: 'btn btn-danger'
                    }
                },
            });
        });
    </script>

    <script>
        document.getElementById('alertButton2').addEventListener('click', function() {
            swal("Credentials not found!", {
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
