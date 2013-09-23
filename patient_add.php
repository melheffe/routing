<?php include ('includes/conect.php');
//include('includes/sesion.php');

$sql_cat = "SELECT * FROM special_reqs ORDER BY title";
$cat_exec=mysql_query($sql_cat);

if (isset($_POST['submit'])){
extract($_POST);
$errors = array();

		if (empty($name)) {
		$errors['name'] = "The name field is empty";
		}
							
				if (empty($errors)) {	
				$query="INSERT INTO patients SET
				name = '$name',
				special_req_id = '$special_req_id'";	
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
  <p><a href="index.php">Home</a> &gt; <a href="patient_list.php">Patients</a></p>
  <?php include('includes/warnings.php'); ?>
  <table width="535" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="169">Patient's Name</td>
      <td width="366"><label for="name"></label>
      <input name="name" type="text" id="name" size="45" /></td>
    </tr>
    <tr>
      <td>Special Requirements</td>
      <td><select name="special_req_id" id="special_req_id">
        <option value="0" selected="selected">Select Special Requirement</option>
        <?php while($cat_row=mysql_fetch_array($cat_exec)){ ?>
        <option value="<?=$cat_row['special_req_id']?>">
          <?=$cat_row['title']?>
          </option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" class="forminput" id="submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>