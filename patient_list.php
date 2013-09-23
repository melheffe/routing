<?php include ('includes/conect.php');
require_once('includes/lib.php');
//include('includes/sesion.php');
$fech=date("Y-m-d H:i:s");
@$status=$_REQUEST['status'];
if ($status==1) {
$msj="Registry updated succesfuly";
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


$sql="SELECT * FROM patients";
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
    <td width="55"><form action="patient_add.php" method="post" name="form1" target="_self" id="form1">
      <input type="submit" name="New" id="New" value="New" />
    </form></td>
    <td width="418" class="titulos"><span class="style3">Patients</span></td>
  </tr>
</table>
<br />
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="537"><table width="750" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#EBEBEB" class="text">
      <tr class="general">
        <td width="106" height="21" class="style3"><div align="center" class="style3"><strong>Name</strong></div></td>
        <td width="193" class="style3"><div align="center" class="style3"><strong>Special Requirements</strong></div></td>
        <td width="193" class="style3"><div align="center" class="style3"><strong>Adresses</strong></div></td>
        </tr>
      <?php while($row=mysql_fetch_assoc($sql_exec)){?>
      <tr class="sobreblancopeq">
        <td height="32" class="style4"><div align="center" class="style3 style100">
          <?=$row['name']?>
        </div></td>
        <td class="style4"><div align="center" class="style3 style100">
          <?= show_special_req($row['special_req_id'])?>
        </div></td>
        <td class="style4"><div align="center" class="style3 style100">
        <?php $patient = $row['patient_id'];
		$sql1="SELECT * FROM patient_destinations WHERE patient_id = $patient";
				$sql_exec1=mysql_query($sql1);
				while($row1=mysql_fetch_assoc($sql_exec1)){
				echo show_address($row1['destination_id'])."<a href='includes/remove_address.php?patient_destination_id=".$row1['patient_destination_id']."'>[Remove]</a>";	
				}
           ?></br> 
          <a href="add_address.php?patient_id=<?=$row['patient_id']?>">[Add Address]</a></div></td>
        <td width="89"><div align="center" class="style3 style100"><span class="style101"><?php echo "<a href='patient_edit.php?patient_id=".$row['patient_id']."'>Edit</a>"; ?> / <?php echo "<a href='patient_erase.php?patient_id=".$row['patient_id']."'>Erase</a>"; ?></span></div></td>
      </tr>
      <?php }?>
    </table></td>
  </tr>
</table>
</body>
</html>
