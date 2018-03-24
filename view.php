<?php
include('./config/connection.php');
error_reporting(0);
$query = "SELECT * FROM employee";
$data = mysqli_query($connection, $query);
$total = mysqli_num_rows($data);
//$record = mysqli_fetch_assoc($data);
//echo $record['Id'];
if($total != 0)
{
?>
<html>
<style>
td
{
	text-align:center;
}
table
{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

table td, table th {
    border: 1px solid #ddd;
    padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
    padding-top: 12px;
    padding-bottom: 12px;
    background-color: #4CAF50;
    color: white;
}
</style>
<body>
<h1 style="text-align:center;">The Employee Table is</h1>
<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Role</th>
<th>Image</th>
<th colspan="2">Operation</th>
</tr>
<?php	
	//echo "Table has a data";
	while($record = mysqli_fetch_assoc($data))
	{
		echo "<tr>
				<td>".$record['Id']."</td>
				<td>".$record['Name']."</td>
				<td>".$record['Email']."</td>
				<td>".$record['Role']."</td>
				<td><img src=".$record['Image']." width='100' height='100'</td>
				<td><a href='edit.php?id=$record[Id]&na=$record[Name]&em=$record[Email]&rl=$record[Role]&Im=$record[Image]'>Edit</a></td>
				<td><a href='delete.php?id=$record[Id]' onclick = 'return myFunction()'>Delete</a></td>
			</tr>";
	}
}
else echo "No data in database";
?>
<script type="text/javascript">
function myFunction()
{
	return confirm("Are your sure to delete this row??????");
}
</script>
</table>
</body>
</html>