<?php
include 'Include/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve the selected date range from the Ajax request
    $startDate = $_POST['startDate'] ?? '';
    $endDate = $_POST['endDate'] ?? '';
    $cat = $_POST['cat'] ?? '';

    if ($startDate != '' && $endDate != '' && $cat != 'default'){
    $sql = "SELECT * FROM item_tbl WHERE date_created BETWEEN '$startDate' AND '$endDate' AND categoriesid  = '$cat' AND status = '1' AND assigned_status = '1'";

    }
    else if ($cat != 'default'){
        $sql = "SELECT * FROM item_tbl WHERE categoriesid  = '$cat' AND status = '1'AND assigned_status = '1'";
    }
    $query = mysqli_query($conn, $sql);
    $data = array();
    $no = 0;

    while ($rows = mysqli_fetch_assoc($query)) {
        $no++;
        
        $sql = "";

        
        // Your existing code for generating the button
        $br = '<a href="brcode_assigned.php?id=' . $rows['categoriesid'] . ' - ' . $rows['assetid'] . '"  class="btn btn-info"
         title="Edit" target="blank_"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M24 32C10.7 32 0 42.7 0 56V456c0 13.3 10.7 24 24 24H40c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H24zm88 0c-8.8 0-16 7.2-16 16V464c0 8.8 7.2 16 16 16s16-7.2 16-16V48c0-8.8-7.2-16-16-16zm72 0c-13.3 0-24 10.7-24 24V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H184zm96 0c-13.3 0-24 10.7-24 24V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H280zM448 56V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H472c-13.3 0-24 10.7-24 24zm-64-8V464c0 8.8 7.2 16 16 16s16-7.2 16-16V48c0-8.8-7.2-16-16-16s-16 7.2-16 16z"/></svg></a>';

        $data[] = array(
            "no"    => $no,
            "name"  => $rows['assetname'],
            "asset" => $rows['categoriesid'] . ' - ' . $rows['assetid'],
            "btn"   => $br,
        );
    }

    // Send the data back to the client
    echo json_encode($data);
}
