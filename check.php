<html>
<head>
<title>DEQUEUE</title>
	<link rel="stylesheet" href="assets/css/form.css" />
<link rel="icon" 
     type="image/png" 
     href="images/logo.png"> </link>
<style>
body {
    background: url("images/update.jpg");
    background-size: 100% 200%;
    background-repeat: no-repeat;
	margin-bottom:10%;
  
}

</style>
</head>
<body>
<button class="navbutton" onclick="location.href = 'index.php'"><strong>HOME</strong></button>
<button class="navbutton" onclick="location.href = 'signin.php'" style="float:right;"><strong>LOGOUT</strong></button>
<button class="navbutton" onclick="location.href = 'nodues.php' " style="float:right;"  onclick="location.href = 'index.php'"><strong> NODUES FORM</strong></button>
<button class="navbutton" onclick="location.href = 'updateprofile.php'"  style="float:right;"><strong>UPDATE PROFILE</strong></button>


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
	
			<center style="margin-top:70px;" >
		<h1 style="color:#eee" ><?php echo "Welcome $_SESSION[name].";?> 
	<?php echo" <br>Your Profile"; ?> </h1>
		<form action="nodues.php" method="post" style="size:20px; text-align: center; width: 70%; background-color: #f0f5f5; padding: 30px;" >
		<div  id="myDiv">
			<?php echo '<img src="data:img/jpg;base64,'.base64_encode( $row['img'] ).'" />' ;  ?>
			</div>
			<center>
			
			<table align="center" cellpadding="0">
			<tr><td style="float: right; padding:15px;color:#666666;font-size:18px;"><strong>ID:</td>
			<td><input type="text" name="id" value="<?php echo $row['id']; ?>" disabled style="  background-color:#b0bfba;width:230px; height:30px; color:black;" /></td>
			
			<tr><td style="float: right;; padding:15px;color:#666666; font-size:18px;" ><strong>NAME :</td>
			<td><input type="text" name="name" value="<?php echo $row['name']; ?>" disabled style="  background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>
			
			<tr><td style="float: right; padding:15px;color:#666666;font-size:18px;"  ><strong>GENDER:</td>
			<td><input type="text" name="gender" value="<?php echo $row['gender']; ?>" disabled style=" background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>
			
			<tr><td style="float: right;padding:15px;color:#666666;font-size:18px;"  ><strong>DATE OF BIRTH :</td>
			<td><input type="text" name="dob" value="<?php echo $row['dob']; ?>" disabled style="  background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>
			
			<tr><td style="float: right ;padding:15px;color:#666666;font-size:18px;"  ><strong>FATHER'S NAME : </td>
			<td><input type="text" name="fname" value="<?php echo $row['fname']; ?>" disabled style="  background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>
              
			<tr><td style="float: right;padding:15px;color:#666666;font-size:18px;"  ><strong>COURSE : </td>
			<td><input type="text" name="course" value="<?php echo $row['course']; ?>" disabled style="  background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>
           
			<tr><td style="float: right;padding:15px;color:#666666;font-size:18px;"  ><strong>BRANCH :</td>
			<td><input type="text" name="branch" value="<?php echo $row['branch']; ?>" disabled style=" background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>

			<tr><td style="float: right;padding:15px;color:#666666;font-size:18px;"  ><strong>SEMESTER : </td>
		    <td><input type="text" name="semester" value="<?php echo $row['semester']; ?>" disabled style="  background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>

            <tr><td style="float: right;padding:15px;color:#666666;font-size:18px;"  ><strong>BATCH : </td>
			<td><input type="text" name="batch" value="<?php echo $row['batch']; ?>" disabled style="  background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>
			
			<tr><td style="float: right;padding:15px;color:#666666;font-size:18px;"  ><strong>CONTACT : </td>
			<td><input type="text" name="contact" value="<?php echo $row['contact']; ?>" disabled style="  background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>
			
			<tr><td style="float: right;padding:15px;color:#666666;font-size:18px;"  ><strong>E-MAIL ID : </td>
			<td><input type="text" name="email" value="<?php echo $row['email']; ?>" disabled style=" background-color:#b0bfba;width:330px; height:30px;color:black;" /></td>
			
			<tr><td style="float: right;padding:15px;color:#666666;font-size:18px;"  ><strong>ADDRESS : </td>
			<td><input type="text" name="address" value="<?php echo $row['address']; ?>" disabled style=" background-color:#b0bfba;width:400px; height:70px;color:black;" /></td>
			
		
			</table>

	<center>
						
					 <br>
<center>
						
					</center>
	</form>
		</center>
		</center>
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
