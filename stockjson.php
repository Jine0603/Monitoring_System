<?php
include 'Include/config.php';

$data = array();

    $sql = "SELECT * FROM categ_tbl";

$query = mysqli_query($conn, $sql);

while($rows = mysqli_fetch_assoc($query)) {

    $categ = $rows['categories'];

    $sql2 = "SELECT * FROM dep_tbl";
    $query1 = mysqli_query($conn, $sql2);

    while($row = mysqli_fetch_assoc($query1)) {

        $dept = $row['department'];

    // $sql1 = "SELECT SUM(quantity) as total_dep FROM assigned_tbl WHERE cateid = '$categ' GROUP BY cateid AND GROUP BY cateid";
    // $query1 = mysqli_query($conn, $sql1);
    // $ctotal = mysqli_num_rows($query1);

    

    // if($ctotal > 0)
    // {
    //     $row = mysqli_fetch_assoc($query1);
    //     $totalstocks = '<button class="text-primary total_all" data-id="'.$rows['id'].'" data-toggle="modal" data-target="#infof" style="border:none">' . $row['total_stocks'] .'</button>';
    //     $totaluse = '<button class="text-primary total_use" data-id="'.$rows['id'].'" data-toggle="modal" data-target="#infof" style="border:none">' . $row['total_use'] .'</button>';
    //     $totals = '<button class="text-primary total_stock" data-id="'.$rows['id'].'" data-toggle="modal" data-target="#infof" style="border:none">' . $row['total_stocks'] - $row['total_use'] .'</button>';

    // }
    // else
    // {
    //     $totalstocks = '<button class="text-primary total_all" data-id="'.$rows['id'].'" data-toggle="modal" data-target="#infof" style="border:none">0</button>';
    //     $totaluse = '<button class="text-primary total_use" data-id="'.$rows['id'].'" data-toggle="modal" data-target="#infof" style="border:none">0</button>';
    //     $totals = '<button class="text-primary total_stock" data-id="'.$rows['id'].'" data-toggle="modal" data-target="#infof" style="border:none">0</button>';
    // }
   
        $data[] = array(
                "cat" => $rows['description'],
                "dep" => $dept,
            );   
    }
}
    
echo json_encode($data);
