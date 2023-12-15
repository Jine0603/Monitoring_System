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
                            <h4>Assigned List</h4>
                            <span>Viewing Assigned Asset Or Re-Assigned the Asset</span>
                        </div>
                    </div>
                </div>
                <!-- ASSIGN MODAL -->
                <div class="modal fade" id="edit_assigned">
                    <div class="modal-dialog modal-dialog-centered" role="dialog" tabindex="-1">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Re-Assigned Employee</h5>
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
                                            <div class="form-group col-md-6">
                                                <input type="radio" name="type" id="showdepart" onChange="showdep();">Department</input>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="radio" name="type" id="showlocat" onClick="showloc();">Location</input>
                                            </div>
                                            <div class="form-group col-md-12" id="showmeme" style="display: none;">
                                                <input type="text" class="form-control" id="assigned_id" name="assigned_id" hidden>
                                                <label>Asset Name</label>
                                                <select class="js-example-basic-single" name="employee" id="employee">
                                                    <option value="default" selected>Select Employee</option>
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM employee_tbl WHERE companyid = '1' AND status = '1'");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row["lastname"] . ' ' . $row["firstname"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <br>
                                                <label>Department</label>
                                                <select id="departmentid" name="departmentid" class="form-control default-select">
                                                    <option value="default" selected>Select Department</option>
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM dep_tbl WHERE companyid = 1 AND status = 1");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row["department"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                &nbsp;
                                                <label id="Position">Position</label>
                                                <select id="positionid" name="positionid" class="form-control default-select" placeholder="Select Position">
                                                    <option selected="">Select Department
                                                    </option>
                                                </select>

                                                <br>
                                                <button type="submit" name="btnassigned" class="btn btn-primary submitBtn" id="btnassigned">Update Assigned</button>
                                            </div>
                                            <div class="form-group col-md-12" id="memeshow" style="display: none;">
                                                <label>Assigned Location</label>
                                                <select id="newloc" name="newloc" class="form-control default-select">
                                                    <option value="default" selected>Select Location</option>
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM location_assigned");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row["location"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <br>
                                                <button type="submit" name="btnassigned" class="btn btn-primary submitBtn" id="btnassigned1">Update Assigned</button>
                                            </div>
                                            <div class="form-group col-md-6">
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
                                            <a class="nav-link active" data-toggle="tab" href="#home"><i class="la la-home mr-2"></i>Asset Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile"><i class="la la-user mr-2"></i> Asset History</a>
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
                                                        <label>Location</label>
                                                        <input type="text" class="form-control" id="loc" name="loc" disabled>
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
                                                                    <th>Location</th>
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
                                                                    <th>Location</th>
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
                                                <th>Status</th>
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
                                                <th>Status</th>
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
    </script>
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
                        "data": "sta"
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
            var company = $(this).data('com');
            var categ = $(this).data('ca');

            $("#edit_assigned").modal("show")

            $('#id_assign').val(id);
            $('#assetid').val(asset);
            $('#ida').val(orig);
            $('#ass').val(nameass);
            $('#cat').val(categ);
            $('#companyid').val(company);
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
            var location = $(this).data('loca');

            $("#view_assigned").modal("show")

            $('#ids').val(id);
            $('#setid').val(ass);
            $('#ass_desc').val(assname);
            $('#emp').val(emplo);
            $('#companyid').val(company);
            $('#dep').val(depart);
            $('#pos').val(post);
            $('#date').val(dat);
            $('#loc').val(location);

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
                    },
                    {
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
                        "data": "loc"
                    },
                    {
                        "data": "date"
                    },
                ]
            });


        });
    </script>
    <script>
        var employeeSelect = $('#employee').select2({
            dropdownParent: $('#edit_assigned')
        });
        // Initial hide/show based on selected value
        togglePositionVisibility();

        // Bind change event to the employee_assigned select
        employeeSelect.on('change', function() {
            togglePositionVisibility();
        });

        // Function to toggle visibility based on the selected value
        function togglePositionVisibility() {
            var selectedValue = $('#employee').find(':selected').val();

            if (selectedValue === '1') {
                $('#Position, #positionid').hide();
            } else {
                $('#Position, #positionid').show();
            }
        }
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
                const newloc = $('#newloc').val();


                if (newloc != 'default') {
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
                            newloc: newloc,

                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Updated',
                                text: 'Your Information have been Updated !',
                            });
                            $("#edit_assigned").modal("hide");
                            $('#tablel').DataTable().ajax.reload();
                            $("#showdepart").prop("checked", false); // Uncheck showdepart
                            $("#showlocat").prop("checked", false); // Uncheck showlocat
                            showdep(); // Hide inputs based on showdepart
                            showloc(); // Hide inputs based on showlocat
                            employeeSelect.val('default').trigger('change');
                            $('#departmentid').val('default');
                            $('#positionid').val('');
                            $('#newloc').val('default');
                        }

                    });
                } else if (emplo == '1' && depart != 'default') {
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
                            newloc: newloc,

                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Updated',
                                text: 'Your Information have been Updated !',
                            });
                            $("#edit_assigned").modal("hide");
                            $('#tablel').DataTable().ajax.reload();
                            $("#showdepart").prop("checked", false); // Uncheck showdepart
                            $("#showlocat").prop("checked", false); // Uncheck showlocat
                            showdep(); // Hide inputs based on showdepart
                            showloc(); // Hide inputs based on showlocat
                            employeeSelect.val('default').trigger('change');
                            $('#departmentid').val('default');
                            $('#positionid').val('');
                            $('#newloc').val('default');
                        }

                    });
                } else if (emplo != '1' && depart != 'default' && posi != '') {
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
                            newloc: newloc,

                        },
                        beforeSend: function() {
                            let timerInterval;
                            Swal.fire({
                                title: "Auto close alert!",
                                html: "I will close in <b></b> milliseconds.",
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                    const timer = Swal.getPopup().querySelector("b");
                                    timerInterval = setInterval(() => {
                                        timer.textContent = `${Swal.getTimerLeft()}`;
                                    }, 100);
                                },
                                willClose: () => {
                                    clearInterval(timerInterval);
                                }
                            }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {}
                            });
                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Updated',
                                text: 'Your Information have been Updated !',
                            });
                            $("#edit_assigned").modal("hide");
                            $('#tablel').DataTable().ajax.reload();
                            $("#showdepart").prop("checked", false); // Uncheck showdepart
                            $("#showlocat").prop("checked", false); // Uncheck showlocat
                            showdep(); // Hide inputs based on showdepart
                            showloc(); // Hide inputs based on showlocat
                            employeeSelect.val('default').trigger('change');
                            $('#departmentid').val('default');
                            $('#positionid').val('');
                            $('#newloc').val('default');
                        }

                    });
                }else {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: 'Please Fill Up the Assigned Form!',
                        showConfirmButton: false,

                    })
                    $('#department_id').val('default');
                    $('#position').val('');
                    $('#newloc').val('default');
                    employeeAssignedSelect.val('default').trigger('change');
                }


            });
            $('#btnassigned1').click(function(e) {
                e.preventDefault();

                const idassign = $('#id_assign').val();
                const asset = $('#ida').val();
                const categ = $('#cat').val();
                const emplo = $('#employee').val();
                const company = $('#companyid').val();
                const depart = $('#departmentid').val();
                const posi = $('#positionid').val();
                const newloc = $('#newloc').val();


                if (newloc != 'default') {
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
                            newloc: newloc,

                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Updated',
                                text: 'Your Information have been Updated !',
                            });
                            $("#edit_assigned").modal("hide");
                            $('#tablel').DataTable().ajax.reload();
                            $("#showdepart").prop("checked", false); // Uncheck showdepart
                            $("#showlocat").prop("checked", false); // Uncheck showlocat
                            showdep(); // Hide inputs based on showdepart
                            showloc(); // Hide inputs based on showlocat
                            employeeSelect.val('default').trigger('change');
                            $('#departmentid').val('default');
                            $('#positionid').val('');
                            $('#newloc').val('default');
                        }

                    });
                } else if (emplo == '1' && depart != 'default') {
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
                            newloc: newloc,

                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Updated',
                                text: 'Your Information have been Updated !',
                            });
                            $("#edit_assigned").modal("hide");
                            $('#tablel').DataTable().ajax.reload();
                            $("#showdepart").prop("checked", false); // Uncheck showdepart
                            $("#showlocat").prop("checked", false); // Uncheck showlocat
                            showdep(); // Hide inputs based on showdepart
                            showloc(); // Hide inputs based on showlocat
                            employeeSelect.val('default').trigger('change');
                            $('#departmentid').val('default');
                            $('#positionid').val('');
                            $('#newloc').val('default');
                        }

                    });
                } else if (emplo != '1' && depart != 'default' && posi != '') {
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
                            newloc: newloc,

                        },
                        beforeSend: function() {
                            let timerInterval;
                            Swal.fire({
                                title: "Auto close alert!",
                                html: "I will close in <b></b> milliseconds.",
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                    const timer = Swal.getPopup().querySelector("b");
                                    timerInterval = setInterval(() => {
                                        timer.textContent = `${Swal.getTimerLeft()}`;
                                    }, 100);
                                },
                                willClose: () => {
                                    clearInterval(timerInterval);
                                }
                            }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {}
                            });
                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Updated',
                                text: 'Your Information have been Updated !',
                            });
                            $("#edit_assigned").modal("hide");
                            $('#tablel').DataTable().ajax.reload();
                            $("#showdepart").prop("checked", false); // Uncheck showdepart
                            $("#showlocat").prop("checked", false); // Uncheck showlocat
                            showdep(); // Hide inputs based on showdepart
                            showloc(); // Hide inputs based on showlocat
                            employeeSelect.val('default').trigger('change');
                            $('#departmentid').val('default');
                            $('#positionid').val('');
                            $('#newloc').val('default');
                        }

                    });
                }else {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: 'Please Fill Up the Assigned Form!',
                        showConfirmButton: false,

                    })
                    $('#department_id').val('default');
                    $('#position').val('');
                    $('#newloc').val('default');
                    employeeAssignedSelect.val('default').trigger('change');
                }


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
                title: 'Are you sure you want to Unassigned Asset?',
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
                            assid: assid
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