<?php
include ('includes/conect.php');
@$driver_id=$_REQUEST['driver_id'];

$query = "DELETE FROM drivers WHERE driver_id = $driver_id";
		mysql_query($query);
		$status = mysql_affected_rows();

header("Location: driver_list.php");
exit();
?>