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

    <style>
        #interactive {
            width: 48%;
            /* Adjust the width as needed */
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
                            <h4>Scanner</h4>
                            <span>Scan the barcode and display the information</span>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-13 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">SCANNER </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="container-fluid">
                                            <div class="row">

                                                <!-- Left Side
                                                <div class="form-group col-4 text-left">
                                                    <br>
                                                    <div class="text-left">
                                                        <label>Asset No</label>
                                                        <input type="text" class="form-control" id="assid" name="assid" disabled>
                                                        <br>
                                                        <label>Asset Description</label>
                                                        <input type="text" class="form-control" id="description" name="description" disabled>


                                                        <label>Asset Description</label>
                                                        <input type="text" class="form-control" id="assid" name="assid" disabled>
                                                    </div>
                                                    <button type="button" class="btn btn-primary form-contro" id="submitBtn">Scan</button>
                                                </div>
                                                <br> -->
                                                <!-- Right Side -->
                                                <div class="col-md-6">
                                                    <div id="interactive" style="width: 50%; margin-right: 50px;"></div>
                                                </div>
                                                <br>
                                                <div class="form-group col-md-6">

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="scan" class="display" style="min-width: 845px">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Asset No</th>
                                                            <th>Description</th>
                                                            <th>Employee</th>
                                                            <th>Department</th>
                                                            <th>Location</th>
                                                            <th>Scan Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Asset No</th>
                                                            <th>Description</th>
                                                            <th>Employee</th>
                                                            <th>Department</th>
                                                            <th>Location</th>
                                                            <th>Scan Date</th>
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
    <script src="js/quagga.min.js"></script>

    <script>

    </script>
    <script>
        $(document).ready(function() {
            // Set the video width
            $('#interactive video').css('width', '346px');

            // Configuration for QuaggaJS
            const config = {
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: "#interactive",
                },
                decoder: {
                    readers: ["code_128_reader"],
                },
            };
            // Initialize QuaggaJS with the provided configuration
            Quagga.init(config, function(err) {
                
            $('#interactive canvas.drawingBuffer').css('height', '20px');
                if (err) {
                    console.error("Error initializing Quagga:", err);
                    return;
                }
                // Once QuaggaJS is initialized, start the scanner
                Quagga.start();

                // Add event listener to handle scanned results
                Quagga.onDetected(function(result) {
                    Quagga.stop();
                    const code = result.codeResult.code;


                    $.ajax({
                        url: "scanjson.php",
                        type: "POST",
                        data: {
                            code: code,
                        },
                        success: function(data) {

                            // console.log(data);
                            var jsons = JSON.parse(data);

                            for (var j = 0; jsons.length > j; j++) {

                                // $('#assid').val(jsons[j].asset);
                                // $('#description').val(jsons[j].name);

                                if (jsons[j].emp == '1' && jsons[j].status_code == '200') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'ASSET DETAILS.',
                                        html: "<br><b><br><label for='html'>Asset Number:</label></b><br>" + jsons[j].asset +
                                            "<br><b><br><label for='html'>Description:</label></b><br>" + jsons[j].name +
                                            "<br><b><br><label for='html'>Department :</label></b><br>" + jsons[j].depp +
                                            "",
                                        allowOutsideClick: false,
                                        showCancelButton: true,
                                        cancelButtonText: "Close",
                                        showConfirmButton: "Ok",
                                    }).then(function(response) {
                                        // Configuration for QuaggaJS
                                        if (response.isConfirmed) {
                                            $.ajax({
                                                url: "count_scan.php",
                                                type: "POST",
                                                dataType: "json",
                                                data: {
                                                    code: code,
                                                },
                                                success: function(data1) {
                                              
                                                    if (data1.code_error == '500') {
                                                    console.log(data1);
                                                       
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Barcode Scan',
                                                            text: 'This Barcode has already been scanned',
                                                        }).then(function() {
                                                            // Configuration for QuaggaJS
                                                            const config = {
                                                                inputStream: {
                                                                    name: "Live",
                                                                    type: "LiveStream",
                                                                    target: "#interactive",
                                                                },
                                                                decoder: {
                                                                    readers: ["code_128_reader"],
                                                                },
                                                            };
                                                            // Initialize QuaggaJS with the provided configuration
                                                            Quagga.init(config, function(err) {
                                                                if (err) {
                                                                    console.error("Error initializing Quagga:", err);
                                                                    return;
                                                                }
                                                                // Once QuaggaJS is initialized, start the scanner
                                                                Quagga.start();

                                                            });


                                                        });
                                                    } else{
                                                        $('#scan').DataTable().ajax.reload();
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Information has Been Saved',
                                                            text: 'ATM Has Been counted and Saved',
                                                        }).then(function() {

                                                            const config = {
                                                                inputStream: {
                                                                    name: "Live",
                                                                    type: "LiveStream",
                                                                    target: "#interactive",
                                                                },
                                                                decoder: {
                                                                    readers: ["code_128_reader"],
                                                                },
                                                            };
                                                            // Initialize QuaggaJS with the provided configuration
                                                            Quagga.init(config, function(err) {
                                                                if (err) {
                                                                    console.error("Error initializing Quagga:", err);
                                                                    return;
                                                                }
                                                                // Once QuaggaJS is initialized, start the scanner
                                                                Quagga.start();

                                                            });

                                                        });

                                                    }

                                                }
                                            });
                                        } else {

                                            // Configuration for QuaggaJS
                                            const config = {
                                                inputStream: {
                                                    name: "Live",
                                                    type: "LiveStream",
                                                    target: "#interactive",
                                                },
                                                decoder: {
                                                    readers: ["code_128_reader"],
                                                },
                                            };
                                            // Initialize QuaggaJS with the provided configuration
                                            Quagga.init(config, function(err) {
                                                if (err) {
                                                    console.error("Error initializing Quagga:", err);
                                                    return;
                                                }
                                                // Once QuaggaJS is initialized, start the scanner
                                                Quagga.start();

                                            });
                                        }

                                    });

                                } else if (jsons[j].loc != 'default' && jsons[j].status_code == '200') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'ASSET DETAILS.',
                                        html: "<br><b><br><label for='html'>Asset Number:</label></b><br>" + jsons[j].asset +
                                            "<br><b><br><label for='html'>Description:</label></b><br>" + jsons[j].name +
                                            "<br><b><br><label for='html'>Location:</label></b><br>" + jsons[j].locat +
                                            "",
                                        allowOutsideClick: false,
                                        showCancelButton: true,
                                        cancelButtonText: "Close",
                                        showConfirmButton: "Ok",
                                    }).then(function(response) {
                                        // Configuration for QuaggaJS
                                        if (response.isConfirmed) {
                                            $.ajax({
                                                url: "count_scan.php",
                                                type: "POST",
                                                dataType: "json",
                                                data: {
                                                    code: code,
                                                },
                                                success: function(data1) {

                                                    if (data1.code_error == '500') {
                                                    console.log(data1);
                                                       
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Barcode Scan',
                                                            text: 'This Barcode has already been scanned',
                                                        }).then(function() {
                                                            // Configuration for QuaggaJS
                                                            const config = {
                                                                inputStream: {
                                                                    name: "Live",
                                                                    type: "LiveStream",
                                                                    target: "#interactive",
                                                                },
                                                                decoder: {
                                                                    readers: ["code_128_reader"],
                                                                },
                                                            };
                                                            // Initialize QuaggaJS with the provided configuration
                                                            Quagga.init(config, function(err) {
                                                                if (err) {
                                                                    console.error("Error initializing Quagga:", err);
                                                                    return;
                                                                }
                                                                // Once QuaggaJS is initialized, start the scanner
                                                                Quagga.start();

                                                            });


                                                        });
                                                    } else{
                                                        $('#scan').DataTable().ajax.reload();
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Information has Been Saved',
                                                            text: 'ATM Has Been counted and Saved',
                                                        }).then(function() {
                                                            $('#scan').DataTable().ajax.reload();

                                                            const config = {
                                                                inputStream: {
                                                                    name: "Live",
                                                                    type: "LiveStream",
                                                                    target: "#interactive",
                                                                },
                                                                decoder: {
                                                                    readers: ["code_128_reader"],
                                                                },
                                                            };
                                                            // Initialize QuaggaJS with the provided configuration
                                                            Quagga.init(config, function(err) {
                                                                if (err) {
                                                                    console.error("Error initializing Quagga:", err);
                                                                    return;
                                                                }
                                                                // Once QuaggaJS is initialized, start the scanner
                                                                Quagga.start();

                                                            });

                                                        });

                                                    }

                                                }
                                            });
                                        } else {
                                            // Configuration for QuaggaJS
                                            const config = {
                                                inputStream: {
                                                    name: "Live",
                                                    type: "LiveStream",
                                                    target: "#interactive",
                                                },
                                                decoder: {
                                                    readers: ["code_128_reader"],
                                                },
                                            };
                                            // Initialize QuaggaJS with the provided configuration
                                            Quagga.init(config, function(err) {
                                                if (err) {
                                                    console.error("Error initializing Quagga:", err);
                                                    return;
                                                }
                                                // Once QuaggaJS is initialized, start the scanner
                                                Quagga.start();

                                            });
                                        }

                                    });

                                } else if (jsons[j].emp != '1' && jsons[j].status_code == '200') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'ASSET DETAILS.',
                                        html: "<br><b><br><label for='html'>Asset Number:</label></b><br>" + jsons[j].asset +
                                            "<br><b><br><label for='html'>Description:</label></b><br>" + jsons[j].name +
                                            "<br><b><br><label for='html'>Employee Name:</label></b><br>" + jsons[j].empname +
                                            "<br><b><br><label for='html'>Department :</label></b><br>" + jsons[j].depp +
                                            "",
                                        allowOutsideClick: false,
                                        showCancelButton: true,
                                        cancelButtonText: "Close",
                                        showConfirmButton: "Ok",
                                    }).then(function(response) {

                                        // Configuration for QuaggaJS
                                        if (response.isConfirmed) {
                                            $.ajax({
                                                url: "count_scan.php",
                                                type: "POST",
                                                dataType: "json",
                                                data: {
                                                    code: code,
                                                },
                                                success: function(data1) {
                                                    if (data1.code_error == '500') {
                                                    console.log(data1);
                                                       
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Barcode Scan',
                                                            text: 'This Barcode has already been scanned',
                                                        }).then(function() {
                                                            // Configuration for QuaggaJS
                                                            const config = {
                                                                inputStream: {
                                                                    name: "Live",
                                                                    type: "LiveStream",
                                                                    target: "#interactive",
                                                                },
                                                                decoder: {
                                                                    readers: ["code_128_reader"],
                                                                },
                                                            };
                                                            // Initialize QuaggaJS with the provided configuration
                                                            Quagga.init(config, function(err) {
                                                                if (err) {
                                                                    console.error("Error initializing Quagga:", err);
                                                                    return;
                                                                }
                                                                // Once QuaggaJS is initialized, start the scanner
                                                                Quagga.start();

                                                            });


                                                        });
                                                    }else {
                                                        $('#scan').DataTable().ajax.reload();
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Information has Been Saved',
                                                            text: 'ATM Has Been counted and Saved',
                                                        }).then(function() {

                                                            const config = {
                                                                inputStream: {
                                                                    name: "Live",
                                                                    type: "LiveStream",
                                                                    target: "#interactive",
                                                                },
                                                                decoder: {
                                                                    readers: ["code_128_reader"],
                                                                },
                                                            };
                                                            // Initialize QuaggaJS with the provided configuration
                                                            Quagga.init(config, function(err) {
                                                                if (err) {
                                                                    console.error("Error initializing Quagga:", err);
                                                                    return;
                                                                }
                                                                // Once QuaggaJS is initialized, start the scanner
                                                                Quagga.start();

                                                            });

                                                        });

                                                    }
                                                }
                                            });
                                        } else {
                                            // Configuration for QuaggaJS
                                            const config = {
                                                inputStream: {
                                                    name: "Live",
                                                    type: "LiveStream",
                                                    target: "#interactive",
                                                },
                                                decoder: {
                                                    readers: ["code_128_reader"],
                                                },
                                            };
                                            // Initialize QuaggaJS with the provided configuration
                                            Quagga.init(config, function(err) {
                                                if (err) {
                                                    console.error("Error initializing Quagga:", err);
                                                    return;
                                                }
                                                // Once QuaggaJS is initialized, start the scanner
                                                Quagga.start();

                                            });
                                        }


                                    });
                                } else if (jsons[j].emp == 'Invalid' && jsons[j].status_code == '404') {

                                    Swal.fire({
                                        icon: 'error',
                                        title: 'NO DATA FOUND',
                                    }).then(function() {

                                        // Configuration for QuaggaJS
                                        const config = {
                                            inputStream: {
                                                name: "Live",
                                                type: "LiveStream",
                                                target: "#interactive",
                                            },
                                            decoder: {
                                                readers: ["code_128_reader"],
                                            },
                                        };
                                        // Initialize QuaggaJS with the provided configuration
                                        Quagga.init(config, function(err) {
                                            if (err) {
                                                console.error("Error initializing Quagga:", err);
                                                return;
                                            }
                                            // Once QuaggaJS is initialized, start the scanner
                                            Quagga.start();

                                        });

                                    });

                                }
                            }
                            // var jsoons = JSON.parse(data);
                            // $('#assid').val(jsoons.asset);
                            // $('#description').val(jsoons.name);
                            // console.log(name);
                        }

                    });
                    // alert(code);

                    // Uncomment the following line if you want to stop the scanner after detecting a code
                    // Quagga.stop();
                });
            });

        });
    </script>
    <script>
        $(document).ready(function() {

            $('#scan').DataTable({
                serverside: false,
                processing: true,
                "destroy": true,
                "ajax": {
                    "url": "asset_count.php",
                    "dataSrc": "",

                },
                "columns": [{

                        "data": "no"
                    }, {

                        "data": "id"
                    },
                    {
                        "data": "itemname"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "dep"
                    },
                    {
                        "data": "loc"
                    },
                    {
                        "data": "date1"
                    },
                ]
            });
        });
    </script>
</body>

</html>