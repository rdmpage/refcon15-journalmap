<?php

// delete a bunch of articles to clean p database

require_once (dirname(__FILE__) . '/couchsimple.php');
require_once (dirname(__FILE__) . '/lib.php');

$ids = array(
'articles/1',
'articles/21135',
'articles/22603',
'articles/22795',
'articles/22798',
'articles/22893',
'articles/384',
'articles/4336',
'articles/4365',
'articles/4386',
'articles/4394',
'articles/4406',
'articles/4422',
'articles/4446',
'articles/4491',
'articles/4566',
'articles/4576',
'articles/4600',
'articles/4619',
'articles/4625',
'articles/4630',
'articles/4671',
'articles/4696',
'articles/4699',
'articles/5025',
'articles/5349',
'articles/5710',
'articles/6042',
'articles/6746',
'articles/909'
);

foreach ($ids as $id)
{
	$couch->add_update_or_delete_document(null,  $id, 'delete');
}


?>