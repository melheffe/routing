<?PHP include('includes/conect.php');

$sql_cat = "SELECT * FROM special_reqs ORDER BY title";
$cat_exec=mysql_query($sql_cat);


@$patient_id=$_REQUEST['patient_id'];

$sql="SELECT * FROM patients WHERE patient_id=$patient_id";
$sql_exec=mysql_query($sql);
$busca=mysql_fetch_assoc($sql_exec);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<style type="text/css">
#form1 table tr .style3 {
	text-align: center;
}
</style>
</head>

<body>

<form id="form1" name="form1" method="post" action="includes/patient_edita_inc.php?patient_id=<?=$patient_id?>">
        	<p><a href="index.php">Home</a> &gt; <a href="patient_list.php">Patients</a></p>
        	<div align="center" class="style3">
              <p>&nbsp;</p>
  </div>
  <p align="center" class="norm">
<?php include('includes/warnings.php'); ?>
              <br />
            </p>
            <table width="497" border="0" align="center">
              <tr>
                <td width="172" height="24" class="style3"><div align="center">Patient's Name:</div></td>
                <td width="315"><label>
                  <input name="name" type="text" id="name" value="<?php echo $busca['name'];?>" />
                </label></td>
              </tr>
              <tr>
                <td height="24" class="style3">Special Requirements</td>
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
                <td height="24" class="style3">&nbsp;</td>
                <td>&nbsp;</td>
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