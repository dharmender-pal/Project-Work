<!DOCTYPE html>
<html>
<head>
	<title>DEQUEUE</title>
<link rel="stylesheet" href="assets/css/form.css" />
<link rel="icon" 
     type="image/png" 
     href="images/logo.png"> </link>
<style>
body {
    background-image: url("images/generate.jpg");
    background-size: 100% 100%;
    background-repeat: no-repeat;
  
}
</style>

</head>
<body>
<button class="navbutton" onclick="location.href = 'adminpanel.php'"><strong>BACK</strong></button>
 <?php 
session_start();

include_once 'register.php';

if(isset($_POST['btn-nodue']))
{   
    $id=$_POST['id'];
    $name=$_POST['name'];
    $att_fine= $_POST['att_fine'];
	$fee_fine = $_POST['fee_fine'];
	$lib_fine = $_POST['lib_fine'];
	$other_fine=$_POST['other_fine'];
	
	
	/*$id=trim($id);
	$name=trim($name);
	$att_fine=trim($att_fine);
	$fee_fine=trim($fee_fine);
	$lib_fine=trim($lib_fine);
	$other_fine=trim($other_fine);*/
	
	// email exist or not
	$query = "SELECT * FROM login WHERE  name= '$name'";
	$result = mysql_query($query);
	
	$count = $result->mysql_num_rows; 
	if($count == 0){
		
		if(mysql_query("UPDATE login SET att_fine='$att_fine',fee_fine='$fee_fine',lib_fine='$lib_fine',other_fine='$other_fine' WHERE name='$name'"))
		{
			?>
			<script>alert('successfully updated ');
		window.location.href="./index.php" ; 
		</script>
			<?php
		}
		else
		{
			?>
			<script>alert('error while updating the No due');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('Error while updating');</script>
				
    
			<?php
	}
	
}
?>    
<center style= "margin top: 200px;">
	<h1 style=" color:#fff;">GENERATE NODUES </h1>
	<p style="color:#fff; font-size:20px"> Enter necessary Details </p>

<form  method="post" style="size:15px; text-align:center; width:40%; height:70%; background-color:#fff; padding: 40px;">
<table align="center" cellpadding="10" >

<tr><td style="float:right;padding:15px;color:#666666;"><strong>ID:</td><td style="padding:15px;"> <input type="text" name="id" value= "<?php echo $_POST['id'] ?>" disabled style="float: right; width:230px; height:30px; content: black;"/></td>
<tr><td style=" float:right;padding:15px;color:#666666;"><strong>NAME:</td><td style="padding:15px;"> <input type="text" name="name" value= "<?php echo $_POST['name']?>" disabled style="float: right; width:230px; height:30px; content: black;"/></td>
<tr ><td style=" float:right;padding:15px;color:#666666;"><strong>ATTENDACNCE FINE:</td><td style="padding:15px;"> <input type="text" name="att_fine"  style="float: right; width:230px; height:30px; content: black;"/></td>
<tr><td style="float:right;padding:15px;color:#666666;"> <strong>FEE FINE:</td><td style="padding:15px;"><input type="text" name="fee_fine"  style="float: right; width:230px; height:30px; content: black;"/></td>
<tr><td style="float:right; padding:15px;color:#666666;"><strong>LIBRARY FINE: </td><td style="padding:15px;"><input type="text" name="lib_fine"  style="float:right; width:230px; height:30px; content:black;"/></td>
<tr><td style="float:right; padding:15px;color:#666666;"><strong>OTHER FINE:</td><td style="padding:15px;"><input type="text" name="other_fine" style="float:right; width:230px; height:30px; content:black;"/></td>

</table>
<br>
			<center>
					<button type="submit" name="btn-nodue" class="button" style="background-color:#eee;">UPDATE</button>
				</form>
</center>
</center>

</body>
</html>



<