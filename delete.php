<?php 
require_once('connect.php');
if(isset($_GET['id']) && !empty($_GET['id'])){
	$id = $_GET['id'];
	$DelSql = "DELETE FROM `customer` WHERE id=$id";
	$res = mysqli_query($conn, $DelSql);
	if($res){
		header('location: view.php');
		echo "Recorde Deleted";
	}else{
		echo "Failed to delete";
}
}
?>