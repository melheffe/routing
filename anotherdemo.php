<?php
include_once("includes/GoogleMap.php");
include_once("includes/JSMin.php");

$DIRECTIONS_CONTAINER_ID = "map_directions";
$MAP_OBJECT = new GoogleMapAPI(); $MAP_OBJECT->_minify_js = isset($_REQUEST["min"])?FALSE:TRUE;
//$MAP_OBJECT->setDSN("mysql://user:password@localhost/db_name");
$MAP_OBJECT->disableSidebar();
$MAP_OBJECT->addDirections("Littleton, CO", "Englewood, CO", $DIRECTIONS_CONTAINER_ID, $display_markers=true);
?>
<html>
<head>
<?=$MAP_OBJECT->getHeaderJS();?>
<?=$MAP_OBJECT->getMapJS();?>
</head>
<body>
<?=$MAP_OBJECT->printOnLoad();?> 
<?=$MAP_OBJECT->printMap();?>
<div id="<?=$DIRECTIONS_CONTAINER_ID?>"></div>
</body>
</html>