<html>
<head>
<title>DEQUEUE</title>
<link rel="stylesheet" href="assets/css/form.css" />
<style>


body {
    background: url("images/terms.jpg");
    background-size: 100% 100%;
    background-repeat: no-repeat;
  
}

</style>

<link rel="icon" 
     type="image/png" 
     href="images/logo.png"> </link>

</head>

<body>
<button class="navbutton" onclick="location.href = 'index.php'"><strong>HOME</strong></button>

					<?php 
			session_start();
			session_destroy();
			$_SESSION=array();
		?>
		<center style="  margin-top: 100px;">
		
						<h1 style=" color:#fff;"> <strong>LOGIN</strong> </h1>
					
         <p style="color:#fff;font-size:20px;" > Enter your Username and Password to Begin</p>
		
			<form   action="login.php" method="post" style=" size:20px; text-align: center; width:35%; height:55%; background-color:#f0f5f5;" >
				<br>
				<br>
				<table align="center" cellpadding="10">
				
				<tr><td style=" float:right;padding:15px;color:#666666;"><strong>USERNAME: </td> <td> <input type="text" name="username"  required style="float:right; height:30px; width:200px; color:black;" /></td>
				<tr><td style=" float:right;padding:15px;color:#666666;"><strong>PASSWORD:</td> <td><input type="password" name="password" required style="float:right; height:30px; width:200px; color:black;" /></td>
				<br><br>
			
			</table>
			<a href="forgot.php" style=" text-decoration:none;font-size:15px; margin-left:180px;"><strong>Forgot Password? </a>
			<a href="signup.php" style="text-decoration:none;font-size:15px; margin-left:205px;">New user? SIGN UP! </a>
			<br><br>
			<center>
			          
					<input type="submit" name="check"  class="button" value="LOGIN" />
				
				</form>
		</center>
		</center>
	
	</body>
		</html>