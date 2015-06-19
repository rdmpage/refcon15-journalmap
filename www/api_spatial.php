<?php

// CouchDB bounding box search, return GeoJSON

require_once (dirname(dirname(__FILE__)) . '/couchsimple.php');

require_once (dirname(__FILE__) . '/api_utils.php');

$callback = '';

// If no query parameters 
if (count($_GET) == 0)
{
	//default_display();
	echo 'hi';
	exit(0);
}

if (isset($_GET['callback']))
{	
	$callback = $_GET['callback'];
}

$bbox = $_GET['bbox'];
	
$url = '_design/geojson/_spatial/articles?key=' . urlencode($key);
	
if ($config['stale'])
{
	$url .= '&stale=ok';
}	
	
$resp = $couch->send("GET", "/" . $config['couchdb_options']['database'] . "/" . $url);

$response_obj = json_decode($resp);

$obj = new stdclass;
$obj->status = 200;

//$obj->results = $response_obj;
/*

switch (count($response_obj->rows))
{
	case 0:
		break;
		
	case 1:
		$obj->geometry = $response_obj->rows[0]->geometry;
		break;
		
	default:
		$obj->geometry = new stdclass;
		$obj->geometry->type = "MultiPoint";
		$obj->geometry->coordinates = array();


		foreach ($response_obj->rows as $row)
		{
			$obj->geometry->coordinates[] = $row->geometry->coordinates;
		}
	
		break;
}
*/

$obj = new stdclass;
$obj->type = "FeatureCollection";
$obj->features = array();

foreach ($response_obj->rows as $row)
{
	$x = new stdclass;
	$x->type = "Feature";
	$x->geometry = $row->geometry;
	
	$x->properties = new stdclass;
	$x->properties->name = 'test';
	
	$obj->features[] = $x;
	
}
		




api_output($obj, $callback);

?>