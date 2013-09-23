<?php include ('includes/conect.php');
//include('includes/sesion.php');

if (isset($_POST['submit'])){
extract($_POST);
$errors = array();

		if (empty($name)) {
		$errors['name'] = "The name field is empty";
		}
							
				if (empty($errors)) {	
				$query="INSERT INTO drivers SET
				name = '$name', 
				status = '$status'";	
				mysql_query($query);
			
		
		$msj="Special Requirement has been Saved!";
		
	}}		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p><a href="index.php">Home</a> &gt; <a href="driver_list.php">Drivers</a></p>
  <?php include('includes/warnings.php'); ?>
  <table width="535" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>Driver's Name</td>
      <td><label for="name"></label>
      <input name="name" type="text" id="name" size="45" /></td>
    </tr>
    <tr>
      <td>Available</td>
      <td><input name="status" type="checkbox" id="status" value="1" />
      <label for="status"></label>        
      <br /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" class="forminput" id="submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>