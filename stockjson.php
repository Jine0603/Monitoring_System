<?php
include 'Include/config.php';

$data = array();

    $sql = "SELECT * FROM dep_tbl WHERE companyid = '1' AND status = '1'";

$query = mysqli_query($conn, $sql);

while($rows = mysqli_fetch_assoc($query)) {

    $dep = $rows['id'];


    $sql1 = "SELECT SUM(quantity) as total FROM assigned_tbl WHERE status = '1' AND departmentid = '$dep' GROUP BY departmentid";
    $query1 = mysqli_query($conn, $sql1);
    $ctotal = mysqli_num_rows($query1);

    

    if($ctotal > 0)
    {
        $row = mysqli_fetch_assoc($query1);
        $totalstocks = '<button class="text-primary total_all" data-id="'.$rows['id'].'" data-toggle="modal" data-target="#infof" style="border:none">' . $row['total'] .'</button>';

    }
    else
    {
        $totalstocks = '<button class="text-primary total_all" data-id="'.$rows['id'].'" data-toggle="modal" data-target="#infof" style="border:none">0</button>';
    
    }
   
        $data[] = array(
                "cat" => $rows['department'],
                "total" => $totalstocks,
            );   
    }
    
echo json_encode($data);
