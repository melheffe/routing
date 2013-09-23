<?php 


	function get_latlong($myaddress){
		$myaddress = urlencode($myaddress);
		//here is the google api url
		$url = "http://maps.googleapis.com/maps/api/geocode/json?address=$myaddress&sensor=false";
		//get the content from the api using file_get_contents
		$getmap = file_get_contents($url);
		//the result is in json format. To decode it use json_decode
		$googlemap = json_decode($getmap);
		//get the latitute, longitude from the json result by doing a for loop
		foreach($googlemap->results as $res){
		$address = $res->geometry;
		$latlng = $address->location;
		$formattedaddress = $res->formatted_address;
		
		return $latlng;
		}
			
	}
	
	function get_formattedaddress($myaddress){
		$myaddress = urlencode($myaddress);
		//here is the google api url
		$url = "http://maps.googleapis.com/maps/api/geocode/json?address=$myaddress&sensor=false";
		//get the content from the api using file_get_contents
		$getmap = file_get_contents($url);
		//the result is in json format. To decode it use json_decode
		$googlemap = json_decode($getmap);
		//get the latitute, longitude from the json result by doing a for loop
		foreach($googlemap->results as $res){
		$address = $res->geometry;
		$latlng = $address->location;
		$formattedaddress = $res->formatted_address;
		
		return $formattedaddress;
		}
			
	}
	
	function show_unformatted_address($id){
		
		$sql2="SELECT * FROM destinations WHERE destination_id = $id ";
		$sql_exec2=mysql_query($sql2);
		while($row2=mysql_fetch_assoc($sql_exec2)){	
		$name = $row2['title'];
		$address_1 = $row2['address_1'];
		$address_2 = $row2['address_2'];
		$city = $row2['city'];
		$state = $row2['state'];
		$zipcode = $row2['zipcode'];
		$validated = $row2['validated'];		
		} 
		return "$address_1 $address_2 $city $state $zipcode, USA"; // return full array
		
	}
	
	function get_patient_default($id){
		
		$sql2="SELECT * FROM patient_destinations WHERE patient_destination_id = $id";
		$sql_exec2=mysql_query($sql2);
		while($row2=mysql_fetch_assoc($sql_exec2)){	
		$destination = $row2['destination_id'];		
		}
		return show_unformatted_address($destination);
	}
	
	function get_patients_destination_id($id){
		
		$sql2="SELECT * FROM patient_destinations WHERE patient_id = $id";
		$sql_exec2=mysql_query($sql2);
		while($row2=mysql_fetch_assoc($sql_exec2)){	
		$destination = $row2['patient_destination_id'];		
		}
		return $destination;
	}

    function show_special_req($id){
		
		$sql2="SELECT * FROM special_reqs WHERE special_req_id = $id ";
		$sql_exec2=mysql_query($sql2);
		while($row2=mysql_fetch_assoc($sql_exec2)){	
		$name = $row2['title'];
		}
		if (empty($name)){ return "None"; } else { return "$name"; }
	}
	
	function findstartpointsid(){
		
		$sql2="SELECT * FROM destination_cats WHERE  `title` LIKE  'Start Points'";
		$sql_exec2=mysql_query($sql2);
		while($row2=mysql_fetch_assoc($sql_exec2)){	
		$name = $row2['destination_cat_id'];
		}
		if (empty($name)){ return "None"; } else { return "$name"; }
	}
	
	
	function show_address($id){
		
		$sql2="SELECT * FROM destinations WHERE destination_id = $id ";
		$sql_exec2=mysql_query($sql2);
		while($row2=mysql_fetch_assoc($sql_exec2)){	
		$name = $row2['title'];
		$address_1 = $row2['address_1'];
		$address_2 = $row2['address_2'];
		$city = $row2['city'];
		$state = $row2['state'];
		$zipcode = $row2['zipcode'];
		$validated = $row2['validated'];		
		}
		if (empty($address_1)){ return "None"; } 
		else
		{ 
		return "$address_1 $address_2 $city , $state - $zipcode</br>"; // return full array
		 }
	}

?>