<?php 
session_start();

// echo $_SESSION['usertype'] ;


$variable = $_SESSION['usertype'];

// $data[] = $variable ; 

// $coubt = count($variable);
//  echo '<br>' ;
// echo $coubt;

$var = array($variable);   

$ser = serialize($variable);

echo $ser;



// var_dump($variable);



?>