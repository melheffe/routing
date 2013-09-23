<?php
include ('conect.php');

extract($_REQUEST);

@$patient_id=$_REQUEST['patient_id'];
@$name = $_REQUEST["name"];
@$special_req_id = $_REQUEST["special_req_id"];

				
				$sql = "UPDATE patients SET
				name='$name', 
				special_req_id='$special_req_id' WHERE patient_id=".$patient_id;
				
				//print_r($_REQUEST);
					   
				mysql_query($sql);
				//$qpaso = mysql_affected_rows();
				//echo $qpaso;
				header("Location: ../patient_list.php?status=1");

?>