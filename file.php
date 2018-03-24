<?php
error_reporting(0);
?>
<html>
<body>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="uploadfile" value=""/>
<input type="submit" name="submit" value="Upload File"/>
</form>
</body>
</html>
<?php
//print_r($_FILES["uploadfile"]);
$filename = $_FILES["uploadfile"]["name"];
$folder = "img/".$filename;
//echo $folder;
$tempfilename = $_FILES["uploadfile"]['tmp_name'];
move_uploaded_file($tempfilename,$folder);
echo "<img src='$folder' height='200'  width='200' />";
?>