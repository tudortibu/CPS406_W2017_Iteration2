<?php
require('config.php');
 
if(isset($_POST['submit']))
{
 $user = mysql_escape_string($_POST['user']);
 $pass = mysql_escape_string($_POST['pass']);
 $pass = md5($pass);
 
 $check = mysql_query("SELECT * FROM `user` WHERE `user` = '$user' AND `pass` = '$pass'");
 if(mysql_num_rows($check) >= 1){
  echo '<script type="text/javascript">
           window.location = "406.html"
      </script>';
  exit();
 }
 else{
     echo '<script type="text/javascript">
              window.location = "login.php"
         </script>';
 }
}


else{
 
 $form = <<<EOT
	 <head>
	 	<title>Login</title>
	 	<link rel="stylesheet" type=text/css href=https://fonts.googleapis.com/css?family=RobotoCondensed>
	 <style>
	 	body {background-color: lightblue; border: 2px solid white;}
	 	div {font-family: 'Roboto Condensed', serif; font-size:30px;}
	 </style>
	 </head>
	
	 <div align="center"">
	 	Welcome to Cypress
	 	<br><br>
	 	<br>
	 <form action="login.php" method="POST">
	 	Username:<br>
	 	<input type="text" placeholder="Enter Username" name="user" required>
	 <br><br>
	 	Password:<br>
	 	<input type="password" placeholder="Enter Password" name="pass" required>
	 <br><br>
	 <input type="submit" name="submit" value="Login">
	 </form>
	 <form action="Register.php" method="POST">
	 <input type="submit" name="reg" value="Register">
	 </form>
	 <br><br><br>
	 <img src="https://upload.wikimedia.org/wikipedia/en/9/98/City_of_Toronto_Logo.png">

	 </div> 
 
EOT;
 
echo $form;
}
?>
