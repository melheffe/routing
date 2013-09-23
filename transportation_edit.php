<?PHP include('includes/conect.php');

@$transportation_id=$_REQUEST['transportation_id'];

$sql="SELECT * FROM transportations WHERE transportation_id=$transportation_id";
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

<form id="form1" name="form1" method="post" action="includes/transportation_edita_inc.php?transportation_id=<?=$transportation_id?>">
        	<p><a href="index.php">Home</a> &gt; <a href="transportation_list.php">Transportation</a></p>
        	<div align="center" class="style3">
              <p>&nbsp;</p>
  </div>
  <p align="center" class="norm">
<?php include('includes/warnings.php'); ?>
              <br />
            </p>
            <table width="497" border="0" align="center">
              <tr>
                <td width="105">Title</td>
                <td width="382"><label for="title"></label>
                  <input name="title" type="text" id="title" value="<?php echo $busca['title'];?>" size="45" /></td>
              </tr>
              <tr>
                <td>Code</td>
                <td><input name="code" type="text" id="code" value="<?php echo $busca['code'];?>" size="45" />
                <br /></td>
              </tr>
              <tr>
                <td>Capacity</td>
                <td><input name="capacity" type="text" id="capacity" value="<?php echo $busca['capacity'];?>" size="45" /></td>
              </tr>
              <tr>
                <td>Special Features</td>
                <td><input name="special_feat" type="text" id="special_feat" value="<?php echo $busca['title'];?>" size="45" /></td>
              </tr>
              <tr>
                <td>Status</td>
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