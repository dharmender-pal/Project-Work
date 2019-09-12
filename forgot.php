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
    background-image: url("images/pic04.jpg");
    background-size: 100% 100%;
    background-repeat: no-repeat;
  
}
</style>

</head>
<body>
<button class="navbutton" onclick="location.href = 'signin.php'"><strong>BACK</strong></button>
<?php
session_start();
if(isset($_SESSION['username'])!="")
{
	header("Location: index.php");
}
include_once 'register.php';

if(isset($_POST['btn-update']))
{   $username=mysql_real_escape_string($_POST['username']);
    $oldPass =mysql_real_escape_string($_POST['oldPass']);
	$newPass =mysql_real_escape_string($_POST['newPass']);
	$confirmPass =mysql_real_escape_string($_POST['confirmPass']);
	
	
	$username=trim($username);
	$oldPass=trim($oldPass);
	$newPass=trim($newPass);
	$confirmPass=trim($confirmPass);
	
	// email exist or not
	$query = "SELECT username FROM login WHERE username='$username', password='$oldPass'  ";
	$result = mysql_query($query);
	$count = $result->mysql_num_rows; // if email not found then register
	if($count==0){
	if($newPass==$confirmPass )
		if(mysql_query("UPDATE login SET password='$newPass',updated=1  WHERE username='$username'"))
		{
			?>
			<script>alert('successfully updated ');
			window.location.href="./signin.php" ; </script>
			<?php
		}
		else
		{
			?>
			<script>alert('error while updating your Password');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('Sorry Passowrd mismatch');</script>
			<?php
	}
	
}
?>
<center style= "margin-top:70px;">
	<h1 style=" color:#fff;">CHANGE YOUR PASSWORD</h1>
	<p style="color:#fff; font-size:20px;"> Kindly enter the password of your Choice </p>

<form  method="post" style="size:15px; text-align:center;  margin-bottom:50px; width:40%; height:70%; background-color:#f0f5f5;"><br><br>
<table align="center" cellpadding="10" > 
<tr><td style=" float:right;padding:15px;color:#666666;"><strong>USERNAME:</td><td style="padding:15px;"> <input type="text" name="username" required style="float: right; height:30px; width:200px; content: black;"/></td>
<tr ><td style=" float:right;padding:15px;color:#666666;""><strong>OLD PASSWORD:</td><td style="padding:15px;"> <input type="password" name="oldPass" required style="float: right; height:30px; width:200px; content: black;"/></td>
<tr><td style=" float:right;padding:15px;color:#666666;""><strong>NEW PASSWORD:</td><td style="padding:15px;"><input type="password" name="newPass" required style="float: right; height:30px; width:200px; content: black;"/></td>
<tr><td style="float:right; padding:15px;color:#666666;""><strong>CONFIRM PASSWORD:</td><td style="padding:15px;"><input type="password" name="confirmPass" required style="float:right; height:30px; width:200px; content:black;"/></td>
</table>
<br>
			<center>
					<button type="submit" name="btn-update" class="button">UPDATE</button>
					<br><br>
				</form>
</center>
</center>

</body>
</html>