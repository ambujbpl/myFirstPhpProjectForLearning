<?php
include('./config/connection.php');
error_reporting(0);
// define variables and set to empty values
$name = $email = $role = "";

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
Id: <input type="number" name="id"><br>
<span class="error">* <?php echo $idErr;?></span>
  <br><br>
Name: <input type="text" name="name"><br>
<span class="error">* <?php echo $nameErr;?></span>
  <br><br>
E-mail: <input type="text" name="email"><br>
<span class="error">* <?php echo $emailErr;?></span>
  <br><br>
Role: <input type="text" name="role"><br>
<span class="error">* <?php echo $roleErr;?></span>
  <br><br>
Image: <input type="file" name="uploadfile" value=""/><br>

<input type="submit" name="submit" value="submit">
</form>
<?php
echo "<h2>Your Input:</h2>";
echo $id;
echo "<br>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $role;
echo "<br>";
if($_POST["submit"])
{
$id = $_POST["id"];
$na = $_POST["name"];
$em = $_POST["email"];
$rl = $_POST["role"];
//print_r($_FILES["uploadfile"]);
$filename = $_FILES["uploadfile"]["name"];
$folder = "img/".$filename;
//echo $folder;
$tempfilename = $_FILES["uploadfile"]['tmp_name'];
move_uploaded_file($tempfilename,$folder);
echo "<img src='$folder' height='200'  width='200' />";
if($id != "" && $na != "" && $em != "" && $id != "" && $folder !="")
{
	$query = "INSERT INTO employee VALUES ('$id','$na','$em','$rl','$folder')";
	$data = mysqli_query($connection,$query);
		if($data)
		{
			echo "Data insert successfully in Database";
		}
		else
		{
			echo "Error In add New Data in database";
		}
}

}
?>
</body>
</html>