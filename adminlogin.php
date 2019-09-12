<?php
	session_start(); 
	$dbc = mysqli_connect('localhost' , 'root' , '' , 'signin' );
	if (!$dbc) {
	    die('Connect Error: ' . mysqli_connect_errno());
	}
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query="select * from login where username = '$username' and password = '$password'";
	
	$result=mysqli_query($dbc,$query);
	if($row=mysqli_fetch_array($result))
	{
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		
			?>
			
			<script type="text/javascript" >
		      
		    	
		   		window.location.href="./adminpanel.php" ; 
			</script>
			<?php
		}
		else {
			?>
			<script type="text/javascript" >
		      
		    		alert('Incorrect username or Password')
		   		window.location.href="./admin.php" ; 
			</script>
			<?php
		}
		
		?>
	<script type="text/javascript" >
      
    	alert('Invalid Username or Password!!! \nContact to ADMIN ');
    	window.location.href="./admin.php" ; 
   
	</script>
	