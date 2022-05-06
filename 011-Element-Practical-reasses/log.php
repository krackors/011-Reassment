<?php 
session_start(); 

//The database to connect to

include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

//A row of data of a specific data type

	function validate($data){

//function validate is just validating all data before there is any form of render   
    
           $data = trim($data);

//these two lines explain the data types called upon that can be used

	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);

//return the value of data

	   return $data;
	}

//Post has already been declared
//this validates the username

	$uname = validate($_POST['uname']);

//this validates the password

	$pass = validate($_POST['password']);

//this IF statement is asking if the username is empty then return with the value error=

	if (empty($uname)) {
		header("Location: index.php?error=Username cannot be left empty");
	    exit();

//the else loop attatched to the IF statement also return with the error= value

}else if(empty($pass)){
        header("Location: index.php?error=The Password cannot be left empty");
	    exit();
	}else{	
	
// md5 password hashing encryption

        $pass = md5($pass);        
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
		$result = mysqli_query($conn, $sql);

//If the username and password match it will send you to the index.html file, otherwise it returns with incorrect Username or Password
		
if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);

//this if statement calls on the user_name row in the phpmyadmin DB and the password row to determine if data matches
          
	  if ($row['user_name'] === $uname && $row['password'] === $pass) {

//the $_SESSION is an array of all variables in this session

            	$_SESSION['user_name'] = $row['user_name'];

//the username row variable decleration

            	$_SESSION['name'] = $row['name'];

//the ID variable row from the DB

            	$_SESSION['id'] = $row['id'];

//to process onto the index.html website

            	header("Location: index.html");
		        exit();

//this else loop is for is the username or password is wrong

            }else{				header("Location: index.php?error=Incorrect Username or password");
		        exit();
			}

//this else loop is for is the username or password is wrong
		}else{
			header("Location: index.php?error=Incorrect Username or password");
	        exit();
		}	}
	}else{
	header("Location: index.php");
	exit();
