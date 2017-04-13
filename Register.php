<?php
require('config.php');
if (isset($_POST['submit']))
{
    //All good
   $firstname = mysql_escape_string($_POST['fname']);
   $lastname = mysql_escape_string($_POST['lname']);
   $address = mysql_escape_string($_POST['address']);
   $phonenum = mysql_escape_string($_POST['phonenum']);
   $email = mysql_escape_string($_POST['email']);
   $user = mysql_escape_string($_POST['user']);
   $pass = mysql_escape_string($_POST['pass']);
 	
   $pass = md5($pass);

   //Check if username is taken
   $check = mysql_query("SELECT * FROM user WHERE user = '$user'")or die(mysql_error());
   if (mysql_num_rows($check)>=1) echo "Username has been taken already";
   //Put everyting in DB
   else{
   mysql_query("INSERT INTO `user` (`id`, `fname`, `lname`, `address`, `phonenum`, `email`, `user`, `pass`) VALUES (NULL, '$firstname', '$lastname', '$address', '$phonenum', '$email', '$user', '$pass')") or die(mysql_error());
   echo '<script type="text/javascript">
           window.location = "login.php"
      </script>';
   }
 }

else{
$form = <<<EOT
	<head>
		<title>Registration</title>
	</head>
	<style>
		.container{
			padding: 16px;
		}
		body {background-color: lightblue; border: 2px solid white;}
	</style>
	<body>
		<div class = "container" align="center">
			<h2> Registration Form </h2>
			<br><br>
			<form action = "register.php" method="post">
				<label><b>First Name</b></label>
				<br>
			    <input type="text" placeholder="Enter First Name" name="fname" required>
				<br><br>
				<label><b>Last Name</b></label>
				<br>
			    <input type="text" placeholder="Enter Last Name" name="lname" required>
				<br><br>
				<label><b>Username</b></label>
				<br>
			    <input type="text" placeholder="Enter Username" name="user" required>
				<br><br>
			    <label><b>Password</b></label>
				<br>
			    <input type="password" placeholder="Enter Password" name="pass" required>
				<br><br>
				<label><b>Address</b></label>
				<br>
			    <input type="address" placeholder="Enter Address" name="address" required>
				<br><br>
			    <label><b>Email</b></label>
				<br>
			    <input type="email" placeholder="Enter Email" name="email" required>
				<br><br>
			    <label><b>Phone Number</b></label>
				<br>
			    <input type="phone" placeholder="Enter Phone Number" name="phonenum" required>
				<br><br>
		        <button type="submit" name="submit" class="signupbtn">Create Account</button>
			</form>
		</div>
	
EOT;
 
echo $form;
 
}
 
?>
