<?php include('includes/conect.php');
include('includes/lib.php');
	$result=mysql_query ("SELECT * FROM destinations") or die (mysql_error ());

while ($row=mysql_fetch_assoc($result)){
	
	$startpoint= '8121 Abbott Ave. Miami, FL';// falta definir al loop de startpoint.
	$waypoint= '147 Alambra Cir. Miami, FL';// falta definir al loop de startpoint.

	
	$currentadd= $row['address_1']." ".$row['address_2'].", ".$row['city'].", ".$row['state'];
	
	$latong = get_latlong($currentadd);
	
	$formattedaddress = get_formattedaddress($currentadd);
	
	echo $currentadd." - ".$latong->lat." / ".$latong->lng."</br>";
	
			$endpoint = 'http://maps.googleapis.com/maps/api/directions/json?';
			$params   = array(
				'origin'      => $startpoint,
				'destination' => $currentadd,
				'mode'        => 'driving',
				'sensor'      => 'false',
				'waypoints'	  => $waypoint
			);
			
			// Fetch and decode JSON string into a PHP object
			$json = file_get_contents($endpoint.http_build_query($params));
			$data = json_decode($json);
			// get the map
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        margin: 0;
        padding: 0;
        height: 100%;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
var map;
function initialize() {
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(-34.397, 150.644),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
  
    <div id="map-canvas"></div>
  </body>
</html>