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
    background-image: url("images/nodue.jpg");
    background-size: 100% 100%;
    background-repeat: no-repeat;
	
  
}
</style>
</head>

<body>
<button class="navbutton" onclick="location.href = 'index.php'"><strong>HOME</strong></button>
<button class="navbutton" onclick="window.print()" style=" text-align:left;width:auto;  float:right;"><strong>PRINT</strong></button> 
<button class="navbutton" onClick="window.print()" style="margin-top:10px; float:right; margin-right: -50px; background-image:url('images/print.png'); background-repeat:no-repeat; background-size:70% 100%;"></button>

<?php
session_start(); 
$dbc = mysqli_connect('localhost' , 'root' , '' , 'signin' );
if (!$dbc) {
    die('Connect Error: ' . mysqli_connect_errno());
}
if(isset($_SESSION['username'])) {
$query="select * from login where username = '$_SESSION[username]' and password = '$_SESSION[password]' ";
$result=mysqli_query($dbc,$query);
if($row=mysqli_fetch_array($result)) {
	?>
	<center style="  margin-top:50px; margin-bottom:100px" >
			<h1 style="color:#eee;"> Welcome  <?php echo $row['name']; ?> !
		</h1>
		<p style="color:#eee; font-size:20px;"> Here's You Nodue Form. You can Print it and Pay Cash At Accountant's Office or Click Pay to Proceed for Online Payment</p>	
		<form  action="https://www.paypal.com/cgi-bin/webscr" method="post" style="size:20px; text-align: left; width: 70%; background-color: #fff; padding: 30px;" >
	<center>
			<table align="center" cellpadding="0">
			<tr><td style="float: right;width: 200px;padding:15px;color:#666666;font-size:18px;"><strong>ID:</td>
			<td><input type="number" name="id" value="<?php echo $row['id']; ?>" disabled style=" float:left; background-color:#b0bfba;width:230px; height:30px; color:black;" /></td>
	<tr><td style="float: right;width: 200px; padding:15px;color:#666666; font-size:18px;" ><strong>NAME :</td>
			<td><input type="text" name="name" value="<?php echo $row['name']; ?>" disabled style=" background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>
	<tr><td style="float: right;width: 200px;padding:15px;color:#666666;font-size:18px;"  ><strong>COURSE : </td>
			<td><input type="text" name="course" value="<?php echo $row['course']; ?>" disabled style=" background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>
           
			<tr><td style="float: right;width: 200px;padding:15px;color:#666666;font-size:18px;"  ><strong>BRANCH :</td>
			<td><input type="text" name="branch" value="<?php echo $row['branch']; ?>" disabled style=" background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>

			<tr><td style="float: right;width: 200px;padding:15px;color:#666666;font-size:18px;"  ><strong>SEMESTER : </td>
		    <td><input type="text" name="semester" value="<?php echo $row['semester']; ?>" disabled style=" background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>
	
	<tr><td style="float: right;width: 200px;padding:15px;color:#666666;font-size:18px;"  ><strong>ATTENDANCE FINE: </td>
			<td><input type="text" name="course" value="<?php echo $row['att_fine']; ?>" disabled style=" background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>
           
			<tr><td style="float: right;width: 200px;padding:15px;color:#666666;font-size:18px;"  ><strong>FEE FINE :</td>
			<td><input type="text" name="branch" value="<?php echo $row['fee_fine']; ?>" disabled style=" background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>

			<tr><td style="float: right;width: 200px;padding:15px;color:#666666;font-size:18px;"  ><strong>LIBRARY FINE: </td>
		    <td><input type="text" name="semester" value="<?php echo $row['lib_fine']; ?>" disabled style=" background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>
<tr><td style="float: right;width: 200px;padding:15px;color:#666666;font-size:18px;"  ><strong>OTHER FINE: </td>
		    <td><input type="text" name="semester" value="<?php echo $row['other_fine']; ?>" disabled style=" background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>
			<?php
			do{
				$total_fine = $row['att_fine']+$row['fee_fine']+$row['lib_fine'] +$row['other_fine'];
				}while($row=mysqli_fetch_array($result));?> 
			<tr><td style="float: right;width: 200px;padding:15px;color:#666666;font-size:18px;"  ><strong>TOTAL FINE: </td>
		    <td><input type="text" name="semester" value="<?php echo $total_fine ?>" disabled style=" background-color:#b0bfba;width:230px; height:30px;color:black;" /></td>
			</table><br><br>
			 <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="deepali434-facilitator@gmail.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="TOTAL FINE" value="<?php echo $total_fine ?>">
  <input type="hidden" name="amount" value="<?php echo $total_fine ?>">
  <input type="hidden" name="currency_code" value="USD">


			
			</form>
		
			<button class="button" onClick=location.href="paypal.png">PAY NOW </button>


			<?php	
}
else {
	?>
	<script type="text/javascript" >
      
    	alert('Password required.\n To enter password, click OK');
    	window.location.href="./check.php" ; 
   
	</script>
	<?php
}
}
else{
	?>
	<script type="text/javascript" >
      
    	alert('Sorry, you are not login.\n To login, click OK');
    	window.location.href="./index.php" ; 
   
	</script>
	<?php
}
?>
</body>

</html>