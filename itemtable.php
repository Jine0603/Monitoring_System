<?php
include 'Include/config.php';

$data = array();

$sql = "SELECT item_tbl.id,location_tbl.location,categ_tbl.categories,com_tbl.company,dep_tbl.department As departmentid,item_tbl.assetid,
 item_tbl.file_name,item_tbl.assetname,item_tbl.companyid,item_tbl.categoriesid,item_tbl.departmentid,item_tbl.date_purchase,item_tbl.locationid,item_tbl.date_created
 FROM item_tbl
 LEFT JOIN location_tbl ON location_tbl.id = item_tbl.locationid
 LEFT JOIN categ_tbl ON categ_tbl.id           = item_tbl.categoriesid
 LEFT JOIN com_tbl ON com_tbl.id               = item_tbl.companyid
 LEFT JOIN dep_tbl ON dep_tbl.id               = item_tbl.departmentid";

$query = mysqli_query($conn, $sql);
$no    = 0;

while ($rows = mysqli_fetch_assoc($query)) {
    $no++;
    $id = $rows['id'];

    $file = '<div class="round-image-container"><img src="./uploadimg/' . $rows['file_name'] . '" alt="Image">';
    $act3 = '<button  class="btn btn-primary copydata" 
    data-id="'.$rows['id'].'"  
    title = "Remove">Edit</button>';
    $act2 = '<button  class="btn btn-primary copydata" 
    data-id="'.$rows['id'].'"  
    title = "Remove">View</button>';
    $act1 = '<button  class="btn btn-primary assign" 
    data-id="'.$rows['id'].'"  
    title = "Remove">Assign</button>';

    $data[] = array(
        "no"       => $no,
        "itemid"   => $rows['assetid'] ,
        "flname"   => $file ,
        "itemname" => $rows['assetname'] ,
        "comy"     => $rows['companyid'] ,
        "cat"      => $rows['categoriesid'] ,
        "dep"      => $rows['departmentid'] ,
        "datep"    => $rows['date_purchase'] ,
        "item"     => $rows['location'] ,
        "act"    => $act1.'  '.$act2 .'  '.$act3,
    );
}

echo json_encode($data);

