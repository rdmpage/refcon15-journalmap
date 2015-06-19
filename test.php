<?php

require_once (dirname(__FILE__) . '/couchsimple.php');
require_once (dirname(__FILE__) . '/lib.php');

$json = '{
   "_id": "articles/1",
   "title": "Water availability in almond orchards on marl soils in southeast Spain: The role of evaporation and runoff",
   "article_url": "https://journalmap.org/api/articles/1.json?key=wydADzs_TzRsa8J82z-4&version=1.0",
   "locations_count": 1,
   "locations_url": "https://journalmap.org/api/locations.json?article_id=1&key=wydADzs_TzRsa8J82z-4&page=1&version=1.0",
   "authors_url": "https://journalmap.org/api/authors.json?article_id=1&key=wydADzs_TzRsa8J82z-4&page=1&version=1.0",
   "doi": "10.1016/j.jaridenv.2008.06.017",
   "volume": 72,
   "issue": 12,
   "start_page": 2168,
   "end_page": 2178,
   "publish_year": 2008,
   "url": "",
   "authors": [
       {
           "id": 10157,
           "first_name": "A.",
           "last_name": "Meerkerk",
           "author_url": "https://journalmap.org/api/authors/10157.json?key=wydADzs_TzRsa8J82z-4&version=1.0",
           "articles_count": 1,
           "articles_url": "https://journalmap.org/api/articles.json?author_id=10157&key=wydADzs_TzRsa8J82z-4&page=1&version=1.0"
       },
       {
           "id": 9483,
           "first_name": "B.",
           "last_name": "van Wesemael",
           "author_url": "https://journalmap.org/api/authors/9483.json?key=wydADzs_TzRsa8J82z-4&version=1.0",
           "articles_count": 3,
           "articles_url": "https://journalmap.org/api/articles.json?author_id=9483&key=wydADzs_TzRsa8J82z-4&page=1&version=1.0"
       },
       {
           "id": 10158,
           "first_name": "E.",
           "last_name": "Cammeraat",
           "author_url": "https://journalmap.org/api/authors/10158.json?key=wydADzs_TzRsa8J82z-4&version=1.0",
           "articles_count": 1,
           "articles_url": "https://journalmap.org/api/articles.json?author_id=10158&key=wydADzs_TzRsa8J82z-4&page=1&version=1.0"
       }
   ],
   "locations": [
       {
           "id": 1741,
           "latitude": 38.2,
           "longitude": -1.52,
           "location_url": "https://journalmap.org/api/locations/1741.json?key=wydADzs_TzRsa8J82z-4&version=1.0"
       }
   ],
   "publication": {
       "id": 1,
       "name": "Journal of Arid Environments",
       "publication_url": "https://journalmap.org/api/publications/1.json?key=wydADzs_TzRsa8J82z-4&version=1.0",
       "articles_count": 1105,
       "articles_url": "https://journalmap.org/api/articles.json?key=wydADzs_TzRsa8J82z-4&page=1&publication_id=1&version=1.0"
   }
}';

$obj = json_decode($json);

print_r($obj);

$couch->add_update_or_delete_document($obj,  $obj->_id);

?>