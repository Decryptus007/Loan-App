<?php 

// $conn= new mysqli('localhost','root','','loan_db')or die("Could not connect to mysql".mysqli_error($con));



define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'loan_db');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error($conn);
}

?>