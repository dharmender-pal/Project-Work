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
    background-image: url("images/update.jpg");
    background-size: 100% 100%;
    background-repeat: no-repeat;
  
}
</style>

</head>
<body>
<button class="navbutton" onclick="location.href = 'check.php'"><strong>BACK</strong></button>
 <?php 
session_start();
if(isset($_SESSION['username'])!="");
include_once 'register.php';

if(isset($_POST['btn-update']))
{   
    $id=$_POST['id'];
	$username=$_POST['username'];
    $oldPass = $_POST['oldPass'];
	$newPass = $_POST['newPass'];
	$confirmPass = $_POST['confirmPass'];
	$semester=$_POST['semester'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	
	$id=trim($id);
	$username=trim($username);
	$oldPass=trim($oldPass);
	$newPass=trim($newPass);
	$confirmPass=trim($confirmPass);
	$semester=trim($semester);
	$email=trim($email);
	$contact=trim($contact);
	$address=trim($address);
	
	// email exist or not
	$query = "SELECT * FROM login WHERE username='$username', password='$oldPass' ";
	$result = mysql_query($query);
	
	$count = $result->mysql_num_rows; // if email not found then register
	
	if($count == 0){
	
		if(mysql_query("UPDATE login SET password='$newPass',semester='$semester',email='$email',contact='$contact',address='$address', updated= 1  WHERE username='$username' and password='$oldPass'"))
		{
			?>
			<script>alert('successfully updated ');
			window.location.href="./check.php" ; </script>
			
			<?php
		}
		else
		{
			?>
			<script>alert('error while updating your PROFILE');</script>
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
	<h1 style=" color:#fff;">UPDATE YOUR PROFILE</h1>
	<p style="color:#fff; font-size:20px"> Kindly make necessary changes</p>

<form  method="post" style="size:15px; text-align:center; width:40%; height:70%; background-color:#f0f5f5; padding: 40px;">
<table align="center" cellpadding="10" >
<tr><td style="float:right;padding:15px;color:#666666;"><strong>ID:</td><td style="padding:15px;"> <input type="number" name="id" required style="float: right; width:230px; height:30px; content: black;"/></td>
<tr><td style=" float:right;padding:15px;color:#666666;"><strong>USERNAME:</td><td style="padding:15px;"> <input type="text" name="username"   style="float: right; width:230px; height:30px; content: black;"/></td>
<tr ><td style=" float:right;padding:15px;color:#666666;"><strong>OLD PASSWORD:</td><td style="padding:15px;"> <input type="password" name="oldPass"  style="float: right; width:230px; height:30px; content: black;"/></td>
<tr><td style=" float:right;padding:15px;color:#666666;"><strong>NEW PASSWORD:</td><td style="padding:15px;"><input type="password" name="newPass"  style="float: right; width:230px; height:30px; content: black;"/></td>
<tr><td style="float:right; padding:15px;color:#666666;"><strong>CONFIRM PASSWORD:</td><td style="padding:15px;"><input type="password" name="confirmPass"  style="float:right; width:230px; height:30px; content:black;"/></td>
<tr><td style="float:right; padding:15px;color:#666666;"><strong>SEMESTER:</td><td style="padding:15px;"><input type="number" name="semester" style="float:right; width:230px; height:30px; content:black;"/></td>
<tr><td style="float:right; padding:15px;color:#666666;"><strong>EMAIL-ID:</td><td style="padding:15px;"><input type="text" name="email"  style="float:right; width:230px; height:30px; content:black;"/></td>
<tr><td style="float:right; padding:15px;color:#666666;"><strong>CONTACT:</td><td style="padding:15px;"><input type="text" name="contact" style="float:right; width:230px; height:30px; content:black;"/></td>
<tr><td style="float:right; padding:15px;color:#666666;"><strong>ADDRESS:</td><td style="padding:15px;"><input type="text" name="address"  style="float:right; width:230px; height:30px; content:black;"/></td>

</table>
<br>
			<center>
					<button type="submit" name="btn-update" class="button">UPDATE</button>
				</form>
</center>
</center>

</body>
</html>