<?php
include 'Include/config.php';
include 'timezone.php';
global $date_now;



// print($_POST['rolerr']);
// foreach ($_POST['rolerr'] as $temp){

// print_r($temp.'<br>');

// }

$employeeid   = $_POST['employeeid'];
$firstname    = $_POST['firstname'];
$lastname     = $_POST['lastname'];
$username     = $_POST['username'];
$password     = $_POST['password'];
$company      = $_POST['company'];
$departmentid = $_POST['departmentid'];
$positionid   = $_POST['positionid'];
$datecreated  = date("Y-m-d h:i A");



$sql = "INSERT INTO employee_tbl (employeeid, firstname, lastname, username, password, companyid, departmentid, positionid, datecreated) 
	VALUES ('$employeeid','$firstname','$lastname','$username','$password','$company','$departmentid','$positionid','$datecreated')";

$another = mysqli_query($conn, $sql);
if ($another == true) {
	$last_id = mysqli_insert_id($conn);

	foreach ($_POST['rolerr'] as $temp) {
		// $role_insert = "INSERT INTO accrole_tbl('employeeid', 'usertype','datecreated') VALUES ('$last_id','$temp','$datecreated')";
		$role_insert  = "INSERT INTO `accrole_tbl`( `employeeid`, `usertype`, `datecreated`) VALUES
		 ('$last_id','$temp','$datecreated')";

		$lastex      = mysqli_query($conn, $role_insert);
	}
}
