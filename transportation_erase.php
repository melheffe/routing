<?php
include ('includes/conect.php');
@$transportation_id=$_REQUEST['transportation_id'];

$query = "DELETE FROM transportations WHERE transportation_id = $transportation_id";
		mysql_query($query);
		$status = mysql_affected_rows();

header("Location: transportation_list.php");
exit();
?>