<?php 
require_once('connect.php');
error_reporting(0);
if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$get_contact = "SELECT * from `customer` where id = '$id'";
			$sql_get_contact= mysqli_query($conn,$get_contact);
			//$sql_get_contact =$conn->query($get_contact);
			$row = mysqli_fetch_assoc($sql_get_contact);
		}
if (isset($_POST['submit'])) {

	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
		$age = $_POST['age'];
	$gender = $_POST['gender'];
	if ($fname=='' || $lname=='' || $age=='' || $email=='' || $password=='' || $gender=='') {
		echo "Please fill all field";
	}
else{
		$updateSQL = "UPDATE `customer` SET 
		`fname` = '".$_POST['fname']."', 
		`lname` = '".$_POST['lname']."', 
		`email` = '".$_POST['email']."', 
		`password` = '".$_POST['password']."',
		`gender` = '".$_POST['gender']."',
		`age` = '".$_POST['age']."' WHERE id = $id"; 
		$res = mysqli_query($conn,$updateSQL);
		if($res){
			echo "Record updated";
		}else{
			echo "Record could not updated, please try again.";
		}
	}
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Form</title>
</head>
<body bgcolor="lightblue">
	<form method="post" action="update.php">
	<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
	<a href="index.php">Create</a> | <a href="view.php">List</a> <br>
		<h2>Update User Profile</h2><br>
		<hr height=20 width=100% align=center color=black><br>
	 <input type="text" name="fname"  placeholder="First Name" /><br>
	 <input type="text" name="lname"  placeholder="Last Name"/><br>
	 <input type="text" name="email" placeholder="Email"/><br>
	 <input type="password" name="password" placeholder="Password"/><br>
	 <input type="number" name="age" placeholder="Age"  /><br>
    Gender <input type="radio" name="gender" value="male" checked> Male <input type="radio" name="gender" value="female"> Female<br>
			<input type="submit"  value="Update"  name="submit"/>
		</form>
</body>
</html