<?php include('includes/conect.php');
include('includes/lib.php');

extract($_REQUEST);
@$trip_id=$_REQUEST['trip_id'];

	// DEFINITIONS
	$waypoint= "Tamiami FL";
	$counter = 0 ; 
	// PULL TRIP INFORMATION
	$result_trip=mysql_query ("SELECT * FROM trips WHERE trip_id = $trip_id") or die (mysql_error ());
	while ($row_trip=mysql_fetch_assoc($result_trip)){
		$start = $row_trip['starting_point_destination_id'];
		$end = $row_trip['ending_point_destination_id'];
	}
	// GET ADDRESSES 
	 $starting = show_unformatted_address($start);
	 $ending = show_unformatted_address($end);
	
	// PULL TRIP DESTINATIONS 
	$result=mysql_query ("SELECT * FROM trip_destinations WHERE trip_id = $trip_id") or die (mysql_error ());
	while ($row=mysql_fetch_assoc($result)){
	$address = $row['patient_destination_id'];
	$currentadd = get_patient_default($address);// PULLS NESTED INFRMATION ABOUT DEFAULT ADDRESS FROM PATIENT
	$latong = get_latlong($currentadd);
	$formattedaddress = get_formattedaddress($currentadd);
	
	$currentadd." - ".$latong->lat." / ".$latong->lng."</br>";

	$waypoints = $waypoints.'{location: "'.$currentadd.'" , stopover:true},';
	$wp = $wp.$latong->lat.",".$latong->lng."|"; 	
	
	
	// INCREASING THE COUNTER 
	$counter = $counter + 1;  
	}// end of while 
	 $waypointslist = "[".$waypoints."]";
	 
	 
// Detailes Address Directions PArams

$endpoint = 'http://maps.googleapis.com/maps/api/directions/json?';
			$params   = array(
				'origin'      => $starting,
				'destination' => $ending,
				'mode'        => 'driving',
				'sensor'      => 'false',
				'waypoints'	  => $wp
			);
	 

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Routing FHP</title>
<style type="text/css">
html { height: 100% }
body { height: 100%; margin: 0px; padding: 0px }
</style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
  var directionDisplay;
  var directionsService = new google.maps.DirectionsService();
  var map;

  function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer();
    var miami = new google.maps.LatLng(- 25.7526191, -80.2581658);
    var myOptions = {
      zoom: 6,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      center: miami
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    directionsDisplay.setMap(map);
    calcRoute();
  }
  
  function calcRoute() {

    var request = {
        // from: Blackpool to: Preston to: Blackburn
        origin: "<?=$starting?>", 
        destination: "<?=$ending?>", 
        waypoints: <?=$waypointslist?>,
        optimizeWaypoints: true,
        travelMode: google.maps.DirectionsTravelMode.WALKING
    };
	
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
        var route = response.routes[0];
        var summaryPanel = document.getElementById("directions_panel");
        summaryPanel.innerHTML = "";
        // For each route, display summary information.
        for (var i = 0; i < route.legs.length; i++) {
          var routeSegment = i + 1;
          summaryPanel.innerHTML += "<b>Route Segment: " + routeSegment + "</b><br />";
          summaryPanel.innerHTML += route.legs[i].start_address + " to ";
          summaryPanel.innerHTML += route.legs[i].end_address + "<br />";
          summaryPanel.innerHTML += route.legs[i].distance.text + "<br /><br />";
        }
        computeTotalDistance(response);
      } else {
        alert("directions response "+status);
      }
    });
  }

      function computeTotalDistance(result) {
      var totalDist = 0;
      var totalTime = 0;
      var myroute = result.routes[0];
      for (i = 0; i < myroute.legs.length; i++) {
        totalDist += myroute.legs[i].distance.value;
        totalTime += myroute.legs[i].duration.value;      
      }
      totalDist = totalDist / 1600.
      document.getElementById("total").innerHTML = "Total distance is: "+ totalDist + " Miles<br>";
      }

</script>
</head>
<body onload="initialize()">
<div id="map_canvas" style="float:left;width:70%;height:100%;"></div>
<div id="control_panel" style="float:right;width:30%;text-align:left;padding-top:20px">
<div id="startend" style="margin:20px;">
Starts: <?php echo $starting; ?></br>
Ends : <?php echo $ending; ?></br>
</div>
<div id="directions_panel" style="margin:20px;"></div>
<div id="total" style="margin:20px;"></div>
<?php 
echo "<b>Full Instructions Set:</b></br></br>";
// Fetch and decode JSON string into a PHP object
			$json = file_get_contents($endpoint.http_build_query($params));
			$data = json_decode($json);
			// get the map
			
			
			// If we got directions, output all of the HTML instructions
			if ($data->status === 'OK') {
				$route = $data->routes[0];
				foreach ($route->legs as $leg) {
					foreach ($leg->steps as $step) {
						echo $step->html_instructions . "<br>\n";
					}
				}
				
}?>
</div>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"> 
</script> 
</body>
</html>