<?php
include 'Include/config.php';
$departmentid = $_POST["departmentid"];
$result = mysqli_query($conn,"SELECT * FROM position_tbl where departmentid = $departmentid");
?>
<option value="">Select Position</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["id"];?>"><?php echo $row["position"];?></option>
<?php
}
?>