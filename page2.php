<!DOCTYPE html>
<html>
  <head>
  <p >
   <link href ="406.css" type ="text/css" rel = "stylesheet" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Marker Labels</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 50%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9o5ReEhnMQGfQWgsUyMr_-TIZsT8SWFA"></script>




    <script>
      // In the following example, markers appear when the user clicks on the map.
      // Each marker is labeled with a single alphabetical character.
      var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      var labelIndex = 0;
      var map;
       var lastMarker = new google.maps.Marker(
        {
          position: null,
          label: null,
          map: null
        });
      function initialize() {
        var Toronto =  new google.maps.LatLng(43.6577, -79.3788    );
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: Toronto
        });
        TestMarker();
     
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
        console.log(marker.getPosition().lat());
      }
     function addMarkerToMap(location, title, content) {
        // Add the marker at the clicked location, and add the next-available label
        var marker = new google.maps.Marker({
          position: location,
          label: labels[labelIndex++ % labels.length],
          map: map,
          title: title
        });
        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">' +title + '</h1>'+
            '<div id="bodyContent">'+
            '<p>' + content + '</p>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });
     marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
      
        console.log(marker.getPosition().lat());
      }
    function TestMarker() {
     addMarkerToMap(lastMarker, null);

    }
      google.maps.event.addDomListener(window, 'load', initialize);
 
    </script>


  </head>
  <body>
 
   <div class = "menu">
        <a href = "index.html"><div class = "button">
                Main
            </div> </a>
            <a href="intro.html"><div class = "button">
                Reports
            </div> </a>
            <a href="install.html"><div class = "button">
                Profile
            </div> </a>
            <a href="FAQ.html"><div class = "button">
                FAQ
            </div></a>
            <div class = "button">
                Contact Us
            </div>
            <a href="Friend.html"><div class = "button">
                Tell A Friend
            </div></a>
            <a href="Vote.html"><div class = "button">
                Vote
            </div></a>
        </div>
        <br>    
    <div id="map"></div>
    
    <script type="text/javascript">
    window.onload = function(){
      everything();
     addMarker(new google.maps.LatLng( {lat:43.6977, lng:-79.3788 } ));
    };

     everything  = function(){
      var values = new Array();
      var values2 = new Array();
    <?php 
    $myArray = array();
      $myfile =   fopen("whatever.txt", "r")or die("Something went wrong");
         while(!feof($myfile)){
          $row = fgetcsv($myfile);
          if(count ($row) == 4 ){
          $myArray [] = $row;
            }
         }

         for($x = 0;  $x < count($myArray) ; $x++  ){
    
          $myArray[$x][1] = trim($myArray[$x][1] , '()');
          $latlng =explode(",", $myArray[$x][1]);
        ?>
        values.push(<?php echo " {
            lat: parseFloat($latlng[0]),
            lng: parseFloat($latlng[1])
        } "; ?>); 
       values2.push(<?php
      $var1 = (String) $myArray[$x][0];
      $var2 = (String) $myArray[$x][2];
        echo " {
            name: (\"$var1 \" ),
            content: (\" $var2 \")
        } "; ?>); 
    <?php } ?>
    for(x in values){
      console.log (values[x]);
        thing = new google.maps.LatLng(values[x]);
        addMarkerToMap(thing, values2[x].name, values2[x].content);
    }
  };   
    </script>
  </body>
<?php 
    echo"
    <table>
      <tr>
        <th>Report Name</th>
        <th>Comment</th>
        <th>Status</th>
      </tr>";
  $myArray = array();
    $myfile =   fopen("whatever.txt", "r")or die("Something went wrong");
    while(!feof($myfile)){
      $row = fgetcsv($myfile);
          if(count ($row) == 4 ){
            $myArray [] = $row;
          }
    }

    for($x = 0;  $x < count($myArray) ; $x++  ){
      $var1 = (String) $myArray[$x][0];
      $var2 = (String) $myArray[$x][2];
      $var3 = (String) $myArray[$x][3];
      echo"<tr>
            <td> $var1 </td>
            <td> $var2</td>
            <td>$var3</td>
          </tr>";

}
echo"</table>";?>
</body>
</html>