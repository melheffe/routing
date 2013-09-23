<?php include ('includes/conect.php');
include('includes/lib.php');

@$trip_id=$_REQUEST['trip_id'];

$sql_cat = "SELECT * FROM patients";
$cat_exec =mysql_query($sql_cat);

extract($_REQUEST);

if (isset($_POST['submit'])){
extract($_POST);
$errors = array();

		if (empty($trip_id)) {
		$errors['trip_id'] = "Something went Wrong";
		}
							
		$destinations_id = get_patients_destination_id($patient_id);	
			
				if (empty($errors)) {	
				$query="INSERT INTO trip_destinations SET
				trip_id = '$trip_id',
				patient_id = '$patient_id',
				patient_destination_id = '$destinations_id'";	
				mysql_query($query);
			    $id = mysql_insert_id();
		
		$msj="Destination has been Saved!";
		
		//echo $trip_id.$destinations_id;
		header("Location: trip_list.php?status=2");
		
		
		
		
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

<form id="form" name="form" method="post" action=''>
  <p><a href="index.php">Home</a> &gt; <a href="trip_list.php">Trips</a></p>
  <?php include('includes/warnings.php'); ?>
  <table width="535" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>Patient</td>
      <td><select name="patient_id" id="patient_id" onchange=\"reload(this.form)\">
        <option value="0" selected="selected">Select Patient</option>
        <?php while($cat_row=mysql_fetch_array($cat_exec)){ ?>
        <option value="<?=$cat_row['patient_id']?>">
          <?=$cat_row['name']?>
          </option>
        <?php } ?>
      </select>
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