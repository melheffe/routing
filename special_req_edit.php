<?PHP include('includes/conect.php');

@$special_req_id=$_REQUEST['special_req_id'];

$sql="SELECT * FROM special_reqs WHERE special_req_id=$special_req_id";
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

<form id="form1" name="form1" method="post" action="includes/special_req_edita_inc.php?special_req_id=<?=$special_req_id?>">
        	<p><a href="index.php">Home</a> &gt; <a href="special_req_list.php">Special Requirements</a></p>
        	<div align="center" class="style3">
              <p>&nbsp;</p>
  </div>
  <p align="center" class="norm">
<?php include('includes/warnings.php'); ?>
              <br />
            </p>
            <table width="497" border="0" align="center">
              <tr>
                <td width="105" height="24" class="style3"><div align="center">Name:</div></td>
                <td width="382"><label>
                  <input name="title" type="text" id="title" value="<?php echo $busca['title'];?>" />
                </label></td>
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