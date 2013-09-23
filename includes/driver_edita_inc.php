<?php
include ('conect.php');

extract($_REQUEST);

@$driver_id=$_REQUEST['driver_id'];
@$name = $_REQUEST["name"];
@$status = $_REQUEST["status"];

				
				$sql = "UPDATE drivers SET
				name='$name', 
				status='$status' WHERE driver_id=".$driver_id;
				
				//print_r($_REQUEST);
					   
				mysql_query($sql);
				//$qpaso = mysql_affected_rows();
				//echo $qpaso;
				header("Location: ../driver_list.php?status=1");

?>