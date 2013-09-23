<?PHP include('includes/conect.php');

$sql_cat = "SELECT * FROM destination_cats ORDER BY title";
$cat_exec=mysql_query($sql_cat);

@$destination_id=$_REQUEST['destination_id'];

$sql="SELECT * FROM destinations WHERE destination_id=$destination_id";
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

<form id="form1" name="form1" method="post" action="includes/destination_edita_inc.php?destination_id=<?=$destination_id?>">
        	<p><a href="index.php">Home</a> &gt; <a href="destination_list.php">Destination</a></p>
        	<div align="center" class="style3">
              <p>&nbsp;</p>
  </div>
  <p align="center" class="norm">
<?php include('includes/warnings.php'); ?>
              <br />
            </p>
            <table width="535" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td>Title</td>
                <td><label for="title"></label>
                  <input name="title" type="text" id="title" value="<?php echo $busca['title'];?>" size="45" /></td>
              </tr>
              <tr>
                <td>Category</td>
                <td><select name="destination_cat_id" id="destination_cat_id">
                  <option value="0" selected="selected">Select Destination Category</option>
                  <?php while($cat_row=mysql_fetch_array($cat_exec)){ ?>
                  <option value="<?=$cat_row['destination_cat_id']?>">
                    <?=$cat_row['title']?>
                  </option>
                  <?php } ?>
                </select></td>
              </tr>
              <tr>
                <td>Address 1</td>
                <td><input name="address_1" type="text" id="address_1" value="<?php echo $busca['address_1'];?>" size="45" />
                  <br /></td>
              </tr>
              <tr>
                <td>Address 2</td>
                <td><input name="address_2" type="text" id="address_2" value="<?php echo $busca['address_2'];?>" size="45" /></td>
              </tr>
              <tr>
                <td>City</td>
                <td><input name="city" type="text" id="city" value="<?php echo $busca['city'];?>" size="45" /></td>
              </tr>
              <tr>
                <td>State</td>
                <td><input name="state" type="text" id="state" value="<?php echo $busca['state'];?>" size="45" /></td>
              </tr>
              <tr>
                <td>Zip</td>
                <td><input name="zipcode" type="text" id="zipcode" value="<?php echo $busca['zipcode'];?>" size="45" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input name="submit" type="submit" class="forminput" id="submit" value="Submit" /></td>
              </tr>
            </table>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
</form>
</body>
</html>