<?php
include ('conect.php');

extract($_REQUEST);

@$trip_destination_id=$_REQUEST['trip_destination_id'];

$query = "DELETE FROM trip_destinations WHERE trip_destination_id = $trip_destination_id";
		mysql_query($query);
		$status = mysql_affected_rows();

header("Location: ../trip_list.php?status=6");
exit();

?>