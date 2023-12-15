<?php
include 'Include/config.php';
include 'seasionindex.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:title" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:description" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    <title>Zenix - Crypto Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <style>
        .hide {
            display: none;
        }
    </style>
    <script>
        function toggleImage() {
            var logo2 = document.getElementById("logo2");
            logo2.classList.toggle("hide");
        }
    </script>

    <style>
        .round-image-container {
            display: flex;
            border-radius: 50%;
            /* Make the container round */
            overflow: hidden;
            /* Hide the overflow if the image exceeds the container */
            width: 60px;
            /* Set the desired width */
            height: 60px;
            /* Set the desired height */
        }

        .round-image-container img {
            width: 100%;
            /* Ensure the image takes up the full container width */
            object-fit: cover;
            /* Maintain aspect ratio and cover the container */
        }
    </style>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="user.php" class="brand-logo">
                <img src="images/logo1.jpg" alt="Your Brand Name">
                &nbsp;
                &nbsp;
                &nbsp;
                <img id="logo2" src="images/name.png" alt="Your Brand Name" style="width: 60%; height: 60%;">
            </a>

            <div class="nav-control" onclick="toggleImage()">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <?php include 'Include/nav.php'; ?>
        <?php include 'Include/sidebar.php'; ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Your business dashboard template</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Activity Log</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md">
                                            <thead>
                                                <tr>
                                                    <th style="width:80px;"><strong>#</strong></th>
                                                    <th><strong>Details</strong></th>
                                                    <th><strong>Time</strong></th>
                                                    <th><strong>Date</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $current = date("Y-m-d");
                                                $sql1 = "SELECT * FROM activity_log WHERE date = '$current'";
                                                $query = mysqli_query($conn, $sql1);
                                                $no    = 0;
                                                while ($rows = mysqli_fetch_array($query)) {
                                                    $no++;
                                                ?>
                                                    <tr>
                                                        <th><?php echo $no ?></th>
                                                        <th><?php echo $rows['details']; ?></th>
                                                        <th><?php echo $rows['time']; ?></th>
                                                        <th><?php echo $rows['date']; ?></th>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <form id="subform">
                                            <div class="form-row">
                                                <div class="form-group col-sm-6">
                                                    <input type="text" class="form-control" id="idt_edit" name="idt_edit" hidden>
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" id="assetid_edit" name="assetid_edit" rows="3" placeholder="Username" disabled>
                                                    <br>
                                                    <label>Password</label>
                                                    <input type="text" class="form-control" id="names_edit" name="names_edit" rows="3" placeholder="Password"></input>
                                                </div>
                                            </div>
                                            <br>
                                            <button type="submit" name="submit" class="btn btn-primary" id="editme">SAVE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <?php include 'Include/footer.php'; ?>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="vendor/global/global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="js/demo.js"></script>
    <!-- <script src="js/styleSwitcher.js"></script> -->
    <script type="text/javascript" src="JsBarcode.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- 
    <script>
                // your checkbox
                var checkbox = document.getElementById("showdepart");
        var check = document.getElementById("showlocat");

        // your div
        var inputDiv = document.getElementById("showmeme");
        var input = document.getElementById("memeshow");
        var employeeSelect = $("#employee");
        var departmentIdSelect = document.getElementById("departmentid");
        var positionSelect = document.getElementById("positionid");
        var newLocSelect = document.getElementById("newloc");

        // function that will show hidden inputs when clicked
        function showdep() {
            if (checkbox.checked === true) {
                inputDiv.style.display = "block";
                input.style.display = "none";
                // Clear values when switching to showdep
                employeeSelect.val(null).trigger("change");
                departmentIdSelect.selectedIndex = 0;
                positionSelect.selectedIndex = 0;
            } else {
                inputDiv.style.display = "none";
            }
        }

        // function that will hide the inputs when another checkbox is clicked
        function showloc() {
            if (check.checked === true) {
                input.style.display = "block";
                inputDiv.style.display = "none";
                // Clear values when switching to showloc
                newLocSelect.selectedIndex = 0;
            } else {
                input.style.display = "none";
            }
        }
    </script> -->
</body>

</html>