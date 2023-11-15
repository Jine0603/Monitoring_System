<?php

include 'Include/config.php';

if (isset($_POST["orig"])) {

    $ids = $_POST['orig'];

    $sql = "SELECT * FROM multfile_tbl WHERE itemid = '$ids'";
    $query = mysqli_query($conn, $sql);

    $html = '';
    while ($rows = mysqli_fetch_assoc($query)) {

        $filename = $rows['file'];

?>
            <a href="uploadimg/<?php echo $filename; ?>" style="color: blue;"><br><?php echo $filename;?></a>



<?php   }
}
?>