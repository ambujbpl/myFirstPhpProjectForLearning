<?php
include("./config/connection.php");
$query = "INSERT INTO employee VALUES ('1001','Ambuj Dubey', 'ambujdubey89@gmail.com', 'Admin')";
$data = mysqli_query($connection , $query);
if($data) echo "Data Insert in db Successfully!";
else echo "Error in insert data";
?>