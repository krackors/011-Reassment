<?php

//Credentials to access the mysql database
<?php

$sname= "localhost"; - 
$unmae= "root";
$password = "Linkedin1!";

//This call the database, and then requests a connection with the rows listed e.g. $sname

$db_name = "DB_11";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

//The connection fails it will return with the following data.

if (!$conn) {
	echo "Connection failed!";
