<?php
include ('conect.php');

extract($_REQUEST);

@$patient_destination_id=$_REQUEST['patient_destination_id'];

$query = "DELETE FROM patient_destinations WHERE patient_destination_id = $patient_destination_id";
		mysql_query($query);
		$status = mysql_affected_rows();

header("Location: ../patient_list.php?status=6");
exit();

?>