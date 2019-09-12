   
		<?php 
session_start(); 
if(isset($_SESSION['username'])){
	$dbc = mysqli_connect('localhost' , 'root' , '' , 'signin' );
	if (!$dbc) {
	    die('Connect Error: ' . mysqli_connect_errno());
	}
	$flag = 0 ;
	if(isset($_POST['btn-update'])){
		$oldPass = $_POST['oldPass'];
		$newPass = $_POST['newPass'];
		$confirmPass = $_POST['confirmPass'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];
		$query="select * from login where username = '$_SESSION[username]' and password = '$oldPass'";
		$result=mysqli_query($dbc,$query);
		
		if($row=mysqli_fetch_array($result)){
			if(strcmp($newPass, $confirmPass))
				$flag = 2;
			else {
				$query=" UPDATE login SET password='$newPass', contact='$contact', address='$address', updated= 1  WHERE username='$_SESSION[username]' and password='$_SESSION[password]' ";
				$result=mysqli_query($dbc,$query);
				$_SESSION['password']=$newPass;
				$url='http://'.$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']).'/choice.php';
				header("");
			}
		}
		else {
			$flag = 1 ;
		}
	}
	$query="select * from login where username = '$_SESSION[username]' and password = '$_SESSION[password]'";
	$result=mysqli_query($dbc,$query);
	if($row=mysqli_fetch_array($result)){
	?>
		<center>
		<h2 class="section-heading"><?php echo "Welcome $_SESSION[name].";?> 
		<h2 >Update your profile</h2>
		<form  action="new.php" method="post" style="size:15px; text-align:center; width:50%;background-color:#b0bfba; padding: 50px;">
<table align="center" cellpadding="10" >
<tr><td style="float:right;padding:15px;">ID:</td><td style="padding:15px;"> <input type="number" name="id"  style="float: right; width:230px; height:25px; content: black;"/></td>
<tr><td style=" float:right;padding:15px;">USERNAME:</td><td style="padding:15px;"> <input type="text" name="username"  style="float: right; width:230px; height:25px; content: black;"/></td>
<tr ><td style=" float:right;padding:15px;">OLD PASSWORD:</td><td style="padding:15px;"> <input type="password" name="oldPass"  style="float: right; width:230px; height:25px; content: black;"/></td>
<?php 
				if($flag == 1) {
					echo "<br><br>
						<span style='color: red; font-size: 13px;'>
						Sorry, you have entered wrong password. 
						<br>Please contact your ADMIN if you forget your IC NO. or PASSWORD.</span>";
				}
			?>
<tr><td style=" float:right;padding:15px;">NEW PASSWORD:</td><td style="padding:15px;"><input type="password" name="newPass"  style="float: right; width:230px; height:25px; content: black;"/></td>
<tr><td style="float:right; padding:15px;">CONFIRM PASSWORD:</td><td style="padding:15px;"><input type="password" name="confirmPass"  style="float:right; width:230px; height:25px; content:black;"/></td>
<?php 
				if($flag == 2) {
					echo "<br><br>
						<span style='color: red; font-size: 13px;'>
						Sorry, new password and confirm password not match. 
						</span>";
				}
			?>
<tr><td style="float:right; padding:15px;">SEMESTER:</td><td style="padding:15px;"><input type="number" name="semester" style="float:right; width:230px; height:25px; content:black;"/></td>
<tr><td style="float:right; padding:15px;">EMAIL-ID:</td><td style="padding:15px;"><input type="text" name="email"  style="float:right; width:230px; height:25px; content:black;"/></td>
<tr><td style="float:right; padding:15px;">CONTACT:</td><td style="padding:15px;"><input type="number" name="contact" style="float:right; width:230px; height:25px; content:black;"/></td>
<tr><td style="float:right; padding:15px;">ADDRESS:</td><td style="padding:15px;"><input type="text" name="address"  style="float:right; width:230px; height:25px; content:black;"/></td>

</table>
<br>
			<center>
					<button type="submit" name="btn-update">UPDATE</button>
				</form>
</center>
</center>

<?php
	}
}
else {
	?>
	<span style="color: red; font-size: 13px; ">
		<br>
		Sorry, your session has expired.
		<br>
		Please login first.
	</span>
	<a href="./index.html">Go To Home</a>
	<?php
}
?>
</body>
</html>
</body>
</html>
