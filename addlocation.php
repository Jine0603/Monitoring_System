<?php
	include 'Include/config.php';

	$location    = $_POST['location'];

	$sql = "INSERT INTO location_tbl(location) 
	VALUES ('$location')";

    // print_r($sql);
    
    // // echo "$companyid, $departmentid, $position";
    $res = mysqli_query($conn, $sql);


    if($res == true){
        echo "<script> alert('Finishe')</script>" ; 
    }
?>