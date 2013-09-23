<?php
include ('includes/conect.php');
@$destination_id=$_REQUEST['destination_id'];

$query = "DELETE FROM destinations WHERE destination_id = $destination_id";
		mysql_query($query);
		$status = mysql_affected_rows();

header("Location: destination_list.php");
exit();
?>