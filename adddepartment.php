<?php
	include 'Include/config.php';

	$companyid    = $_POST['companyid'];
	$department = $_POST['departmentid'];

	$sql = "INSERT INTO dep_tbl(companyid, department) 
	VALUES ('$companyid','$department')";

    // print_r($sql);
    
    // // echo "$companyid, $departmentid, $position";
    $res = mysqli_query($conn, $sql);


    if($res == true){
        echo "<script> alert('Finishe')</script>" ; 
    }
?>