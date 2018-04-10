<?php
error_reporting(0);
session_start();

$_SESSION['Name']="Your Name";
echo $_SESSION['Name'];
//session_unset();
//echo "<br>Name---",$_SESSION['Name'];

 ?>