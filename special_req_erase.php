<?php
include ('includes/conect.php');
@$special_req_id=$_REQUEST['special_req_id'];

$query = "DELETE FROM special_reqs WHERE special_req_id = $special_req_id";
		mysql_query($query);
		$status = mysql_affected_rows();

header("Location: special_req_list.php");
exit();
?>