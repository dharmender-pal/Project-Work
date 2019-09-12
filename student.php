<html>
<head>
<title>DEQUEUE</title>
<style>
a { text-decoration: none; color:#334d4d; }
a:visited { text-decoration: none; }
a:hover { text-decoration: none; }
a:focus { text-decoration: underline; }
a:hover, a:active { text-decoration: none; }

body {
    background: url("images/pic04.jpg");
    background-size: 100% 100%;
    background-repeat: no-repeat;
  
}

.button {
    background-color: #b3cccc;
    border: 2px solid #555555;
    color: black;
    padding: 10px 50px;
    text-align: left;
    font-size: 16px;
    margin: 10px 2px;
    cursor: pointer;

	}
	
	input[type=text] {
	border: 1px solid #b3b3b3;
    border-radius: 4px;
	font-family: "Courier New", monospace;
	font-size:18px;
	text-color:#b3b3b3;
	}
	input[type=password] {
		 border: 1px solid #b3b3b3;
    border-radius: 4px;
	
	}
</style>
<link rel="icon" 
     type="image/png" 
     href="images/logo.png"> </link>

</head>

<body>


					<?php 
			session_start();
			session_destroy();
			$_SESSION=array();
		?>
		<center style="  margin-top: 100px;">
		
						<h1 style=" color:#fff;"> <strong>LOGIN</strong> </h1>
					
         <p style="color:#fff;font-size:20px;" >Kindly Enter your Username and Password to Begin</p>
		
			<form   action="login.php" method="post" style=" size:20px; text-align: center; width:35%; height:55%; background-color:#f0f5f5;" >
				<br>
				<br>
				<table align="center" cellpadding="10">
				
				<tr><td><strong>USERNAME: </td> <td> <input type="text" name="username"  required style="float:right; height:30px; width:200px; color:black;" /></td>
				<tr><td><strong>PASSWORD:</td> <td><input type="password" name="password" required style="float:right; height:30px; width:200px; color:black;" /></td>
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