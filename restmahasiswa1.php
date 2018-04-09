<?php

error_reporting(0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);
error_reporting(E_ALL & ~E_NOTICE);

$path = $_SERVER[PATH_INFO];    
if ($path != null) {
$path_params = spliti ("/", $path);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

if ($path_params[1] == null) {

		$con=mysqli_connect("localhost","root","","akademik");

	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql="SELECT nim,nama,prodi FROM mahasiswa";
	echo "<data>";
	if ($result=mysqli_query($con,$sql))
	{
 
  	
	while ($row=mysqli_fetch_row($result))
		{
		echo "<mahasiswa>";
		echo "<nim>".$row[0]."</nim>";
		echo "<nama>".$row[1]."</nama>";
		echo "<prodi>".$row[2]."</prodi>";
		echo "</mahasiswa>";
		}
  
	mysqli_free_result($result);
	}
	echo "</data>";
	mysqli_close($con);

}
else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
if ($path_params[1] != null) {
		$con=mysqli_connect("localhost","root","","akademik");

	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql="SELECT nim,nama,prodi FROM mahasiswa where nim = '$path_params[1]'";
	echo "<data>";
	if ($result=mysqli_query($con,$sql))
	{
  
  	
	while ($row=mysqli_fetch_row($result))
		{
		echo "<mahasiswa>";
		echo "<nim>".$row[0]."</nim>";
		echo "<nama>".$row[1]."</nama>";
		echo "<prodi>".$row[2]."</prodi>";
		echo "</mahasiswa>";
		}
  
	mysqli_free_result($result);
	}
	echo "</data>";
	mysqli_close($con);

	
}
}
	
}
?> 