<?php
include 'Include/config.php';

if(!isset($_POST['searchTerm'])){ 
    $fetchData = mysqli_query($conn,"SELECT * FROM emp_tbl order by firstname limit 5");
}else{ 
    $search = $_POST['searchTerm'];   
    $fetchData = mysqli_query($conn,"SELECT * FROM emp_tbl where firstname like '%".$search."%' limit 5");
} 

$data = array();
while ($row = mysqli_fetch_array($fetchData)) {    
    $data[] = array("id"=>$row['id'], "text"=>$row['firstname']);
}
echo json_encode($data);