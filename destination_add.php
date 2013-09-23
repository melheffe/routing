<?php include ('includes/conect.php');
//include('includes/sesion.php');

$sql_cat = "SELECT * FROM destination_cats ORDER BY title";
$cat_exec=mysql_query($sql_cat);

extract($_REQUEST);

@$patient=$_REQUEST['patient'];


if (isset($_POST['submit'])){
extract($_POST);
$errors = array();

		if (empty($title)) {
		$errors['titlw'] = "The title field is empty";
		}
							
				if (empty($errors)) {	
				$query="INSERT INTO destinations SET
				title = '$title',
				destination_cat_id = '$destination_cat_id',
				address_1 = '$address_1',
				address_2 = '$address_2',
				city = '$city',
				state = '$state',
				zipcode = '$zipcode'";	
				mysql_query($query);
			
		$used_id = mysql_insert_id();
		
		$msj="Destination has been Saved! $used_id";
		
		if (!empty($patient)){
		
		header("Location: trip_destinations.php?trip=$patient");
		
		}
		
		
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
  <p><a href="index.php">Home</a> &gt; <a href="destination_list.php">Destinations</a></p>
  <?php include('includes/warnings.php'); ?>
  <table width="535" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>Title</td>
      <td><label for="title"></label>
      <input name="title" type="text" id="title" value="" size="45" /></td>
    </tr>
    <tr>
      <td>Category</td>
      <td><select name="destination_cat_id" id="destination_cat_id">
        <option value="0" selected="selected">Select Destination Category</option>
        <?php while($cat_row=mysql_fetch_array($cat_exec)){ ?>
        <option value="<?=$cat_row['destination_cat_id']?>">
          <?=$cat_row['title']?>
          </option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td>Address 1</td>
      <td><input name="address_1" type="text" id="address_1" value="" size="45" />        <br /></td>
    </tr>
    <tr>
      <td>Address 2</td>
      <td><input name="address_2" type="text" id="address_2" value="" size="45" /></td>
    </tr>
    <tr>
      <td>City</td>
      <td><input name="city" type="text" id="city" value="" size="45" /></td>
    </tr>
    <tr>
      <td>State</td>
      <td><input name="state" type="text" id="state" value="" size="45" /></td>
    </tr>
    <tr>
      <td>Zip</td>
      <td><input name="zipcode" type="text" id="zipcode" value="" size="45" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" class="forminput" id="submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>