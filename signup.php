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
    background: url("images/terms.jpg");
    background-size: 100% 200%;
    background-repeat: no-repeat;
	margin-bottom:10%;
  
}

</style>

</head>
<body>
<button class="navbutton" onclick="location.href = 'index.php'"><strong>HOME</strong></button>
<button class="navbutton" onclick="location.href = 'signin.php'"><strong>BACK</strong></button>

<?php
session_start();
if(isset($_SESSION['username'])!="")
{
	header("Location: signin.php");
}
include_once 'register.php';

if(isset($_POST['btn-signup']))
{   $id=mysql_real_escape_string($_POST['id']);
	$name = mysql_real_escape_string($_POST['name']);
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$confirmpass=mysql_real_escape_string($_POST['confirmpass']);
	$gender=mysql_real_escape_string($_POST['gender']);
	$dob=mysql_real_escape_string($_POST['dob']);
	$fname=mysql_real_escape_string($_POST['fname']);
	$course=mysql_real_escape_string($_POST['course']);
	$branch=mysql_real_escape_string($_POST['branch']);
	$semester=mysql_real_escape_string($_POST['semester']);
	$batch=mysql_real_escape_string($_POST['batch']);
	$email=mysql_real_escape_string($_POST['email']);
	$contact=mysql_real_escape_string($_POST['contact']);
	$address=mysql_real_escape_string($_POST['address']);
	$img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
	

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["img"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

	
	$id=trim($id);
	$name = trim($name);
	$username = trim($username);
	$password = trim($password);
	$gender=trim($gender);
	$dob=trim($dob);
	$fname=trim($fname);
	$course=trim($course);
	$branch=trim($branch);
	$semester=trim($semester);
	$batch=trim($batch);
	$email=trim($email);
	$contact=trim($contact);
	$address=trim($address);
	
	// email exist or not
	$query = "SELECT id FROM login WHERE id='$id'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	
	if($count == 0){
		
		if(mysql_query("INSERT INTO login(id,name,username,password,gender,dob,fname,course,branch,semester,batch,email,contact,address,img) VALUES('$id','$name','$username','$password','$gender','$dob','$fname','$course','$branch','$semester','$batch','$email','$contact','$address','$img')"))
		{
			?>
			<script>alert('successfully registered ');
			window.location.href="./signin.php" ; 
			</script>
			
			<?php
		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('Sorry ID already taken ...');</script>
			<?php
	}
	
}
?>


<center style= "margin top: 200px;">
	<h1 style=" color:#fff;">REGISTER YOURSELF</h1>
	<p style=" color:#fff;font-size:20px;"> kindly enter your details </p>

<form  method="post" enctype="multipart/form-data" style=" size:20px; text-align: center; width:55%; height:200%; padding:30px; background-color:#f0f5f5;">
<table align="center" cellpadding="10" > 
<tr ><td style=" float:right;padding:15px;color:#666666;"><strong>ID:</td><td style="padding:15px;"> <input type="text" name="id" required style="float: right; width:230px; height:25px; content: black;"/></td>
<tr><td style=" float:right;padding:15px;color:#666666;"><strong>NAME:</td><td style="padding:15px;"><input type="text" name="name" required style="float: right; width:230px; height:25px; content: black;"/></td>
<tr><td style="float:right; padding:15px;color:#666666;"><strong>USERNAME:</td><td style="padding:15px;"><input type="text" name="username" required style="float:right; width:230px; height:25px; content:black;"/></td>
<tr><td style="float:right; padding:15px;color:#666666;"><strong>PASSWORD:</td><td style="padding:15px;"><input type="password" name="password" required style="float:right; width:230px; height:25px; content: black;"/></td>
<tr><td style="float:right;padding:15px;color:#666666;"><strong>CONFIRM PASSWORD:</td><td style="padding:15px;"><input type="password" name="confirmpass" required style="float:right; width:230px; height:25px; content: black;"/></td>
<tr><td style="float:right;padding:15px;color:#666666;"><strong>GENDER:</td><td style="color:#666666;"><input type="radio" name="gender" required style=" float:left; width:80px; height:15px; content: black;" value="Male" checked />MALE</td>
                    <tr><td ><td style="color:#666666; "  ><input type="radio" name="gender" required style="float:left; width:80px; height:15px; content: black;" value="Female"/>FEMALE</td></td></tr>
<tr><td style="float:right; padding:15px;color:#666666;"><strong>DATE OF BIRTH:</td><td ><input type="date" name="dob" required style="float: right; width:230px; height:25px;content: black;"/></td>
<tr><td style="float:right; padding:15px;color:#666666;"><strong>FATHER'S NAME:</td><td style="padding:15px;"><input type="text" name="fname" required style="float: right;width:230px; height:25px; content: black;"/></td>		
<tr><td style="float:right; padding:15px;color:#666666;"><strong>COURSE:</td><td style="padding:15px;"><input type="text" name="course" required style="float: right;width:230px; height:25px; content: black;"/></td>	
<tr><td style="float:right; padding:15px;color:#666666;"><strong>BRANCH:</td><td style="padding:15px;"><select type="text" name="branch" required style="float: right;width:230px; height:25px; content: black;">
							<option value="CSE">CSE</option>
							<option value="MEC">MEC</option>
							<option value="ECE">ECE</option>
							<option value="EEE">EEE</option>
							<option value="CE">CE</option> </select></td>	
<tr><td style="float:right; padding:15px;color:#666666;"><strong>SEMESTER:</td><td style="padding:15px;"><input type="number" name="semester" required style="float: right;width:230px; height:25px; content: black;"/></td>
<tr><td style="float:right; padding:15px;color:#666666;"><strong>BATCH:</td><td style="padding:15px;"><input type="year" name="batch" required style="float: right;width:230px; height:25px; content: black;"/></td>	
<tr><td style="float:right;padding:15px;color:#666666;"><strong>E-MAIL ID:</td><td style="padding:15px;"><input type="text" name="email" required style="float:right;width:230px; height:25px; content: black;"/></td>
<tr><td style="float:right; padding:15px;color:#666666;"><strong>CONTACT:</td><td style="padding:15px;"><input type="text" name="contact" required style="float: right;width:230px; height:25px; content: black;"/></td>	
<tr><td style="float:right; padding:15px;color:#666666;"><strong>ADDRESS:</td><td style="padding:15px;"><textarea name="address" rows="3" cols="30" required style="float:right;width:230px; height:35px; content: black;"> </textarea></td>
<tr><td style="float right; padding:15px;color:#666666;"><strong>UPLOAD PROFILE PIC: </td><td>
<input type="file" name="img" id="img"></td><br><td><input type="submit" value="Upload Image" name="submit"></td>
							
</table>
<br>
			<center>
			<input type="checkbox" name="check" value="agree" style="padding:15px; width:80px; height:15px;" required> I agree to <a href="agreement.html"><u>terms and conditions</u></a><br><br>
					<button type="submit" name="btn-signup" class="button">Sign Me Up</button> <br>
					<br>
				</form> 
</center>
</center>

</body>
</html>