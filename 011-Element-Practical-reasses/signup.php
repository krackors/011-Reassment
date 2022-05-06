<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="css_sheet" type="css" href="css_sheet.css">

//above is the link to the content needed to get from the file declared

</head>
<body>

//the data you want to determine how the data is sent e.g. method="post" 

     <form action="signup-valid.php" method="post">

//a nice obvious header for the sign up page

     	<h2>SIGN UP</h2>

//There are if statements to determine if data meets the requirements and due to the nature of an IF statement that then returns with success.
//this first 3 lines is if an error was found and calls on the error class

     	<?php if (isset($_GET['error found'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

//this next 3 lines calls on the success class

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
          <label>Name</label>

//an if statement for name registration

          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 

//the name variable asking specificly for a name

                      name="name" 

//the placehold is more of an aesthetic touch

                      placeholder="Enter name here"
                      value="<?php echo $_GET['name']; ?>"><br>

//an else loop for the name

          <?php }else{ ?>

//declaring the type of data (text)

               <input type="text" 
                      name="name" 
                      placeholder="Enter Name Here"><br>
          <?php }?>
          <label>User Name</label>

//an if statement for username registration

          <?php if (isset($_GET['uname'])) { ?>

//declaring the type of data (text)

               <input type="text" 

//specificaly requiring data for the username field in the database

	  name="uname" 
//the placehold is more of an aesthetic touch      
     
          placeholder="Enter Username Here"
          value="<?php echo $_GET['uname']; ?>"><br>

//an else loop for the Username

          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Enter User Name"><br>
          <?php }?>
     	<label>Password</label>

//declaring the type of data (password). This data is hidden when typed.

     	<input type="password" 
the variable name and the aesthetic addition of placeholder
                 name="password" 
                 placeholder="Password"><br>
          <label>Confirm Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Enter the Password"><br>
     	<button type="submit">Sign Up</button>
          <a href="log.php" class="ca">Do you already have an account with us?</a>
     </form>
</body>
</html>
