<?php
require_once "Include/config.php";
$company = $_POST["company"];
$result = mysqli_query($conn,"SELECT * FROM dep_tbl where companyid = $company AND status = '1'");
?>
<option value="">Select Department</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["id"];?>"><?php echo $row["department"];?></option>
<?php
}
?>