<?php
include 'Include/config.php';
include 'send1.php';

$id           = $_POST['id'];
$employeeid   = $_POST['employeeid'];
$firstname    = $_POST['firstname'];
$lastname     = $_POST['lastname'];
$email        = $_POST['email'];
$username     = $_POST['username'];
$password     = $_POST['password'];
$company      = $_POST['company'];
$departmentid = $_POST['departmentid'];
$positionid   = $_POST['positionid'];
$datecreated  = date("Y-m-d h:i A");

$sql = "UPDATE employee_tbl 
        SET 
        employeeid    = '$employeeid',
        firstname    = '$firstname',
        lastname     = '$lastname',
        email        = '$email',
        username     = '$username',
        password     = '$password',
        companyid    = '$company',
        departmentid = '$departmentid',
        positionid   = '$positionid'
        WHERE 
        id = '$id'";

$query = mysqli_query($conn, $sql);

if ($query == true) {
    send_email($email, $username, $password);

 $fetch_id = "SELECT * FROM employee_tbl WHERE employeeid = '$employeeid'";
 $execut   = mysqli_query($conn, $fetch_id);
 $row      = mysqli_fetch_assoc($execut);
 
 $emp_id_no = $row['id'];

      // $row = mysqli_fetch_assoc($query);

    $sql1 = "UPDATE accrole_tbl 
    SET
          status     = '0'
    WHERE employeeid = '$emp_id_no' ";
    $execute = mysqli_query($conn, $sql1);

    foreach ($_POST['check'] as $temp) {
        $sql1  = "INSERT INTO `accrole_tbl`( `employeeid`, `usertype`, `datecreated`) VALUES
		 ('$emp_id_no','$temp','$datecreated')";

        $query = mysqli_query($conn, $sql1);
    }
}
mysqli_close($conn);
?>