<?php include ('includes/conect.php');
include('includes/lib.php');

$startpointid = findstartpointsid();

$sql_cat = "SELECT * FROM destinations WHERE destination_cat_id = $startpointid ORDER BY title";
$cat_exec=mysql_query($sql_cat);

$sql_catx = "SELECT * FROM destinations";
$cat_execx=mysql_query($sql_catx);

$sql_cat2 = "SELECT * FROM drivers ORDER BY name";
$cat_exec2=mysql_query($sql_cat2);

$sql_cat3 = "SELECT * FROM transportations ORDER BY title";
$cat_exec3=mysql_query($sql_cat3);

extract($_REQUEST);

if (isset($_POST['submit'])){
extract($_POST);
$errors = array();

		if (empty($title)) {
		$errors['titlw'] = "The title field is empty";
		}
							
				if (empty($errors)) {	
				$query="INSERT INTO trips SET
				title = '$title',
				driver_id = '$driver_id',
				transportation_id = '$transportation_id',
				starting_point_destination_id = '$starting_point_destination_id',
				ending_point_destination_id = '$ending_point_destination_id',
				date_created = '$date_created',
				date_starts = '$date_starts'";	
				mysql_query($query);
			    $id = mysql_insert_id();
		
		$msj="Destination has been Saved!  $id";
		
		if (!empty($patient)){
		
		header("Location: add_address.php?patient_id=$patient");
		
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
<?php echo $startpointid; ?>
<form id="form1" name="form1" method="post" action="">
  <p><a href="index.php">Home</a> &gt; <a href="trip_list.php">Trips</a></p>
  <?php include('includes/warnings.php'); ?>
  <table width="535" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>Title</td>
      <td><label for="title"></label>
      <input name="title" type="text" id="title" value="" size="45" /></td>
    </tr>
    <tr>
      <td>Trasportation</td>
      <td><select name="transportation_id" id="transportation_id">
        <option value="0" selected="selected">Select Transportation</option>
        <?php while($cat_row3=mysql_fetch_array($cat_exec3)){ ?>
        <option value="<?=$cat_row3['transportation_id']?>">
          <?=$cat_row3['title']?>
          </option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td>Driver</td>
      <td><select name="driver_id" id="driver_id">
        <option value="0" selected="selected">Select Driver</option>
        <?php while($cat_row2=mysql_fetch_array($cat_exec2)){ ?>
        <option value="<?=$cat_row2['driver_id']?>">
          <?=$cat_row2['name']?>
          </option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td>Start Point</td>
      <td><select name="starting_point_destination_id" id="starting_point_destination_id">
        <option value="0" selected="selected">Select Start Point</option>
        <?php while($cat_row=mysql_fetch_array($cat_exec)){ ?>
        <option value="<?=$cat_row['destination_id']?>">
          <?=$cat_row['title']?>
          </option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td>End Point</td>
      <td><select name="ending_point_destination_id" id="ending_point_destination_id">
        <option value="0" selected="selected">Select End Point</option>
        <?php while($cat_rowx=mysql_fetch_array($cat_execx)){ ?>
        <option value="<?=$cat_rowx['destination_id']?>">
          <?=$cat_rowx['title']?>
          </option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td>Date / Hour</td>
      <td><input name="city" type="text" id="city" value="" size="45" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" class="forminput" id="submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>