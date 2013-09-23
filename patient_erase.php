<?php
include ('includes/conect.php');
@$patient_id=$_REQUEST['patient_id'];

$query = "DELETE FROM patients WHERE patient_id = $patient_id";
		mysql_query($query);
		$status = mysql_affected_rows();

header("Location: patient_list.php");
exit();
?>