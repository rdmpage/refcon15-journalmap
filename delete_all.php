<?php

// delete a bunch of articles to clean p database

require_once (dirname(__FILE__) . '/couchsimple.php');
require_once (dirname(__FILE__) . '/lib.php');

$url = '_design/articles/_view/all';

$resp = $couch->send("GET", "/" . $config['couchdb_options']['database'] . "/" . $url);

$response_obj = json_decode($resp);

print_r($response_obj);

$ids=array();
foreach ($response_obj->rows as $row)
{
	$ids[] = $row->id;
}

print_r($ids);


foreach ($ids as $id)
{
	$couch->add_update_or_delete_document(null,  $id, 'delete');
}


?>