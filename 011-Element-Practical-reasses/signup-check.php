<?php 
session_start(); 
include "db_conn.php";

//the connection to the DB above
//the IF statement determines whether the username is right or wrong and then how it deals with if incorrect

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {
function validate($data){

//function validate is just validating all data before there is any form of render
       $data = trim($data);

//these two lines explain the data types called upon that can be used

	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);

//return the value of data

	   return $data;
	}
//asking for data validation from the uname variable
//POST is a function for an array of variables

	$uname = validate($_POST['uname']);

//asking for data validation from the password variable

	$pass = validate($_POST['password']);

//integrity check on the re_password variable

	$re_pass = validate($_POST['re_password']);

//integrity check on the name variable

	$name = validate($_POST['name']);
	$user_data = 'uname='. $uname. '&name='. $name;

//this if statement checks if the uname is empty and if it is to return with the error= 

	if (empty($uname)) {
		header("Location: signup.php?error=Username is a requirement&$user_data");
	    exit();

//the else if loop does the same as above but for the password

	}else if(empty($pass)){
        header("Location: signup.php?error=A Password is a requirement&$user_data");
	    exit();
	}

//again this asks if the Re_Password variable is empty and to return the error= value

	else if(empty($re_pass)){
        header("Location: signup.php?error=Re_Password is a requirement&$user_data");
	    exit();
	}

//again this asks if the Name variable is empty and to return the error= value

	else if(empty($name)){
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	}

//lastly, this else loop determines whether the re_pass variable matches the data of Password and to return the error= value

	else if($pass !== $re_pass){
        header("Location: signup.php?error=Your passwords do not match&$user_data");
	    exit();
	}
	else{

// hashing the password

        $pass = md5($pass);

//this calls for the use of sql and the statements such as SELECT FROM WHERE to find information that's been stored on the database. 
	   
	$sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

//the following lines of code look to see if the username has been populated in the user_name row
and to return the error= value if it is taken

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=This username has already been taken&$user_data");
	        exit();

//this else loop declares if the above IF statement wasn't true then enter to DB

		}else {
           $sql2 = "INSERT INTO users(user_name, password, name) VALUES('$uname', '$pass', '$name')";
           $result2 = mysqli_query($conn, $sql2);

//if the else loop was succesful it then returns the success= value

           if ($result2) {
           	 header("Location: signup.php?success=You have succesfully created an account!");
	         exit();
           }else {
	           	header("Location: signup.php?error=An error unknown has occurred&$user_data");
		        exit();
           }		}
	}
}else{
header("Location: signup.php");
exit();
