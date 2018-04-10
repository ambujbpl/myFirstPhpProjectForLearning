<?php
include("config/connection.php");
session_start();
?>
<html>
<head>
<title>Login Greenticks</title>
</head>
<body>
<form action="" method="post">
UserName:  <input type="text" name="uname"><br><br><br>
Password:  <input type="text" name="pass"><br><br><br>
 <button type="submit" name="submit">Submit</button>
</form>

<?php
if(isset($_POST["submit"])){
	echo "Bottom";
	$user = $_POST['uname'];
	$pass = $_POST['pass'];
//echo $user ," ", $pass; 
 $query = "select * from employee where Username='$user' && Password='$pass'";
 $data = mysqli_query($connection,$query);
 $total = mysqli_num_rows($data);
 if($total == 1){
	$_SESSION['un'] = $user; 
	header('location:home.php');
 }else{
	 echo "Login Fail! Please check credential!";
 }
}
?>
</body>
</html>