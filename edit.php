<?php
include('./config/connection.php');
error_reporting(0);
// define variables and set to empty values
//$name = $email = $role = "";
//$id = $_GET['id'];
//$name = $_GET['na'];
//$email = $_GET['em'];
//$role = $_GET['rl'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["id"])) {
    $idErr = "ID is required";
  } else if (!preg_match("/^[0-9]*$/",$_POST["id"])) {
	$nameErr = "Only number allowed"; 
  } else {
    $name = test_input($_POST["id"]);
  }
  
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else if (!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) {
	$nameErr = "Only letters and white space allowed"; 
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
	$emailErr = "Invalid email format"; 
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["role"])) {
    $roleErr = "Role is required";
  } else if (!preg_match("/^[a-zA-Z ]*$/",$_POST["role"])) {
	$roleErr = "Only letters and white space allowed"; 
  } else {
    $role = test_input($_POST["role"]);
  }    
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<html>
<body>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Id: <input type="number" name="id" value="<?php echo $_GET['id']; ?>"><br>
<span class="error">* <?php echo $idErr;?></span>
  <br><br>
Name: <input type="text" name="name" value="<?php echo $_GET['na']; ?>"><br>
<span class="error">* <?php echo $nameErr;?></span>
  <br><br>
E-mail: <input type="text" name="email" value="<?php echo $_GET['em']; ?>"><br>
<span class="error">* <?php echo $emailErr;?></span>
  <br><br>
Role: <input type="text" name="role" value="<?php echo $_GET['rl']; ?>"><br>
<span class="error">* <?php echo $roleErr;?></span>
  <br><br>
Image: <input type="file" name="uploadfile" value=""/><br>
<img src="<?php echo $_GET['Im']; ?>" width='100' height='100'/>  
<input type="submit" name="submit" value="update">
</form>
<?php
if($_POST["submit"])
{
$id = $_POST["id"];
$na = $_POST["name"];
$em = $_POST["email"];
$rl = $_POST["role"];
//print_r($_FILES["uploadfile"]);
$filename = $_FILES["uploadfile"]["name"];
$folder = "img/".$filename;
echo $folder;
$tempfilename = $_FILES["uploadfile"]['tmp_name'];
move_uploaded_file($tempfilename,$folder);
if($id != "" && $na != "" && $em != "" && $rl != "" && $folder !="")
{
	$query = "UPDATE employee SET Name = '$na', Email = '$em', Role = '$rl', Image = '$folder' WHERE Id = '$id'";
	$data = mysqli_query($connection,$query);
		if($data)
		{
			echo "<font color='green'>Data insert successfully in Database   ";
			echo "<a href='view.php'>GO bach to view data table";
		}
		else
		{
			echo "<font color='red'>Record Not UPDATED!   ";
			echo "<a href='view.php'>GO bach to view data table";
		}
}
}
else 
{
	echo "Click update button to save    ";
	echo "<a href='view.php'>GO bach to view data table";
}
?>
</body>
</html>