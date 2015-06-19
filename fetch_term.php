<?php

// Add a bunch of references matching a term

require_once (dirname(__FILE__) . '/couchsimple.php');
require_once (dirname(__FILE__) . '/lib.php');

$term = 'Africa';

$url = 'https://journalmap.org//api/articles.json'
	. '?key=' . $config['journal_map_key']
	. '&version=1.0'
	. '&query="' . $term . '"';
	
$json = get($url);

echo $json;

$results = json_decode($json);

print_r($results);

foreach ($results as $result)
{
	$result->_id = 'articles/' . $result->id;
	
	$couch->add_update_or_delete_document($result,  $result->_id);
	
}



?>