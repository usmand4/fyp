<?php
require_once ('connect.php');
error_reporting(0);
session_start();
if(isset($_POST['submit'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	//print_r($age);
	//exit();
	if($fname=='' || $lname=='' || $email=='' || $password=='' || $age=='' || $gender==''){
		echo "please all fields are empty";
	}
	else{

$CreateSql = "INSERT INTO `customer` (fname, lname, email, password, age, gender) VALUES ('".$fname."', '".$lname."', '".$email."', '".$password."', '".$age."','".$gender."')";

$res = mysqli_query($conn, $CreateSql) or die(mysqli_error($conn));
//print_r($res);
//exit();

	if($res){
			//echo  "Successfully inserted data, Insert New data.";
		$_SESSION['flag'] = 1;
			header("location: session.php");
		
	}else{
		echo  "Data not inserted, please try again later.";
	}
}}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registeration Form</title>
</head>
<body  bgcolor="lightblue">
<form method="post" action="index.php" align="center">
		<h2>Registeration</h2><br>
	 <input type="text" name="fname"  placeholder="First Name"  /><br>
	 <input type="text" name="lname"  placeholder="Last Name" /><br>
	 <input type="text" name="email" placeholder="Email" /><br>
	 <input type="password" name="password" placeholder="Password" /><br>
	 <input type="number" name="age" placeholder="Age" /><br>
    Gender <input type="radio" name="gender" value="male" checked> Male <input type="radio" name="gender" value="female"> Female<br>
	<input type="submit"  value="Register" name="submit" /><br>
	<hr height=20 width=100% align=center color=black><br>
	<a href="login.php">Already a Member? Login</a>

		</form>
</body>
</html>