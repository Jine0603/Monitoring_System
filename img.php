<?php

include 'Include/config.php';

if (isset($_POST["id"])) {
    $idd = $_POST['id'];
    $result = mysqli_query($conn, "SELECT * FROM item_tbl WHERE id = '$idd'");
    while ($row = mysqli_fetch_array($result)) { 

        $imageUrl = $row['file_name'];
        $imagePath = 'uploadimg/' . $imageUrl;
        ?>

        <img src="uploadimg/<?php echo $imageUrl; ?>" width="300" height="200" alt="Image">
        <input type ="text" class="form-control" id="orgfilename" value="<?php echo $imageUrl;?>" hidden>

<?php }
}
?>