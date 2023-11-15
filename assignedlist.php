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
            <a href="index.html" class="brand-logo">
                <svg class="logo-abbr" width="50" height="50" viewbox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect class="svg-logo-rect" width="50" height="50" rx="6" fill="#EB8153"></rect>
                    <path class="svg-logo-path" d="M17.5158 25.8619L19.8088 25.2475L14.8746 11.1774C14.5189 9.84988 15.8701 9.0998 16.8205 9.75055L33.0924 22.2055C33.7045 22.5589 33.8512 24.0717 32.6444 24.3951L30.3514 25.0095L35.2856 39.0796C35.6973 40.1334 34.4431 41.2455 33.3397 40.5064L17.0678 28.0515C16.2057 27.2477 16.5504 26.1205 17.5158 25.8619ZM18.685 14.2955L22.2224 24.6007L29.4633 22.6605L18.685 14.2955ZM31.4751 35.9615L27.8171 25.6886L20.5762 27.6288L31.4751 35.9615Z" fill="white"></path>
                </svg>
                <svg class="brand-title" width="74" height="22" viewbox="0 0 74 22" fill="fff" xmlns="http://www.w3.org/2000/svg">
                    <path class="svg-logo-path" d="M0.784 17.556L10.92 5.152H1.176V1.12H16.436V4.564L6.776 16.968H16.548V21H0.784V17.556ZM25.7399 21.28C24.0785 21.28 22.6599 20.9347 21.4839 20.244C20.3079 19.5533 19.4025 18.6387 18.7679 17.5C18.1519 16.3613 17.8439 15.1293 17.8439 13.804C17.8439 12.3853 18.1519 11.088 18.7679 9.912C19.3839 8.736 20.2799 7.79333 21.4559 7.084C22.6319 6.37467 24.0599 6.02 25.7399 6.02C27.4012 6.02 28.8199 6.37467 29.9959 7.084C31.1719 7.79333 32.0585 8.72667 32.6559 9.884C33.2719 11.0413 33.5799 12.2827 33.5799 13.608C33.5799 14.1493 33.5425 14.6253 33.4679 15.036H22.6039C22.6785 16.0253 23.0332 16.7813 23.6679 17.304C24.3212 17.808 25.0585 18.06 25.8799 18.06C26.5332 18.06 27.1585 17.9013 27.7559 17.584C28.3532 17.2667 28.7639 16.8373 28.9879 16.296L32.7959 17.36C32.2172 18.5173 31.3119 19.46 30.0799 20.188C28.8665 20.916 27.4199 21.28 25.7399 21.28ZM22.4919 12.292H28.8759C28.7825 11.3587 28.4372 10.6213 27.8399 10.08C27.2612 9.52 26.5425 9.24 25.6839 9.24C24.8252 9.24 24.0972 9.52 23.4999 10.08C22.9212 10.64 22.5852 11.3773 22.4919 12.292ZM49.7783 21H45.2983V12.74C45.2983 11.7693 45.1116 11.0693 44.7383 10.64C44.3836 10.192 43.9076 9.968 43.3103 9.968C42.6943 9.968 42.069 10.2107 41.4343 10.696C40.7996 11.1813 40.3516 11.8067 40.0903 12.572V21H35.6103V6.3H39.6423V8.764C40.1836 7.90533 40.949 7.23333 41.9383 6.748C42.9276 6.26267 44.0663 6.02 45.3543 6.02C46.3063 6.02 47.0716 6.19733 47.6503 6.552C48.2476 6.888 48.6956 7.336 48.9943 7.896C49.3116 8.43733 49.517 9.03467 49.6103 9.688C49.7223 10.3413 49.7783 10.976 49.7783 11.592V21ZM52.7548 4.62V0.559999H57.2348V4.62H52.7548ZM52.7548 21V6.3H57.2348V21H52.7548ZM63.4657 6.3L66.0697 10.444L66.3497 10.976L66.6297 10.444L69.2337 6.3H73.8537L68.9257 13.608L73.9657 21H69.3457L66.6017 16.884L66.3497 16.352L66.0977 16.884L63.3537 21H58.7337L63.7737 13.692L58.8457 6.3H63.4657Z" fill="black"></path>
                </svg>
            </a>

            <div class="nav-control">
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
                            <h4>Hi, Welcome Back!</h4>
                            <span><?= $_SESSION['username'] ?></span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Manage Asset</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Asset Item</a></li>
                        </ol>
                    </div>
                </div>
                <!-- ASSIGN MODAL -->
                <div class="modal fade" id="edit_assigned">
                    <div class="modal-dialog modal-dialog-centered" role="dialog" tabindex="-1">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Assign Employee</h5>
                                <button type="button" id="close1" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-xl-6 col-lg-12">
                                    <div class=""></div>
                                    <form id="subform">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="id_assign" name="id_assign" hidden>
                                                <label>Asset ID</label>
                                                <input type="text" class="form-control" id="assetid" name="assetid" disabled>
                                                <input type="text" class="form-control" id="ida" name="ida" hidden>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Asset Description</label>
                                                <input type="text" class="form-control" id="ass" name="ass" disabled>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Asset Assigned</label>
                                                <select class="assigned_emp" name="employee" id="employee">
                                                    <option value="default" selected>Select Employee</option>
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM employee_tbl WHERE companyid = '1'");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row["lastname"] . ' ' . $row["firstname"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">

                                                <label>Department</label>
                                                <select id="departmentid" name="departmentid" class="form-control default-select">
                                                    <option value="default" selected>Select Department</option>
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM dep_tbl WHERE companyid = 1");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row["department"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Position</label>
                                                <select id="positionid" name="positionid" class="form-control default-select">
                                                    <option selected="">Select Department
                                                    </option>
                                                </select>
                                                <select id="companyid" name="companyid" class="form-control default-select" hidden>
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM com_tbl WHERE id = 1");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row["company"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <input type="text" class="form-control" id="cat" name="cat" hidden>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" name="btnassigned" class="btn btn-primary submitBtn" id="btnassigned">Update Assigned</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- VIEW ASSIGNED MODAL -->
                <div class="modal fade" id="view_assigned">
                    <div class="modal-dialog modal-dialog-centered" role="dialog" tabindex="-1">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Assign Employee</h5>
                                <button type="button" id="close2" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="default-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home"><i class="la la-home mr-2"></i> Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile"><i class="la la-user mr-2"></i> Profile</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                                            <div class="pt-4">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label>Asset ID</label>
                                                        <input type="text" class="form-control" id="setid" name="setid" disabled>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Asset Description</label>
                                                        <input type="text" class="form-control" id="ass_desc" name="ass_desc" disabled>
                                                    </div>
                                                    &nbsp;
                                                    <div class="form-group col-md-4">
                                                        <label>Assigned Employee</label>
                                                        <input type="text" class="form-control" id="emp" name="emp" disabled>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Department</label>
                                                        <input type="text" class="form-control" id="dep" name="dep" disabled>
                                                    </div>
                                                    &nbsp;
                                                    <div class="form-group col-md-4">
                                                        <label>Position</label>
                                                        <input type="text" class="form-control" id="pos" name="pos" disabled>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Date Assigned</label>
                                                        <input type="text" class="form-control" id="date" name="date" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="tablew" class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>EmployeeID</th>
                                                                    <th>Employee Assigned</th>
                                                                    <th>Department</th>
                                                                    <th>Position</th>
                                                                    <th>Date of Assigned</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                <th>No</th>
                                                                    <th>EmployeeID</th>
                                                                    <th>Employee Assigned</th>
                                                                    <th>Department</th>
                                                                    <th>Position</th>
                                                                    <th>Date of Assigned</th>
                                                            </tfoot>
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
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tablel" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Asset No</th>
                                                <th>Description</th>
                                                <th>Location</th>
                                                <th>Employee</th>
                                                <th>Department</th>
                                                <th>Position</th>
                                                <th>Assigned Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Asset No</th>
                                                <th>Description</th>
                                                <th>Location</th>
                                                <th>Employee</th>
                                                <th>Department</th>
                                                <th>Position</th>
                                                <th>Assigned Date</th>
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

    <script>
        $(document).ready(function() {

            $('#tablel').DataTable({
                serverside: false,
                processing: true,
                "destroy": true,
                "ajax": {
                    "url": "assignedjson.php",
                    "dataSrc": "",

                },
                "columns": [{

                        "data": "no"
                    }, {

                        "data": "flname"
                    },
                    {
                        "data": "itemid"
                    },
                    {
                        "data": "itemname"
                    },
                    {
                        "data": "loc"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "dep"
                    },
                    {
                        "data": "pos"
                    },
                    {
                        "data": "date"
                    },
                    {
                        "data": "act"
                    },
                ]
            });

            $(document).on("click", ".total_all", function() {

                    var id = $(this).data('id');

                });
        });
    </script>
    <script>
        $(document).on("click", ".assignededit", function() {

            var id = $(this).data('id');
            var asset = $(this).data('ass');
            var orig = $(this).data('ids');
            var nameass = $(this).data('name');
            var emplo = $(this).data('emp');
            var company = $(this).data('com');
            var depart = $(this).data('department');
            var positionid = $(this).data('position');
            var post = $(this).data('pos');
            var categ = $(this).data('ca');

            $("#edit_assigned").modal("show")

            $('#id_assign').val(id);
            $('#assetid').val(asset);
            $('#ida').val(orig);
            $('#ass').val(nameass);
            $('#cat').val(categ);
            $('#employee').val(emplo).trigger('change');
            $('#companyid').val(company);
            $('#departmentid').val(depart);
            $('#positionid').html('<option value=' + positionid + '>' + post + '</option>');
        });

        $(document).on("click", ".view", function() {

            var id = $(this).data('id');
            var ass = $(this).data('asset');
            var orig1 = $(this).data('idsss');
            var assname = $(this).data('name');
            var emplo = $(this).data('emp');
            var company = $(this).data('com');
            var depart = $(this).data('dept');
            var positionid = $(this).data('position');
            var post = $(this).data('pos');
            var dat = $(this).data('da');

            $("#view_assigned").modal("show")

            $('#ids').val(id);
            $('#setid').val(ass);
            $('#ass_desc').val(assname);
            $('#emp').val(emplo);
            $('#companyid').val(company);
            $('#dep').val(depart);
            $('#pos').val(post);
            $('#date').val(dat);

            $('#tablew').DataTable({
                serverside: false,
                processing: true,
                "destroy": true,
                "ajax": {
                    "url": `assign_historyjson.php?id=${orig1}`,
                    "dataSrc": "",

                },
                "columns": [{

                        "data": "no"
                    }, {

                        "data": "emp"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "dep"
                    },
                    {
                        "data": "pos"
                    },
                    {
                        "data": "date"
                    },
                ]
            });


        });
    </script>
    <script>
        $('#employee').select2({
            dropdownParent: $('#edit_assigned')
        });
        $('#close1').on('click', function() {
            $('#edit_assigned').modal('hide');
        });
        $('#close2').on('click', function() {
            $('#view_assigned').modal('hide');
        });



        $(document).ready(function() {
            $('#departmentid').on('change', function() {
                var departmentid = this.value;
                $.ajax({
                    url: "pos.php",
                    type: "POST",
                    data: {
                        departmentid: departmentid
                    },
                    cache: false,
                    success: function(result) {
                        $("#positionid").empty();
                        $("#positionid").html(result);


                    }
                });
            });
        });
    </script>
    <script>
    $(document).ready(function() {
            $('#btnassigned').click(function(e) {
            e.preventDefault();

            const idassign = $('#id_assign').val();
            const asset = $('#ida').val();
            const categ = $('#cat').val();
            const emplo = $('#employee').val();
            const company = $('#companyid').val();
            const depart = $('#departmentid').val();
            const posi = $('#positionid').val();

            
            $.ajax({
                url: "edit_assigned.php",
                type: "POST",
                data: {
                    idassign: idassign,
                    asset: asset,
                    categ: categ,
                    emplo: emplo,
                    company: company,
                    depart: depart,
                    posi: posi,

                },
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated',
                        text: 'Your Information have been Updated !',
                    });
                    $("#edit_assigned").modal("hide");
                    $('#tablel').DataTable().ajax.reload();

                }

            });
        });
    });
    </script>
    <script>
        // Button for Remove to Update the status
        $(document).on('click', '.retrieve', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var assid = $(this).data('idit');

            // Show the confirmation dialog
            Swal.fire({
                title: 'Are you sure you want to Inactive the Account?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, proceed with the AJAX request
                    $.ajax({
                        url: "assign_retreive.php",
                        type: "POST",
                        cache: false,
                        data: {
                            id: id,
                            assid:assid
                        },
                        success: function(response) {
                            if (response == '1') {
                                Swal.fire({
                                    title: "Success",
                                    text: "Data removed successfully",
                                    icon: "success"
                                });
                                $("#tablel").DataTable().ajax.reload(null, false);
                            } else {
                                Swal.fire({
                                    title: "Error",
                                    text: "Something went wrong",
                                    icon: "error"
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error: " + error);
                            Swal.fire({
                                title: "Error",
                                text: "An error occurred while removing data",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>