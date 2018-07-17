<?php
$servername="localhost";
$username="root";
$password="";
$dbname = "trialprojdb";
$con=new mysqli($servername,$username,$password,$dbname);
if ($con->connect_error)
	die("connection failed".connect_error);






else
	//echo"connection successful";




?>
