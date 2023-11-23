<?php
$data = array();



foreach ($_POST['check'] as $checker) {

    $data[] = $checker;
}

echo json_encode($data);
