<?php include ('includes/conect.php');
require_once('includes/lib.php');
//include('includes/sesion.php');
$fech=date("Y-m-d H:i:s");
@$patient_id=$_REQUEST['patient_id'];
if (empty($patient_id)) {
header("Location: patient_list.php?status=3");
}

$sql="SELECT * FROM destinations";
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
    <td width="55"><form action="destination_add.php?patient=<?=$patient_id?>" method="post" name="form1" target="_self" id="form1">
      <input type="submit" name="New" id="New" value="New" />
    </form></td>
    <td width="418" class="titulos"><span class="style3">Destinations</span></td>
  </tr>
</table>
<br />
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="537"><table width="874" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#EBEBEB" class="text">
      <tr class="general">
        <td width="105" height="21" class="style3"><div align="center" class="style3"><strong>Title</strong></div></td>
        <td width="123" class="style3"><div align="center" class="style3"><strong>Address 1</strong></div></td>
        <td width="123" class="style3"><div align="center" class="style3"><strong>Address 2</strong></div></td>
        <td width="103" class="style3"><div align="center" class="style3"><strong>City</strong></div></td>
        <td width="107" class="style3"><div align="center" class="style3"><strong>State</strong></div></td>
        <td width="98" class="style3"><div align="center" class="style3"><strong>Zip</strong></div></td>
        <td width="126" class="style3"><div align="center" class="style3"><strong>Validated</strong></div></td>
      </tr>
      <?php while($row=mysql_fetch_assoc($sql_exec)){?>
      <tr class="sobreblancopeq">
        <td height="32" class="style4"><div align="center" class="style3 style100">
          <?=$row['title']?>
        </div></td>
        <td class="style4"><div align="center" class="style3 style100">
          <?=$row['address_1']?>
        </div></td>
        <td class="style4"><div align="center" class="style3 style100">
          <?=$row['address_2']?>
        </div></td>
        <td class="style4"><div align="center" class="style3 style100">
          <?=$row['city']?>
        </div></td>
        <td class="style4"><div align="center" class="style3 style100">
          <?=$row['state']?>
        </div></td>
        <td class="style4"><div align="center" class="style3 style100">
          <?=$row['zipcode']?>
        </div></td>
        <td class="style4"><div align="center" class="style3 style100">
          <?=$row['validated']?>
        </div></td>
        <td width="71"><div align="center" class="style3 style100"><span class="style101"><?php echo "<a href='includes/select_address.php?destination_id=".$row['destination_id']."&patient_id=$patient_id'>[ Select ]</a>"; ?></span></div></td>
      </tr>
      <?php }?>
    </table></td>
  </tr>
</table>
</body>
</html>
