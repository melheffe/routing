<?php
include ('conect.php');

extract($_REQUEST);

@$destination_cat_id=$_REQUEST['destination_cat_id'];
@$title = $_REQUEST["title"];

if (empty($activo)){
			$activo=2;
			}
				
				$sql = "UPDATE destination_cats SET
				title='$title' WHERE destination_cat_id=".$destination_cat_id;
				
				//print_r($_REQUEST);
					   
				mysql_query($sql);
				//$qpaso = mysql_affected_rows();
				//echo $qpaso;
				header("Location: ../destination_cat_list.php?status=1");

?>