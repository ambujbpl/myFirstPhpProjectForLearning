<?php
include('./config/connection.php');
error_reporting(0);
$id = $_GET['id'];
$query = "DELETE FROM employee WHERE Id = '$id'";
$data = mysqli_query($connection, $query);
if($data)
{
	echo "<font color='green'>Record Delete Successfully!";
	echo "<script>alert('Record Deleted Successfully')</script>";
	?>
	<META HTTP-EQUIV='Refresh' CONTENT="5; URL=http://localhost/learnphp/view.php"> 
	<?php
	//echo "<a href='view.php'>GO bach to view data table";
}
else
{
	echo "<font color='red'>Error in delete operation";	
	//echo "<a href='view.php'>GO bach to view data table";
}
?>
