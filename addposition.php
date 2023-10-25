<?php
	include 'Include/config.php';
	include 'timezone.php';
    global $date_now;

	$company    = $_POST['company'];
	$departmentid = $_POST['departmentid'];
	$position     = $_POST['position'];
	$datecreated  = date("Y-m-d h:i A");

	$sql = "INSERT INTO position_tbl(companyid, departmentid, position, datecreated) 
	VALUES ('$company','$departmentid','$position','$datecreated')";

	// print_r($sql);
    
    // echo "$companyid, $departmentid, $position";
    $res = mysqli_query($conn, $sql);


    if($res == true){
        echo "<script> alert('Finishe')</script>" ; 
    }
?>