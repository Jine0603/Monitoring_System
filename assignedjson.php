<?php
include 'Include/config.php';

$data = array();

$sql = "SELECT item_tbl.id,itemstatus_tbl.itemsta,categ_tbl.categories,com_tbl.company,dep_tbl.department As departmentid,item_tbl.assetid,item_tbl.assetmodel,
 item_tbl.file_name,item_tbl.assetname,item_tbl.companyid,item_tbl.categoriesid,item_tbl.departmentid,item_tbl.date_purchase,item_tbl.assetstatus,item_tbl.date_created,sample_db.assignemployee
 FROM item_tbl
 LEFT JOIN itemstatus_tbl ON itemstatus_tbl.id = item_tbl.assetstatus
 LEFT JOIN categ_tbl ON categ_tbl.id           = item_tbl.categoriesid
 LEFT JOIN com_tbl ON com_tbl.id               = item_tbl.companyid
 LEFT JOIN dep_tbl ON dep_tbl.id               = item_tbl.departmentid
 WHERE item_tbl.assetstatus =  2";

$query = mysqli_query($conn, $sql);
$no    = 0;

while ($rows = mysqli_fetch_assoc($query)) {
    $no++;
    $id = $rows['id'];

    $file = '<div class="round-image-container"><img src="./upload/' . $rows['file_name'] . '" alt="Image">';
    $act2 = '<button  class="btn btn-primary copydata" 
    data-id="'.$rows['id'].'"  
    title = "Remove">View</button>';

    $data[] = array(
        "no"       => $no,
        "itemid"   => $rows['assetid'] ,
        "model"    => $rows['assetmodel'] ,
        "flname"   => $file ,
        "itemname" => $rows['assetname'] ,
        "comy"     => $rows['companyid'] ,
        "cat"      => $rows['categories'] ,
        "dep"      => $rows['departmentid'] ,
        "datep"    => $rows['date_purchase'] ,
        "item"     => $rows['itemsta'] ,
        "assign"     => $rows['assignemployee'] ,
        "act"    => $act2,
    );
}

echo json_encode($data);

