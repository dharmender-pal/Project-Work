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
    background-image: url("images/admin.jpg");
    background-size: 100% 100%;
    background-repeat: no-repeat;
  
}
</style>

</head>
<body>
<button class="navbutton" onclick="location.href = 'index.php'"><strong>HOME</strong></button>
<button class="navbutton" onclick="location.href = 'admin.php'" style="float:right;"><strong>LOGOUT</strong></button>


<?php 
			session_start();
			if(isset($_SESSION['username'])){
$dbc = mysqli_connect('localhost' , 'root' , '' , 'signin' );
if (!$dbc) {
    die('Connect Error: ' . mysqli_connect_errno());
}
if(isset($_SESSION['username'])){

$query="select * from login where username = '$_SESSION[username]'";
$result=mysqli_query($dbc,$query);
if($row=mysqli_fetch_array($result))
{
	?>
	<center style="  margin-top:100px; margin-bottom:100px"	>
			<h1 style="color:#eee;"> Welcome  <?php echo $_SESSION['username']; ?> !
		</h1>
		<p style="color:#eee; font-size:20px;"> Enter The ID & Name of the Student and then Begin! </p>	
<form  action="generatenodues.php" method="post" style="size:15px; text-align:center; width:40%; height:70%; background-color:#fff; padding: 40px;">
<table align="center" cellpadding="10" >
<tr><td style="float:right;padding:15px;color:#666666;">ID:</td><td style="padding:15px;"> <input type="number" name="id"  style="float: right; width:230px; height:30px; content: black;"/></td>
<tr><td style=" float:right;padding:15px;color:#666666;">NAME:</td><td style="padding:15px;"> <input type="text" name="name"  style="float: right; width:230px; height:30px; content: black;"/></td>
</table>
<br>
<br>
	
	<button type="submit" name="button" class="button" style="background-color:#eee;">GENERATE NODUES</button>
</form>
	</center>
<?php	
}
else {
	?>
				
	<script type="text/javascript" >
      
    	alert('Invalid User!!! \nContact to ADMIN ');
    	window.location.href="./index.html" ; 
   
	</script>
	<?php
}
}
else {
				?>
	<script type="text/javascript" >
      
    	alert('Invalid User!!! \nContact to ADMIN ');
    	window.location.href="./index.html" ; 
   
	</script>
	<?php
}
?>
	<?php
			}
	?>	
	</body>
	
</html>
