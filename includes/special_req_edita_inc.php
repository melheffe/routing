<?php
include ('conect.php');

extract($_REQUEST);

@$special_req_id=$_REQUEST['special_req_id'];
@$title = $_REQUEST["title"];

if (empty($activo)){
			$activo=2;
			}
				
				$sql = "UPDATE special_reqs SET
				title='$title' WHERE special_req_id=".$special_req_id;
				
				//print_r($_REQUEST);
					   
				mysql_query($sql);
				//$qpaso = mysql_affected_rows();
				//echo $qpaso;
				header("Location: ../special_req_list.php?status=1");

?>