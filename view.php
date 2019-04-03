<?php require_once ('connect.php'); 

error_reporting(0);	
session_start();

?>
	
<!DOCTYPE html>
<html>
<head>

	<title>View Form</title>
</head>
<body bgcolor="lightblue">
<a href="index.php"> Create </a> | <a href="login.php">LogIn</a>

	<h2>View</h2>
	<hr height=20 width=100% align=center color=black><br>
		<table border="1" > 
		<thead> 
			<tr> 
				<th>#</th> 
				<th>Full Name</th> 
				<th>E-Mail</th> 
				<th>Age</th> 
				<th>Gender</th> 
				<th colspan="2">Extras</th>
			</tr> 
		</thead>  
		<?php 
	$Readsql = "SELECT * FROM `customer`";
	$res = mysqli_query($conn, $Readsql);

		while($r = mysqli_fetch_assoc($res)){
		?>
		<tbody>
			<tr> 
				<th><?php echo $r['id']; ?></th> 
				<td><?php echo $r['fname'] . " " . $r['lname']; ?></td> 
				<td><?php echo $r['email']; ?></td> 
				<td><?php echo $r['age']; ?></td> 
				<td><?php echo $r['gender']; ?></td> 
				<td><a href="update.php?id=<?php echo $r['id']; ?>">Update</a></td>
				<td><a href="delete.php?id=<?php echo $r['id']; ?>">Delete</a></td>	
			</tr>
		</tbody>
		<?php } ?>
		
</table>
<a href="logout.php"><h3>LOGOUT</h3></a>
</body>
</html>
