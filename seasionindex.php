<?php
include 'Include/config.php';
session_start();
if(isset($_SESSION["id"])){
    $accid = $_SESSION["id"];

}
else{
    header("Location: index.php");
}
?>