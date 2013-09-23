<?php
include ('conect.php');

extract($_REQUEST);

@$destination_id=$_REQUEST['destination_id'];
@$title = $_REQUEST["title"];
@$destination_cat_id = $_REQUEST["destination_cat_id"];
@$address_1 = $_REQUEST["address_1"];
@$address_2 = $_REQUEST["address_2"];
@$city = $_REQUEST["city"];
@$state = $_REQUEST["state"];
@$zipcode = $_REQUEST["zipcode"];
@$validated = $_REQUEST["validated"];

if (empty($activo)){
			$activo=2;
			}
				
				$sql = "UPDATE destinations SET
				title='$title', 
				destination_cat_id='$destination_cat_id', 
				address_1='$address_1', 
				address_2='$address_2', 
				city='$city', 
				state='$state', 
				zipcode='$zipcode', 
				validated='$validated'
				 WHERE destination_id=".$destination_id;
				
				//print_r($_REQUEST);
					   
				mysql_query($sql);
				//$qpaso = mysql_affected_rows();
				//echo $qpaso;
				header("Location: ../destination_list.php?status=1");

?>