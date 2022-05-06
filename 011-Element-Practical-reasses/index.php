<!DOCTYPE html>
<html>
<head>
//decleration of the hyperlink to gain access to the css code for how things look on the site

	<title>LOGIN</title>
	<link rel="css_sheet" type="css" href="css_sheet.css">
</head>
<body>

//Form action is what is to be used for the sending.
//the method is how the form action is sent.

     <form action="log.php" method="post">
     	<h2>LOGIN</h2>

//calling up a class/classes and how the form data is used after method is sent

     	<?php if (isset($_GET['error found'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Username</label>

//Below is test, it includes placeholders which is an aesthetic addition

     	<input type="text" name="uname" placeholder="Username"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

//A hyperlink which is used to get to that file and the class that is called


     	<button type="submit">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
</body>
</html>