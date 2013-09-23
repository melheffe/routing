<?php
include ('conect.php');

extract($_REQUEST);

@$patient_id=$_REQUEST['patient_id'];
@$destination_id = $_REQUEST["destination_id"];

$errors = array();

		
				$query="INSERT INTO patient_destinations SET
				patient_id = '$patient_id',
				destination_id = '$destination_id'";	
				mysql_query($query);
			
		
		$msj="Special Requirement has been Saved!";
		
		header("Location: ../patient_list.php?status=4");
		

?>