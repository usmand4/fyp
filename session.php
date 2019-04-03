<?php

session_start();
 if ($_SESSION['flag']==1) {
 	# code...
 	//echo "here is my details....";
 	header("location: view.php");

 }else{

 	header("location:index.php");
 }



?>
