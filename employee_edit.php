<?php
include 'Include/config.php';

$employeeid   = $_POST['employeeid'];
$firstname    = $_POST['firstname'];
$lastname     = $_POST['lastname'];
$username     = $_POST['username'];
$password     = $_POST['password'];
$company      = $_POST['company'];
$departmentid = $_POST['departmentid'];
$positionid   = $_POST['positionid'];
$datecreated  = date("Y-m-d h:i A");

$sql = "UPDATE employee_tbl 
        SET 
        firstname    = '$firstname',
        lastname     = '$lastname',
        username     = '$username',
        password     = '$password',
        companyid    = '$company',
        departmentid = '$departmentid',
        positionid   = '$positionid'
        WHERE 
        employeeid = '$employeeid'";

$query = mysqli_query($conn, $sql);

if ($query == true) {

 $fetch_id = "SELECT * FROM employee_tbl WHERE employeeid = '$employeeid'";
 $execut = mysqli_query($conn, $fetch_id);
 $row = mysqli_fetch_assoc($execut);
 
 $emp_id_no =  $row['id'];

    // $row = mysqli_fetch_assoc($query);

    $sql1 = "UPDATE accrole_tbl 
    SET
    status = '0'
    WHERE employeeid='$emp_id_no' ";
    $execute = mysqli_query($conn, $sql1);

    foreach ($_POST['check'] as $temp) {
        $sql1  = "INSERT INTO `accrole_tbl`( `employeeid`, `usertype`, `datecreated`) VALUES
		 ('$emp_id_no','$temp','$datecreated')";

        $query = mysqli_query($conn, $sql1);
    }
}
mysqli_close($conn);
?>