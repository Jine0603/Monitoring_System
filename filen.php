<?php
include 'Include/config.php';

$data = array();
$item = $_GET['id'];

$sql = "SELECT * FROM multfile_tbl WHERE itemid = '$item'";

$query = mysqli_query($conn, $sql);
$no    = 0;

while ($rows = mysqli_fetch_assoc($query)) {
  $no++;
  $id     = $rows['id'];
  $status = $rows['status'];

  if ($status == '1') {
    $status = '<badge  class="badge bg-success" style="width:70px;height="100px">Active</badge>';
  } else {
    $status = '<badge  class="badge badge-danger" style="width:70px;height="100px">Inactive</badge>';
  }

  $filname = '<a href="./uploadimg/'.$rows['file'].'" style="text-color:black;" target="blank_" >' . $rows['file'] .'</a>';
  $file = '<a href="./uploadimg/' . $rows['file'] . '"  class="btn btn-primary" style="text-color:black;" target="blank_" ><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 464H96v48H64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H229.5c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3V288H336V160H256c-17.7 0-32-14.3-32-32V48H64c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16zM176 352h32c30.9 0 56 25.1 56 56s-25.1 56-56 56H192v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24H192v48h16zm96-80h32c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H304c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H320v96h16zm80-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z"/></svg></a>';

  $act1 = '<button  class="btn btn-danger inactive"
    data-id = "' . $rows['id'] . '"
    title   = "Delete"><svg xmlns = "http://www.w3.org/2000/svg" width = "15" height = "15" viewBox = "0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>';

  $data[] = array(
    "no"     => $no,
    "name"   => $filname,
    "flname" => $file,
    "status" => $status,
    "act"    => $act1,
  );
}
echo json_encode($data);
