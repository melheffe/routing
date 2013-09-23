<?php include ('includes/conect.php');
require_once('includes/lib.php');
//include('includes/sesion.php');
$fech=date("Y-m-d H:i:s");
@$status=$_REQUEST['status'];
if ($status==1) {
$msj="Registry updated succesfuly";
}
if ($status==2) {
$msj="Patient and Destination succesfully added";
}
if ($status==3) {
$msj="An error trying to locate the Patient occur";
}
if ($status==4) {
$msj="Address has been addes Succesfully";
}
if ($status==5) {
$msj="Couldn't Add selected address to patient";
}
if ($status==6) {
$msj="Address succesfully removed";
}


$sql="SELECT * FROM trips";
$sql_exec=mysql_query($sql);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrator Panel</title>
</head>

<body>
<p><a href="index.php">Home</a></p>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
  <tr>
    <td class="sobreblancopeq"><div align="center"><strong>
<?php include('includes/warnings.php'); ?>
    </strong></div></td>
  </tr>
</table>
<br />
<table width="473" height="16" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
  <tr>
    <td width="55"><form action="trip_add.php" method="post" name="form1" target="_self" id="form1">
      <input type="submit" name="New" id="New" value="New" />
    </form></td>
    <td width="418" class="titulos"><span class="style3">Trip</span></td>
  </tr>
</table>
<br />
<table width="1200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="537"><table width="1100" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#EBEBEB" class="text">
      <tr class="general">
        <td width="116" height="21" class="style3"><div align="center" class="style3"><strong>Title</strong></div></td>
        <td width="139" class="style3"><div align="center" class="style3"><strong>Transportation</strong></div></td>
        <td width="90" class="style3"><div align="center" class="style3"><strong>Driver</strong></div></td>
        <td width="356" class="style3"><div align="center" class="style3"><strong>Starts / Ends</strong></div></td>
        <td width="87" class="style3"><div align="center" class="style3"><strong>Date / Time</strong></div></td>
        <td width="171" class="style3"><div align="center" class="style3"><strong>Adresses</strong></div></td>
        </tr>
      <?php while($row=mysql_fetch_assoc($sql_exec)){?>
      <tr class="sobreblancopeq">
        <td height="32" class="style4"><div align="center" class="style3 style100">
          <?=$row['title']?>
        </div></td>
        <td class="style4"><div align="center" class="style3 style100">
          <?= show_special_req($row['transportation_id'])?>
        </div></td>
        <td class="style4"><div align="center" class="style3 style100">
          <?= show_special_req($row['driver_id'])?>
        </div></td>
        <td class="style4"><div align="center" class="style3 style100">
          Starts: <?= show_address($row['starting_point_destination_id'])?>
          Ends : <?= show_address($row['ending_point_destination_id'])?>
        </div></td>
        <td class="style4"><div align="center" class="style3 style100">
          <?= $row['date_starts']?>
        </div></td>
        <td class="style4"><div align="center" class="style3 style100">
        <?php $trip = $row['trip_id'];
		$sql1="SELECT * FROM trip_destinations WHERE trip_id = $trip";
				$sql_exec1=mysql_query($sql1);
				while($row1=mysql_fetch_assoc($sql_exec1)){
				echo get_patient_default($row1['patient_destination_id'])."<a href='includes/remove_trip_destinations.php?trip_destination_id=".$row1['trip_destination_id']."'>[Remove]</a></br>";	
				}
           ?></br> 
          <a href="trip_destinations_add.php?trip_id=<?=$row['trip_id']?>">[Add Destination]</a></div></td>
        <td width="125"><div align="center" class="style3 style100"><span class="style101"><?php echo "<a href='trip_edit.php?trip_id=".$row['trip_id']."'>Edit</a>"; ?> / <?php echo "<a href='trip_erase.php?trip_id=".$row['trip_id']."'>Erase</a>";  ?> / <?php echo "<a href='routemap.php?trip_id=".$row['trip_id']."'>Map</a>";  ?></span></div></td>
      </tr>
      <?php }?>
    </table></td>
  </tr>
</table>
</body>
</html>
