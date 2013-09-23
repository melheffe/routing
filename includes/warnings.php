<div class="alert_messages">
      <?php if ( !empty($errores) ) {
		print "The Folowing errors where found.<br />";
		foreach($errores as $e) {
			print "-" . $e . "<br>";
		}
		} 
		echo $msj?>
</div>