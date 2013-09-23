<?php
include ('includes/conect.php');
@$destination_cat_id=$_REQUEST['destination_cat_id'];

$query = "DELETE FROM destination_cats WHERE destination_cat_id = $destination_cat_id";
		mysql_query($query);
		$status = mysql_affected_rows();

header("Location: destination_cat_list.php");
exit();
?>