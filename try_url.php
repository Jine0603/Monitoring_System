<?php

   $how = json_decode($_GET['try']);
foreach ($how as $something){
    echo $something.'<br>';
}