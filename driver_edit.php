<?PHP include('includes/conect.php');

@$driver_id=$_REQUEST['driver_id'];

$sql="SELECT * FROM drivers WHERE driver_id=$driver_id";
$sql_exec=mysql_query($sql);
$busca=mysql_fetch_assoc($sql_exec);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<form id="form1" name="form1" method="post" action="includes/driver_edita_inc.php?driver_id=<?=$driver_id?>">
        	<p><a href="index.php">Home</a> &gt; <a href="driver_list.php">Drivers</a></p>
        	<div align="center" class="style3">
              <p>&nbsp;</p>
  </div>
  <p align="center" class="norm">
<?php include('includes/warnings.php'); ?>
              <br />
            </p>
            <table width="497" border="0" align="center">
              <tr>
                <td width="105" height="24" class="style3"><div align="center">Driver's Name:</div></td>
                <td width="382"><label>
                  <input name="name" type="text" id="name" value="<?php echo $busca['name'];?>" />
                </label></td>
              </tr>
              <tr>
                <td height="24" class="style3"><div align="center">Status :</div></td>
                <td><input name="status" type="checkbox" id="status" value="1" <?php if (!(strcmp($busca['status'],"1"))) {echo "checked=\"checked\"";} ?> />
Available</td>
              </tr>
              <tr>
                <td height="45" colspan="2"><div align="center">
                  <input type="submit" name="submit" id="submit" value="Submit" />
                </div></td>
              </tr>
            </table>
            <p>&nbsp;</p>
</form>
</body>
</html>