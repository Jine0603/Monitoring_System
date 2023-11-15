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


                <!-- ADD EMPLOYEE MODAL -->
                <?php include("fmc_empview.php"); ?>
                <!-- ADD EMPLOYEE MODAL -->
                <?php include("fmc_empedit.php"); ?>


                <!-- ADD EMPLOYEE MODAL -->
                <div class="modal fade" id="exampleModalCenter">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">ADD ITEM</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="statusMsg"></div>
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12">
                                                <label>EmployeeID</label>
                                                <input type="text" class="form-control" id="employeeid" name="employeeid" placeholder="EmployeeID">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>FirstName</label>
                                                <input type="text" class="form-control letters-only" id="firstname" name="firstname" placeholder="FirstName">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>LastName</label>
                                                <input type="text" class="form-control letters-only" id="lastname" name="lastname" placeholder="LastName">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>UserName</label>
                                                <input type="text" id="username" name="username" class="form-control" placeholder="UserName">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Password</label>
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Company</label>
                                                <select id="company" name="company" class="form-control default-select">
                                                    <option value="default" selected>Select Company</option>
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM com_tbl WHERE id = 3");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row["company"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Department</label>
                                                <select id="departmentid" name="departmentid" class="form-control default-select">
                                                    <option selected="">Select Department</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Position</label>
                                                <select id="positionid" name="positionid" class="form-control default-select">
                                                    <option selected="">Select Department
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>UserAccess</label>
                                                <select class="js-example-basic-multiple" name="usertype" id="usertype" multiple="multiple">
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM access_tbl");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option class="user_role" value="<?php echo $row['id']; ?>">
                                                            <?php echo $row["access"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <button type="button" name="tested" class="btn btn-primary submitBtn" id="tested">Add New Request</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END ADD EMPLOYEE MODAL -->
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ASSET ITEM</h4>
                                <button type="button" class="btn btn-primary mb-2 align-items-center" style="float: right;" data-toggle="modal" data-target="#exampleModalCenter" id="generateIDButton">ADD EMPLOYEE</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>EmployeeID</th>
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>Position</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>EmployeeID</th>
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>Position</th>
                                                <th>Username</th>
                                                <th>Password</th>
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
        $(document).ready(function() {

        })
    </script>


    <script>

        $('#close_modal1').on('click', function() {
                $('#edit_data').modal('hide');
                $("#usertype_edit").val('').trigger('change');
            });


        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            $('.js-example-basic-multiple1').select2();

            $('#table3').DataTable({
                serverside: false,
                processing: true,
                "destroy": true,
                "ajax": {
                    "url": "mbi_empjson.php",
                    "dataSrc": "",

                },
                "columns": [{

                        "data": "no"
                    }, {

                        "data": "empid"
                    },
                    {
                        "data": "fname"
                    },
                    {
                        "data": "dep"
                    },
                    {
                        "data": "pos"
                    },
                    {
                        "data": "user"
                    },
                    {
                        "data": "pass"
                    },
                    {
                        "data": "sta"
                    },
                    {
                        "data": "act"
                    },
                ]
            });
        });
    </script>
    <script>
        $(document).on("click", "#edit", function() {

            const id = $(this).data('id');
            const employeeid = $("#employeeid_edit").val()
            const firstname = $("#firstname_edit").val()
            const lastname = $("#lastname_edit").val()
            const username = $("#username_edit").val()
            const password = $("#password_edit").val()
            const companyid = $("#company_edit").val()
            const departmentid = $("#departmentid_edit").val()
            const positionid = $("#positionid_edit").val()


            const check = [];
                $('.userole_edit').each(function() {
                    if ($(this).is(':checked')) {
                        check.push($(this).val());

                    }

                })


            $.ajax({
                url: "employee_edit.php",
                type: "POST",
                data: {
                    id:id,
                    employeeid: employeeid,
                    firstname: firstname,
                    lastname: lastname,
                    username: username,
                    password: password,
                    company: companyid,
                    departmentid: departmentid,
                    positionid: positionid,
                    check
                },
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated',
                        text: 'Your Information have been Updated !',
                    });
                    $('#table3').DataTable().ajax.reload();
                    $("#edit-modal").modal("hide")

                }

            });
        });
    </script>
    <script>
        $(document).ready(function() {

            // VIEW FUNCTION FOR EMPLOYEE 

            $('#table2').on("click", ".edit_modal", function() {
                var id = $(this).data('id');
                var emp_id = $(this).data('empid');
                var fname = $(this).data('firstname');
                var lname = $(this).data('lastname');
                var user = $(this).data('username');
                var pass = $(this).data('password');
                var com = $(this).data('company');
                var depart = $(this).data('dep');
                var pos = $(this).data('position');
                var department = $(this).data('department');
                var position = $(this).data('pos');
                let typeuse = $(this).data('user');


                $("#edit_data").modal("show")

                $('#id_edit').val(id);
                $('#employeeid_edit').val(emp_id);
                $('#firstname_edit').val(fname);
                $('#lastname_edit').val(lname);
                $('#username_edit').val(user);
                $('#password_edit').val(pass);
                $('#company_edit').val(com);
                $('#departmentid_edit').html('<option value=' + depart + '>' + department + '</option>');
                $('#positionid_edit').html('<option value=' + pos + '>' + position + '</option>');



                var userdata = new String(typeuse);

                var result = userdata.includes(',');

                if(result){
                    var usercount = typeuse.split(',');
                    var counter = usercount.length;
                    $('#usertype_edit').val(usercount);
                }else{
                    $('#usertype_edit').val(typeuse);
                }
                $('#usertype_edit').trigger('change');
                // $('#usertype_edit').each(function() {)
                  
            });

            $('#company').on('change', function() {
                var company = this.value;
                $.ajax({
                    url: "depconn.php",
                    type: "POST",
                    data: {
                        company: company
                    },
                    cache: false,
                    success: function(result) {
                        $("#departmentid").html(result);
                    }
                });
            });
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

            $('#company_edit').on('change', function() {
                var company = this.value;
                $.ajax({
                    url: "depconn.php",
                    type: "POST",
                    data: {
                        company: company
                    },
                    cache: false,
                    success: function(result) {
                        $("#departmentid_edit").html(result);
                    }
                });
            });
            $('#departmentid_edit').on('change', function() {
                var departmentid = this.value;
                $.ajax({
                    url: "pos.php",
                    type: "POST",
                    data: {
                        departmentid: departmentid
                    },
                    cache: false,
                    success: function(result) {
                        $("#positionid_edit").empty();
                        $("#positionid_edit").html(result);


                    }
                });
            });
        });
        // Attach the keypress event listener to all inputs with class "letters-only"
        $('.letters-only').on('keypress', function(event) {
            var charCode = event.which || event.keyCode;
            var charStr = String.fromCharCode(charCode);

            // Regular expression to match letters (A-Z and a-z)
            var letterRegex = /^[A-Za-z]+$/;

            // Check if the entered character matches the letter regex
            if (!letterRegex.test(charStr)) {
                // If the character doesn't match, prevent it from being entered
                event.preventDefault();
            }
        });
        // jQuery event handler to allow only numbers and limit the maximum length in the input field
        $('.numbers-only').on('input', function(event) {
            var inputValue = this.value;

            // Regular expression to match numbers (0-9)
            var numberRegex = /^[0-9]+$/;

            // Check if the entered character matches the number regex or input length is within the limit
            if (!numberRegex.test(inputValue) || inputValue.length > 11) {
                // If the character doesn't match or the input length exceeds the limit, remove the last character
                this.value = inputValue.slice(0, -1);
            }
        });
    </script>
    <script>
        // Button for Remove to Update the status
        $(document).on('click', '.removedata', function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            // Show the confirmation dialog
            Swal.fire({
                title: 'Are you sure you want to Inactive the Account?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, proceed with the AJAX request
                    $.ajax({
                        url: "delete_employee.php",
                        type: "POST",
                        cache: false,
                        data: {
                            id: id
                        },
                        success: function(response) {
                            if (response == '1') {
                                Swal.fire({
                                    title: "Success",
                                    text: "Data removed successfully",
                                    icon: "success"
                                });
                                $("#table2").DataTable().ajax.reload(null, false);
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
    <script>
        $(document).ready(function() {
            $('#tested').click(function(e) {
            e.preventDefault(e);

                var employeeid = $('#employeeid').val();
                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var username = $('#username').val();
                var password = $('#password').val();
                var companyid = $('#company').val();
                var departmentid = $('#departmentid').val();
                var positionid = $('#positionid').val();
                var usertype = $('#usertype').val();
                if (employeeid == '' || firstname == '' || lastname == '' || username == '' || password == '' || companyid == 'default' ||
                    departmentid == '' || positionid == '' || usertype == '') {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'error',
                        title: 'Please Fill Up the FORM!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    return;
                }




                const rolerr = [];
                $('.user_role').each(function() {
                    if ($(this).is(':checked')) {
                        rolerr.push($(this).val());

                    }

                })
                $.ajax({
                    url: "addemp.php",
                    type: "POST",
                    data: {
                        employeeid: employeeid,
                        firstname: firstname,
                        lastname: lastname,
                        username: username,
                        password: password,
                        company: companyid,
                        departmentid: departmentid,
                        positionid: positionid,
                        usertype: usertype,
                        rolerr
                    },
                    success: function(data) {
                        $('#msg').html(data);
                        $('#table3').DataTable().ajax.reload();
                        $('#employeeid').val('');
                        $('#firstname').val('');
                        $('#lastname').val('');
                        $('#username').val('');
                        $('#password').val('');
                        $('#company').val('default');
                        $('#departmentid').val('');
                        $('#positionid').val('');
                        $('#usertype').val('').trigger('change');
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Success!',
                            showConfirmButton: false,
                            timer: 1500
                        })

                    }
                });

            });
        });
    </script>

</body>

</html>