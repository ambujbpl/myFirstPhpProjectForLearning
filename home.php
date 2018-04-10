<?php
include('config/connection.php');
session_start();
$un = $_SESSION['un'];
if($un != true){
header('location:login.php');
}
$query = "select * from employee where Username='$un'";
$data = mysqli_query($connection,$query);
$total = mysqli_num_rows($data);
if($total == 1){
	echo $total;
}
$result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<div class="float-left">
<h1>Wellcome to Greenticks</h1>
Your ID   : <?php echo $result['Id']?><br>
Your Name : <?php echo $result['Name']?><br>
Your Email: <?php echo $result['Email']?><br>
Your Role : <?php echo $result['Role']?><br>
</div>
<div class="float-right">
<img src="<?php echo $result['Image']?>" width="200" height="200" align="right" vspace='10' hspace="10"/>
</div>
<div><p>PHP scripts are executed on the server. What You Should Already Know Before you continue you should have a basic understanding of the following: HTML,CSS and JavaScript. If you want to study these subjects first, find the tutorials on our Home page. What is PHP? PHP is an acronym for "PHP: Hypertext Preprocessor" PHP is a widely-used, open source scripting Language, PHP scripts are executed on the server, PHP is free to download and use, PHP is an amazing and popular language!, 
It is powerful enough to be at the core of the biggest blogging system on the web (WordPress)!, It is deep enough to run the largest social network (Facebook)!, It is also easy enough to be a beginner's first server side language!
What is a PHP File? PHP files can contain text, HTML, CSS, JavaScript, and PHP code, PHP code are executed on the server, and the result is returned to the browser as plain HTML, PHP files have extension ".php". What Can PHP Do? PHP can generate dynamic page content, PHP can create, open, read, write, delete, and close files on the server, PHP can collect form data
    PHP can send and receive cookies, PHP can add, delete, modify data in your database, PHP can be used to control user-access
    PHP can encrypt data, With PHP you are not limited to output HTML. You can output images, PDF files, and even Flash movies. You can also output any text, such as XHTML and XML. Why PHP? PHP runs on various platforms (Windows, Linux, Unix, Mac OS X, etc.) PHP is compatible with almost all servers used today (Apache, IIS, etc.), PHP supports a wide range of databases, PHP is free. Download it from the official PHP resource: www.php.net, PHP is easy to learn and runs efficiently on the server side
</p></div>

<a class="button" name="Logout" href="logout.php" value="Logout">Logout</a>
<style type="text/css">
.button {
  background-color: ForestGreen;  
  border-radius: 5px;
  color: white;
  padding: .5em;
  text-decoration: none;
}

.button:focus,
.button:hover {
  background-color: DarkGreen;
}

</style>
</body>
</html>

