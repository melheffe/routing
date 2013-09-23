<?php include('includes/conect.php');
    
	$result=mysql_query ("SELECT * FROM drivers") or die (mysql_error ());
 
	$data = array();
 
	while ($row=mysql_fetch_object($result))
	{
		$data [] = $row;
	}
 
	echo json_encode($data);
?>
