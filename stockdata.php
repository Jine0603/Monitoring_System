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
    <title>FIXED ASSET MONITORING SYSTEM WITH BARCODING </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo1.jpg">
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>

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
                            <h4>Asset Count (Department)</h4>
                            <span>Display all Assigned Asset from each Department</span>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Count Asset</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tablea" class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Department</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="infof">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- row -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Profile Datatable</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table id="tableo" class="display" style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Categories</th>
                                                                <th>AssetID</th>
                                                                <th>Description</th>
                                                                <th>Assigned To</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--**********************************
            Content body end
        ***********************************-->


            <!-- **********************************
            Footer start
        ***********************************-->
        <!-- <?php include 'Include/footer.php'; ?> -->
            <!--**********************************
            Footer end
        *********************************** -->

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

        <script>
            $(document).ready(function() {

                $('#tablea').DataTable({
                    serverside: false,
                    processing: true,
                    "destroy": true,
                    "ajax": {
                        "url": "stockjson.php",
                        "dataSrc": "",

                    },
                    "columns": [{
                            "data": "cat"
                        },
                        {
                            "data": "total"
                        },

                    ]
                });

                $(document).on("click", ".total_all", function() {

                    var id = $(this).data('id');

                    $('#tableo').DataTable({
                        serverside: false,
                        processing: true,
                        "destroy": true,
                        "ajax": {
                            "url": `infomodal.php?totalall=${id}`,
                            "dataSrc": "",

                        },
                        "columns": [{
                                "data": "no"
                            },
                            {
                                "data": "cat"
                            },
                            {
                                "data": "astid"
                            },
                            {
                                "data": "name"
                            },
                            {
                                "data": "assign"
                            },
                        ]
                    });
                });

                // $(document).on("click", ".total_use", function() {

                //     var id = $(this).data('id');

                //     $('#tableo').DataTable({
                //         serverside: false,
                //         processing: true,
                //         "destroy": true,
                //         "ajax": {
                //             "url": `assignclass.php?use=${id}`,
                //             "dataSrc": "",

                //         },
                //         "columns": [{
                //                 "data": "no"
                //             },
                //             {
                //                 "data": "astid"
                //             },
                //             {
                //                 "data": "name"
                //             },
                //             {
                //                 "data": "assign"
                //             },

                //         ]
                //     });
                // });
                // $(document).on("click", ".total_stock", function() {

                //     var id = $(this).data('id');

                //     $('#tableo').DataTable({
                //         serverside: false,
                //         processing: true,
                //         "destroy": true,
                //         "ajax": {
                //             "url": `stockclass.php?stock=${id}`,
                //             "dataSrc": "",

                //         },
                //         "columns": [{
                //                 "data": "no"
                //             },
                //             {
                //                 "data": "astid"
                //             },
                //             {
                //                 "data": "name"
                //             },
                //             {
                //                 "data": "assign"
                //             },

                //         ]
                //     });
                // });
            });
        </script>

</body>

</html>