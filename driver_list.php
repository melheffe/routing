<?php include ('includes/conect.php');
//include('includes/sesion.php');
$fech=date("Y-m-d H:i:s");
@$status=$_REQUEST['status'];
if ($status==1) {
$msj="Registry updated succesfuly";
}

$sql="SELECT * FROM drivers";
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
    <td width="55"><form action="driver_add.php" method="post" name="form1" target="_self" id="form1">
      <input type="submit" name="New" id="New" value="New" />
    </form></td>
    <td width="418" class="titulos"><span class="style3">Drivers</span></td>
  </tr>
</table>
<br />
<table width="536" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="537"><table width="359" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#EBEBEB" class="text">
      <tr class="general">
        <td width="257" height="21" class="style3"><div align="center" class="style3"><strong>Name</strong></div></td>
        <td width="257" class="style3"><div align="center" class="style3"><strong>Available</strong></div></td>
      </tr>
      <?php while($row=mysql_fetch_assoc($sql_exec)){?>
      <tr class="sobreblancopeq">
        <td height="32" class="style4"><div align="center" class="style3 style100">
          <?=$row['name']?>
        </div></td>
        <td class="style4"><div align="center" class="style3 style100">
          <?php if ($row['status']==1) { echo "Yes";} else {echo "No";} ?>
        </div></td>
        <td width="96"><div align="center" class="style3 style100"><span class="style101"><?php echo "<a href='driver_edit.php?driver_id=".$row['driver_id']."'>Edit</a>"; ?> / <?php echo "<a href='driver_erase.php?driver_id=".$row['driver_id']."'>Erase</a>"; ?></span></div></td>
      </tr>
      <?php }?>
    </table></td>
  </tr>
</table>
</body>
</html>
