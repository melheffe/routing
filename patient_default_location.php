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
			<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $currentadd;?>&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo urlencode($formattedaddress);?>&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe></br>
