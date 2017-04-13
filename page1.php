
<!DOCTYPE html>
<html>
  <head>
  <p >
   <link href ="406.css" type ="text/css" rel = "stylesheet" />
   <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">    
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Marker Labels</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
		top:86px;
        height: 50%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9o5ReEhnMQGfQWgsUyMr_-TIZsT8SWFA"></script>
    <script>
      // In the following example, markers appear when the user clicks on the map.
      // Each marker is labeled with a single alphabetical character.
      var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      var labelIndex = 0;
      var lastMarker = new google.maps.Marker(
        {
          position: null,
          label: null,
          map: null
        });
      function initialize() {
        var Toronto = { lat:43.6577, lng: -79.3788		 };
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: Toronto
        });

        // This event listener calls addMarker() when the map is clicked.
        google.maps.event.addListener(map, 'click', function(event) {
          addMarker(event.latLng, map);

        });

        // Add a marker at the center of the map.
        
      }

      // Adds a marker to the map.
      function addMarker(location, map) {
        // Add the marker at the clicked location, and add the next-available label
        // from the array of alphabetical characters.
        var marker = new google.maps.Marker({
          position: location,
          label: labels[labelIndex++ % labels.length],
          map: map
        });
        document.getElementById("latlng").value = marker.position;
        console.log(document.getElementById("latlng").value);
      lastMarker.setMap(null);
      lastMarker = marker;

      }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
 <?php
// define variables and set to empty values
  $reportName = $latlng =  $comment = $status= "";
  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $reportName = test_input($_POST["reportName"]);
  $latlng = test_input($_POST["latlng"]);
  $comment = test_input($_POST["comment"]);
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if( $reportName !== "" || $latlng !== "" || $comment  !== "" ){
$report = $arrayName = array($reportName, $latlng, $comment, "Sent");
$myfile = fopen("whatever.txt", 'a+') or die("Something went wrong");
fwrite($myfile, "\r\n");

fputcsv($myfile, $report);

fclose($myfile);
}
?>
   <<div class = "menu">
        <a href = "406.html"><div class = "button">
                Main
            </div> </a>
            <a href="page1.php"><div class = "button">
                Reports
            </div> </a>
            <a href="profile.html"><div class = "button">
                Profile
            </div> </a>
            <a href="faq.html"><div class = "button">
                FAQ
            </div></a>
            <a href="contact.html"><div class = "button">
                Contact Us
            </div></a>
            <a href="friend.html"><div class = "button">
                Tell A Friend
            </div></a>
            <a href="vote.html"><div class = "button">
                Vote
            </div></a>
			
        </div>
        
          
    <div id="map"></div>

	
  <div id = "inputArea" >
    <h1>Enter A Report</h1>
    
   <form action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post" >
    <input type="hidden" name="latlng" id ="latlng" value = "">
	  <input id = "textboxBlock" type="text" name="reportName"> 
    <pre>Report Name:




	</pre>
  
      Please Type Your Report: <br>
    <textarea id="textbox" name="comment" rows="5" cols="40"></textarea>
    <input type="submit" name="">
  </div>
<?php
echo "<h2>Your Input:</h2>";
echo $reportName;
echo "<br>";
echo $latlng;
echo "<br>";
echo $comment;

?>




  </body>


</html>
