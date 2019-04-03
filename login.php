<?php 
error_reporting(0);
require_once ('connect.php');

if(isset($_POST['login'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];
   // print_r($email);
   // print_r($password);
   //exit();

    if($email=='' && $password=='')
    {
        echo "this field cannot be blank";
    }
    else{
       
$sql = "SELECT * FROM `customer` WHERE `email`='".$email."' AND `password`='".$pass."';";
// print_r($sql);
 //  exit();
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0)
{
   // echo "Success";
    header('location: view.php');
}
else
{
    echo "failed";
}
    
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body bgcolor="lightblue">
        <form  method="post" action="login.php" align="center">
            <h2>Login</h2><br>
      <input type="text" name="email" placeholder="Email" /><br>
    <input type="password" name="password" placeholder="Password" /><br>
            
            <input type="submit" name="login" value="LOGIN"><br>
            <hr height=20 width=100% align=center color=black><br>
            <a href="index.php">No account yet? Create one</a>

            
        </form>
</body>
</html>