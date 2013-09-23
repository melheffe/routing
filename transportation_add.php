<?php include ('includes/conect.php');
//include('includes/sesion.php');

if (isset($_POST['submit'])){
extract($_POST);
$errors = array();

		if (empty($title)) {
		$errors['title'] = "The title field is empty";
		}
		if (empty($code)) {
		$errors['titlw'] = "The code field is empty";
		}
		if (empty($capacity)) {
		$errors['titlw'] = "The capacity field is empty";
		}
		
							
				if (empty($errors)) {	
				$query="INSERT INTO transportations SET
				title = '$title', 
				code = '$code',
				capacity = '$capacity',
				special_feat = '$special_feat',
				status = '$status'";	
				mysql_query($query);
			
		
		$msj="Transportation has been Saved!";
		
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
  <p><a href="index.php">Home</a> &gt; <a href="transportation_list.php">Transportation</a></p>
  <?php include('includes/warnings.php'); ?>
  <table width="535" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>Title</td>
      <td><label for="title"></label>
      <input name="title" type="text" id="title" value="" size="45" /></td>
    </tr>
    <tr>
      <td>Code</td>
      <td><input name="code" type="text" id="code" value="" size="45" />        <br /></td>
    </tr>
    <tr>
      <td>Capacity</td>
      <td><input name="capacity" type="text" id="capacity" size="45" /></td>
    </tr>
    <tr>
      <td>Special Features</td>
      <td><input name="special_feat" type="text" id="special_feat" value="" size="45" /></td>
    </tr>
    <tr>
      <td>Status</td>
      <td><input name="status" type="checkbox" id="status" value="1" />
        Available</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" class="forminput" id="submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>