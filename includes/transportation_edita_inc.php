<?php
include ('conect.php');

extract($_REQUEST);

@$transportation_id=$_REQUEST['transportation_id'];
@$title = $_REQUEST["title"];
@$code = $_REQUEST["code"];
@$capacity = $_REQUEST["capacity"];
@$special_feat = $_REQUEST["special_feat"];
@$status = $_REQUEST["status"];

if (empty($activo)){
			$activo=2;
			}
				
				$sql = "UPDATE transportations SET
				title='$title', 
				code='$code', 
				capacity='$capacity', 
				special_feat='$special_feat', 
				status ='$status'
				 WHERE transportation_id=".$transportation_id;
				
				//print_r($_REQUEST);
					   
				mysql_query($sql);
				//$qpaso = mysql_affected_rows();
				//echo $qpaso;
				header("Location: ../transportation_list.php?status=1");

?>