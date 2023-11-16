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
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
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
                <!-- ADD ITEM MODAL -->
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
                                    <form id="submitForm">
                                        <div class="form-row">
                                            <div class="form-group col-sm-6">
                                                <input type="text" class="form-control" id="assetid" name="assetid" hidden>

                                                <label>Asset Description</label>
                                                <textarea type="text" class="form-control" id="assetname" name="assetname" rows="3" placeholder="Item Name"></textarea>
                                            </div>
                                            <!-- <svg id="barcode"></svg> -->
                                            <div class="form-group col-sm-6">
                                            <div id="imagine"></div>
                                                <label>Item Image </label>
                                                <input type="file" class="form-control" id="file1" name="file1" onchange="ImagePreview(event)">
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="wrn_file" style="display:none;font-size:12px;">
                                                    Please enter the amount..
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="cat_drop"> Category</label>
                                                <select name="category" id="category" class="form-control default-select">
                                                    <option value="" selected>Select Category</option>
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM categ_tbl");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option id="cat_drop" value="<?php echo $row['categories']; ?>">
                                                            <?php echo $row["description"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Company</label>
                                                <select id="company" name="company" class="form-control default-select">
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM com_tbl WHERE id = '1'");
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
                                                <label>Date Purchase</label>
                                                <input type="date" id="date_purchase" name="date_purchase" class="form-control">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Quantity</label>
                                                <input type="number" id="qty" name="qty" class="form-control" value="1">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Location</label>
                                                <select name="locationid" id="locationid" class="form-control default-select">
                                                    <option value="default" selected>Select Location</option>
                                                    <?php
                                                    $result = mysqli_query($conn, "SELECT * FROM location_tbl");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <option value="<?php echo $row['id']; ?>">
                                                            <?php echo $row["location"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Upload P.O</label>
                                                <input type="file" id="files" name="files[]" multiple="multiple" style="padding:5px;">
                                                <br>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="wrn_file" style="display:none;font-size:12px;">
                                                    Please enter the amount..
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" name="submit" class="btn btn-primary submitBtn" id="add_er">Add New Request</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END ADD ITEM MODAL -->
                <br>
                <!-- EDIT MODAL -->
                <div class="modal fade" id="modal_edit">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">EDIT ITEM</h5>
                                <button type="button" id="close2" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="default-tab">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#home"><i class="la la-home mr-2"></i> ASSET INFO</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#profile"><i class="la la-user mr-2"></i>FILES</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel">
                                                <div class="pt-4">
                                                    <form id="subform">
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-6">
                                                                <input type="text" class="form-control" id="idt_edit" name="idt_edit" hidden>
                                                                <label>AssetID</label>
                                                                <input type="text" class="form-control" id="assetid_edit" name="assetid_edit" rows="3" placeholder="Item Name" disabled>
                                                                <label>Asset Description</label>
                                                                <textarea type="text" class="form-control" id="names_edit" name="names_edit" rows="3" placeholder="Item Name"></textarea>
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <div id="imaginary">
                                                                    <input type="text" class="form-control" id="imaginary" name="imaginary" placeholder="Item Name">
                                                                </div>
                                                                &nbsp;
                                                                &nbsp;
                                                                <input type="file" class="form-control" id="file2" name="file2" onchange="getImagePreview(event)">
                                                            </div>
                                                            <div class="form-group col-sm-6">
                                                                <label for="cat_drop"> Category</label>
                                                                <select name="category_edit" id="category_edit" class="form-control default-select">
                                                                    <option value="" selected>Select Category</option>
                                                                    <?php
                                                                    $result = mysqli_query($conn, "SELECT * FROM categ_tbl");
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                    ?>
                                                                        <option id="cat_drop" value="<?php echo $row['categories']; ?>">
                                                                            <?php echo $row["description"]; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Company</label>
                                                                <select id="company_edit" name="company" class="form-control default-select">
                                                                    <?php
                                                                    $result = mysqli_query($conn, "SELECT * FROM com_tbl WHERE id = '1'");
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
                                                                <label>Date Purchase</label>
                                                                <input type="date" id="date_purchase_edit" name="date_purchase_edit" class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Location</label>
                                                                <select name="location_edit" id="location_edit" class="form-control default-select">
                                                                    <option value="default" selected>Select Location</option>
                                                                    <?php
                                                                    $result = mysqli_query($conn, "SELECT * FROM location_tbl");
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                    ?>
                                                                        <option value="<?php echo $row['id']; ?>">
                                                                            <?php echo $row["location"]; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <button type="submit" name="submit" class="btn btn-primary" id="editme">SAVE</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile">
                                                <form id="subform">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12">
                                                            <label>Upload P.O</label>
                                                            <input type="file" id="filess" name="filess[]" multiple="multiple" style="padding:5px;">
                                                            <br>
                                                            <input type="text" class="form-control" id="id_upload" name="id_upload" hidden>
                                                        </div>
                                                        <br>
                                                        <div class="form-group col-sm-12">
                                                            <label>FILES DETAILS</label>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table id="tab" class="display" style="min-width: 845px">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>NO</th>
                                                                                <th>NAME</th>
                                                                                <th>FILES</th>
                                                                                <th>STATUS</th>
                                                                                <th>ACTION</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>NO</th>
                                                                                <th>NAME</th>
                                                                                <th>FILES</th>
                                                                                <th>STATUS</th>
                                                                                <th>ACTION</th>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <br>
                                                    <button type="submit" name="submit" class="btn btn-primary" id="uploadme">UPLOAD</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END EDIT MODAL -->
                <br>
                <!-- ASSIGN MODAL -->
                <div class="modal fade" id="assignmodal">
                    <div class="modal-dialog modal-dialog-centered" role="dialog" tabindex="-1">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Assign Employee</h5>
                                <button type="button" id="close1" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-xl-6 col-lg-12">
                                    <div class=""></div>
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>AssetID</label>
                                                <input type="text" class="form-control" id="ass" name="ass" disabled>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Asset Description</label>
                                                <input type="text" class="form-control" id="assid" name="assid" disabled>
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
                                                <select class="js-example-basic-single" name="employee_assigned" id="employee_assigned">
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
                                                <select id="department_id" name="department_id" class="form-control default-select">
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
                                                <label>Position</label>
                                                <select id="position" name="position" class="form-control default-select">
                                                    <option selected="">Select Department
                                                    </option>
                                                </select>
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
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" name="btn_assigned" class="btn btn-primary" id="btn_assigned">Assign Employee</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END ASSIGN MODAL -->
                <!-- VIEW ASSIGNED MODAL -->
                <div class="modal fade" id="view_assigned">
                    <div class="modal-dialog modal-dialog-centered" role="dialog" tabindex="-1">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Assign Employee</h5>
                                <button type="button" id="closess" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="default-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#assetinfo"><i class="la la-home mr-2"></i> Asset Info</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#history"><i class="la la-user mr-2"></i> Asset History</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="assetinfo" role="tabpanel">
                                            <div class="pt-4">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label>Asset ID</label>
                                                        <input type="text" class="form-control" id="id" name="id" hidden>
                                                        <input type="text" class="form-control" id="setid" name="setid" disabled>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Asset Description</label>
                                                        <input type="text" class="form-control" id="ass_desc" name="ass_desc" disabled>
                                                    </div>
                                                    &nbsp;
                                                    <div class="form-group col-md-4">
                                                        <label>Date of Purchase</label>
                                                        <input type="text" class="form-control" id="date" name="date" disabled>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Location</label>
                                                        <input type="text" class="form-control" id="loct" name="loct" disabled>
                                                    </div>
                                                    &nbsp;
                                                    <div class="form-group col-md-4">
                                                    <label>Date Created</label>
                                                    <input type="text" class="form-control" id="datepurchases" name="datepurchases" disabled>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                    <label>FILES DETAILS</label>
                                                    </div>
                                                    <div class="card">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table id="tabas" class="display" style="min-width: 845px">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>NO</th>
                                                                                <th>File Name</th>
                                                                                <th>FILES</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>NO</th>
                                                                                <th>File Name</th>
                                                                                <th>FILES</th>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="history">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="tableq" class="display" style="min-width: 845px">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Location</th>
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
                                                                    <th>Location</th>
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
                            <div class="card-header">
                                <h4 class="card-title">ASSET ITEM</h4>
                                <button type="button" class="btn btn-primary mb-2 align-items-center clearme" style="float: right;" data-toggle="modal" data-target="#exampleModalCenter" id="generateIDButton">ADD ITEM</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tablee" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Item No</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Item Status</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Item No</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Item Status</th>
                                                <th>Date Created</th>
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
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="js/vpb_uploader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#employee_assigned').select2({
                dropdownParent: $('#assignmodal')
            });
            $('#close1').on('click', function() {
                $('#assignmodal').modal('hide');
            });
            $('#closess').on('click', function() {
                $('#view_assigned').modal('hide');
            });
            $('#close2').on('click', function() {
                $('#modal_edit').modal('hide');
            });

            $('#tablee').on("click", ".data", function() {
                var id = $(this).data('id');

                $("#assignmodal").modal("show")

                $('#sid').val(id);
            });

            $('#tablee').on("click", ".view", function() {
                var id = $(this).data('id');

                $("#view_assigned").modal("show")

                $('#sid').val(id);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tablee').DataTable({
                serverside: false,
                processing: true,
                "destroy": true,
                "ajax": {
                    "url": "itemtable.php",
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
                        "data": "cat"
                    },
                    {
                        "data": "item"
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
        const inputElement = document.querySelector('#files');
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const pond = FilePond.create(inputElement);

        const inputElement1 = document.querySelector('#filess');
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const pondme = FilePond.create(inputElement1);

        pondme.on('addfile', (error, file) => {
            const allowedFileTypes = ['application/pdf'];

            if (!allowedFileTypes.includes(file.fileType)) {
                pondme.removeFile(file.id);
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Only PDF, Word, Excel, and PowerPoint files are allowed.',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
    </script>
    <script>
        function getImagePreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imagediv = document.getElementById('imaginary');
            var newimg = document.createElement('img');
            imagediv.innerHTML = '';
            newimg.src = image;
            newimg.width = "300";
            imagediv.appendChild(newimg);
            // const aa = $('#imaginary').val();
            $('#file2').attr('src', image);
        }
        function ImagePreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imagediv = document.getElementById('imagine');
            var newimg = document.createElement('img');
            imagediv.innerHTML = '';
            newimg.src = image;
            newimg.width = "300";
            imagediv.appendChild(newimg);
            // const aa = $('#imaginary').val();
            $('#file1').attr('src', image);
        }

         //your checkbox
         var checkbox = document.getElementById("showdepart");
        var check = document.getElementById("showlocat");

        //your div
        var inputDiv = document.getElementById("showmeme");
        var input = document.getElementById("memeshow");

        //function that will show hidden inputs when clicked
        function showdep() {
            if (checkbox.checked === true) {
                inputDiv.style.display = "block";
                input.style.display = "none";
            }else{
                inputDiv.style.display = "none";
            }
        }

        //function that will hide the inputs when another checkbox is clicked
        function showloc() {
            if (check.checked === true) {
                input.style.display = "block";
                inputDiv.style.display = "none"
            }else {
                input.style.display = "none";
            }
        }
        // // Select the input element with id "assetid"

        // // Select the SVG element where the barcode will be displayed
        // var barcodeElement = document.getElementById("barcode");

        // // Function to generate a new random ID and update both the input and barcode
        // function generateAndSetRandomID() {
        //     var prefix = document.getElementById("category").value;
        //     var inputElement = document.getElementById("assetid").value;
        //     var assetid = "" + prefix + "-" + inputElement;

        //     // Update the input field
        //     inputElement.value = assetid;

        //     // Update the barcode
        //     JsBarcode(barcodeElement, assetid);

        //     barcodeElement.style.display = "hide";
        // }

        // // Attach an event listener to the "Generate ID" button to refresh the ID
        // document.getElementById('category').addEventListener('change', generateAndSetRandomID);
    </script>
    <script>
        $(document).ready(function() {

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
        });
        $('#department_id').on('change', function() {
            var departmentid = this.value;
            $.ajax({
                url: "pos.php",
                type: "POST",
                data: {
                    departmentid: departmentid
                },
                cache: false,
                success: function(result) {
                    $("#position").empty();
                    $("#position").html(result);


                }
            });
        });
    </script>
    <script>
        $(document).ready(function(e) {
            $("#editme").click(function(e) {
                e.preventDefault();


                var id = $("#idt_edit").val();
                var assetname_edit = $("#names_edit").val();
                var file2 = $("#file2").prop("files")[0];
                var orgfilename = $("#orgfilename").val();
                var company_edit = $("#company_edit").val();
                var category_edit = $("#category_edit").val();
                var date_purchase_edit = $("#date_purchase_edit").val();
                var locationid_edit = $("#location_edit").val();

                var form_data = new FormData();
                form_data.append("id", id);
                form_data.append("assetname_edit", assetname_edit);
                form_data.append("company_edit", company_edit);
                form_data.append("category_edit", category_edit);
                form_data.append("orgfilename", orgfilename);
                form_data.append("file2", file2);
                form_data.append("date_purchase_edit", date_purchase_edit);
                form_data.append("locationid_edit", locationid_edit);

                // console.log(orig);

                // Submit form data via Ajax
                for (var index = 0; index < files.length; index++) {
                    var picture = files[index].file;
                    form_data.append("files[]", picture);
                }

                // File type validation
                $("#file2").change(function() {
                    var file2 = this.files[0];
                    var file2Type = file2.type;
                    var match = ["image/jpeg", "image/png", "image/jpg"];
                    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                        alert('Please select a valid image file (JPEG/JPG/PNG).');
                        $("#file2").val('');
                        return false;
                    }
                });

                if (file2 == undefined) {
                    $.ajax({
                        url: "edit1.php",
                        type: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(response) {
                            Swal.fire({
                                position: 'top-center',
                                icon: 'success',
                                title: 'Success!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $("#file2").val('');
                            $("#modal_edit").modal("hide");

                            for (var i = 0; i < files.length; i++) {
                                pond.removeFile(files[i]);
                            }
                            $('#tablee').DataTable().ajax.reload();

                        }

                    });
                } else {
                    $.ajax({
                        url: "edit.php",
                        type: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(response) {
                            Swal.fire({
                                position: 'top-center',
                                icon: 'success',
                                title: 'Success!',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $("#file2").val('');
                            $("#modal_edit").modal("hide");

                            for (var i = 0; i < files.length; i++) {
                                pond.removeFile(files[i]);
                            }
                            $('#tablee').DataTable().ajax.reload();

                        }

                    });
                }
            });
            $("#uploadme").click(function(e) {
                e.preventDefault();
                let files = pondme.getFiles();

                var idss = $("#idt_edit").val();

                var form_data = new FormData();
                form_data.append("idss", idss);


                // Submit form data via Ajax
                for (var index = 0; index < files.length; index++) {
                    var picture = files[index].file;
                    form_data.append("filess[]", picture);
                }

                $.ajax({
                    url: "upload.php",
                    type: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Success!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        // $("#file2").val('');
                        // $("#modal_edit").modal("hide");

                        for (var i = 0; i < files.length; i++) {
                            pondme.removeFile(files[i]);
                        }
                        $('#tab').DataTable().ajax.reload();

                    }

                });
            });
        });
    </script>
    <script>
        $(document).ready(function(e) {
            $("#add_er").click(function(e) {
                e.preventDefault();
                let files = pond.getFiles();

                var assetname = $('#assetname').val();
                var company = $('#company').val();
                var category = $('#category').val();
                var file1 = $('#file1').prop("files")[0];
                var date_purchase = $('#date_purchase').val();
                var locationid = $('#locationid').val();
                var qty = $('#qty').val();
                var form_data = new FormData();
                form_data.append("assetname", assetname);
                form_data.append("company", company);
                form_data.append("category", category);
                form_data.append("file1", file1);
                form_data.append("date_purchase", date_purchase);
                form_data.append("locationid", locationid);
                form_data.append("qty", qty);


                // Submit form data via Ajax
                for (var index = 0; index < files.length; index++) {
                    var picture = files[index].file;
                    form_data.append("files[]", picture);
                }

                // File type validation
                $("#file1").change(function() {
                    var file1 = this.files[0];
                    var file1Type = file1.type;
                    var match = ["image/jpeg", "image/png", "image/jpg"];
                    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                        alert('Please select a valid image file (JPEG/JPG/PNG).');
                        $("#file1").val('');
                        return false;
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: 'add.php',
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Success!',
                            showConfirmButton: false,
                            timer: 1500
                        })


                        $('#submitForm')[0].reset();

                        for (var i = 0; i < files.length; i++) {
                            pond.removeFile(files[i]);
                        }
                        $('#tablee').DataTable().ajax.reload();
                    },

                });
            });

            $(document).on('click', '.clearme', function(e) {

                $('.statusMsg').html('');


            });

            $(document).on("click", ".assign", function() {

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

            $(document).on("click", ".editmodal", function() {

                var id = $(this).data('id');
                var idset = $(this).data('idasset');
                var fileimage = $(this).data('file');
                var nameLL = $(this).data('setname');
                var categories = $(this).data('cate');
                var pdate = $(this).data('datt');
                var locat = $(this).data('loct');


                $("#modal_edit").modal("show")

                $('#idt_edit').val(id);
                $('#id_upload').val(id);
                $('#assetid_edit').val(idset);
                $('#names_edit').val(nameLL);
                $('#category_edit').val(categories);
                $('#date_purchase_edit').val(pdate);
                $('#location_edit').val(locat);
                $("btn").click(function() {
                    $("a").remove();
                });

                $('#tab').DataTable({
                    serverside: false,
                    processing: true,
                    "destroy": true,
                    "ajax": {
                        "url": `filen.php?id=${id}`,
                        "dataSrc": "",

                    },
                    "columns": [{

                            "data": "no"
                        }, 
                        {
                            "data": "name"
                        },
                        {
                            "data": "flname"
                        },
                        {
                            "data": "status"
                        },
                        {
                            "data": "act"
                        },
                    ]
                });
                $.ajax({
                    url: "img.php",
                    type: "POST",
                    data: {
                        id
                    },
                    success: function(e) {
                        $('#imaginary').html(e)

                    }


                })

            });

            $(document).on("click", ".viewdata", function() {

                var orig = $(this).data('id');
                var assid1 = $(this).data('ass');
                var nam = $(this).data('na');
                var date = $(this).data('dat');
                var locat = $(this).data('loca');
                var datep = $(this).data('date');



                $("#view_assigned").modal("show")

                $('#id').val(orig);
                $('#setid').val(assid1);
                $('#ass_desc').val(nam);
                $('#date').val(date);
                $('#loct').val(locat);
                $('#datepurchases').val(datep);
                // $('#namef').html();

                $('#tableq').DataTable({
                    serverside: false,
                    processing: true,
                    "destroy": true,
                    "ajax": {
                        "url": `assign_historyjson.php?id=${orig}`,
                        "dataSrc": "",

                    },
                    "columns": [{

                            "data": "no"
                        }, 
                        {
                            "data": "loc"
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
                            "data": "date"
                        },
                    ]
                });
                $('#tabas').DataTable({
                    serverside: false,
                    processing: true,
                    "destroy": true,
                    "ajax": {
                        "url": `file.php?id=${orig}`,
                        "dataSrc": "",

                    },
                    "columns": [{

                            "data": "no"
                        }, 
                        {
                            "data": "name"
                        },
                        {
                            "data": "flname"
                        },
                    ]
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#btn_assigned').click(function(e) {

                e.preventDefault();

                var itemid = $('#assigned_id').val();
                var categories = $('#cat').val();
                var employee_assigned = $('#employee_assigned').val();
                var companyid = $('#companyid').val();
                var department_id = $('#department_id').val();
                var position = $('#position').val();
                var newloc= $('#newloc').val();

                $.ajax({
                    url: "add_assign.php",
                    type: "POST",
                    data: {
                        itemid: itemid,
                        categories: categories,
                        employee_assigned: employee_assigned,
                        companyid: companyid,
                        department_id: department_id,
                        position: position,
                        newloc:newloc,

                    },
                    success: function(data) {
                        $('#msg').html(data);
                        $('#tablee').DataTable().ajax.reload();
                        $('#employee_assigned').val('');
                        $('#companyid').val('');
                        $('#department_id').val('');
                        $('#position').val('');

                        Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Success!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("#assignmodal").modal("hide");
                    }
                });

            });
        });
    </script>
    <script>
        // Button for Remove to Update the status
        $(document).on('click', '.delete', function(e) {
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
                        url: "delete_item.php",
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
                                $("#tablee").DataTable().ajax.reload(null, false);
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
        // Button for Remove to Update the status
        $(document).on('click', '.inactive', function(e) {
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
                        url: "inactive.php",
                        type: "POST",
                        cache: false,
                        data: {
                            id: id
                        },
                        success: function(response) {
                            if (response == '1') {
                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'success',
                                    title: 'Success!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $("#tab").DataTable().ajax.reload(null, false);
                            } else {
                                Swal.fire({
                                    position: 'top-center',
                                    icon: 'Error',
                                    title: 'Unsuccessful!',
                                    showConfirmButton: false,
                                    timer: 1500
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