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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

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
                <!-- Add Project -->
                <div class="modal fade" id="addProjectSidebar">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create Project</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Project Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Deadline</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Client Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary">CREATE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Barcode</h4>
                            <span>Display All Barcode</span>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-13 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Filter</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-sm-4">
                                                <label for="startDate">From Date:</label>
                                                <input type="text" class="form-control datepicker" id="startDate" name="startDate" placeholder="YYYY/MM/DD">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="endDate">To Date:</label>
                                                <input type="text" class="form-control datepicker" id="endDate" name="endDate" placeholder="YYYY/MM/DD">
                                            </div>
                                            &nbsp;
                                            <div class="form-group col-sm-4">
                                                <input type="text" id="id" name="id" class="form-control" hidden>
                                                <label>CATEGORIES</label>
                                                <select id="cat" name="cat" class="form-control default-select" placeholder="Select Companys" required>
                                                    <option value="default" selected>Select All</option>
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM categ_tbl");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option value="<?php echo $row['categories']; ?>">
                                                            <?php echo $row["description"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label></label>
                                                <br>
                                                <button type="button" class="btn btn-primary form-contro" id="submitBtn">FILTER</button>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="button" name="print" id="print" class="btn btn-primary">PRINT</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table2" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" name="" id="checkAll">
                                                </th>
                                                <th>No</th>
                                                <th>AssetID</th>
                                                <th>Description</th>
                                                <th>Employee</th>
                                                <th>Department</th>
                                                <th>Location</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>AssetID</th>
                                                <th>Description</th>
                                                <th>Employee</th>
                                                <th>Department</th>
                                                <th>Location</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="vendor/global/global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="js/demo.js"></script>
    <!-- <script src="js/styleSwitcher.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <script src="js/demo.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Bootstrap Datepicker
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });

            $('#table2').DataTable({
                serverSide: false,
                processing: true,
                "destroy": true,
                "ajax": {
                    "url": "barcodejson2.php",
                    "dataSrc": "",
                    "type": 'POST',
                },
                "columns": [{

                        "data": "checkbox"
                    },
                    {
                        "data": "no"
                    },
                    {
                        "data": "asset"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "emp"
                    },
                    {
                        "data": "dep"
                    },
                    {
                        "data": "loc"
                    },
                    {
                        "data": "btn"
                    },
                ]
            });

            // Handle form submission with Ajax
            $('#submitBtn').click(function() {
                var startDate = $('#startDate').val();
                var endDate = $('#endDate').val();
                var cat = $('#cat').val();


                    $('#table2').DataTable({
                        serverside: false,
                        processing: true,
                        "destroy": true,
                        "ajax": {
                            "url": "barcodejson.php",
                            "dataSrc": "",
                            "type": 'POST',
                            "data": {
                                startDate: startDate,
                                endDate: endDate,
                                cat: cat
                            },

                        },
                        "columns": [{

                                "data": "checkbox"
                            },
                            {
                                "data": "no"
                            },
                            {
                                "data": "asset"
                            },
                            {
                                "data": "name"
                            },
                            {
                                "data": "emp"
                            },
                            {
                                "data": "dep"
                            },
                            {
                                "data": "loc"
                            },
                            {
                                "data": "btn"
                            },
                        ]
                    });
            });
            $(document).on("click", ".pdf", function() {

                var id = $(this).data('id');
                var catt = $(this).data('categ');
                var assid = $(this).data('asset');
                var names = $(this).data('name');


                $("#assignmodal").modal("show")

                $('#assigned_id').val(id);
                $('#cat').val(catt);
                $('#ass').val(assid);
                $('#assid').val(names);

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // $('.get_value').click(function() {
            // alert();

            // });

            $('#print').click(function() {


                const check = [];
                $('.get_value:checked').each(function() {
                    check.push($(this).val());
                });

                $.ajax({
                    url: "url_array.php",
                    type: "POST",
                    data: {
                        check
                    },
                    success: function(e) {
                        window.open(`brcode_all.php?try=${e}`, '_blank');
                        $('.get_value').prop('checked', false);
                        $('#checkAll').prop('checked', false);
                    }
                });



            });
        });
    </script>
</body>

</html>