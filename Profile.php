<!DOCTYPE html>
<html>
    <head>
        <link href ="Profile.css" type ="text/css" rel = "stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"> 
        <title> Profile </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <?php
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $address = $_POST["address"];
            $pnum = $_POST["pnum"];
            $email = $_POST["email"];
            $uname = $_POST["uname"];
            $pass = $_POST["pass"];
            $profile = array($fname,$lname,$address,$pnum,$email,$uname,$pass);
        ?>
    </head>
    <body>
      <div class = "menu">
        <a href = "406.html"><div class = "button">
                Main
            </div> </a>
            <a href="page1.php"><div class = "button">
                Reports
            </div> </a>
            <a href="EditProfile.html"><div class = "button">
                Profile
            </div> </a>
            <a href="FAQ.html"><div class = "button">
                FAQ
            </div></a>
            <a href="contactUs.html"><div class = "button">
                Contact Us
            </div></a>
            <a href="TellaFriend.html"><div class = "button">
                Tell A Friend
            </div></a>
            <a href="vote.html"><div class = "button">
                Vote
            </div></a>
            
        </div>
        <div class = "main-content">
            <div class = "profile">
                <div id = "personal-info">
                     <h3> Profile</h3>
                     <hr> </hr>
                     <table class = "prof-info">
                         <tr>
                             <td> First Name: </td>
                             <td id = "fname"> Kodak  </td>
                         </tr>
                         <tr>
                             <td> Last Name: </td>
                             <td id = "lname"> Black </td>
                         </tr>
                         <tr>
                             <td> Address: </td>
                             <td id = "address"> Jail </td>
                         </tr>
                         <tr>   
                             <td> Phone Number: </td>
                             <td id = "pnum"> 555-555-5555 </td>
                         </tr>
                         <tr>
                             <td> Email: </td>
                             <td id = "email"> freekodak@gmail.com </td>
                         </tr>
                    </table>
                </div>
                <div id = "account-info">
                    <table class = "acc-info">
                        <tr>
                            <td> Username: </td>
                            <td id = "uname"> tunnel visionary </td>
                        </tr>
                        <tr>
                            <td> Password: </td>
                            <td id = "pass"> rapgod123 </td>
                        </tr>
                        <tr>
                            <td> Active Reports: </td>
                            <td> 10 </td>
                        </tr>
                        <tr>
                            <td> Total Reports Solved: </td>
                            <td> 40 </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class = "about-profile">
                <table class = "about-info">
                    <tr>
                        <td><a href = "EditProfile.html"> Edit Profile </a> </td>
                    </tr>
                    <tr>
                        <td><a href = "page1.php"> View Reports </a> </td>
                    </tr>
                </table>
           </div>
        </div>
        <script type = "text/javascript">
            var cProfile = <?php echo json_encode($profile); ?>;
            if(checkProfile(cProfile) == true)
            {
               document.getElementById("fname").innerHTML = cProfile[0];
               document.getElementById("lname").innerHTML = cProfile[1];
               document.getElementById("address").innerHTML = cProfile[2];
               document.getElementById("pnum").innerHTML = cProfile[3];
               document.getElementById("email").innerHTML = cProfile[4];
               document.getElementById("uname").innerHTML = cProfile[5];
               document.getElementById("pass").innerHTML = cProfile[6];

            }
            function checkProfile(cProfile)
            {
                for(var i = 0; i < 7; i++)
                {
                    if(cProfile[i] == null) return false;
                    else return true;
                }
            }
        </script>
    </body>
  </html>