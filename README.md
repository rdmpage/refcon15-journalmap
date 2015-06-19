# refcon15-journalmap

Ideas for a mashup of JournalMap for ReCon 15

@rdmpage Would quite like an @ORCID_Org mash-up with @JournalMap #ReCon_15
https://twitter.com/jacaryl/status/611791573941133312

This repository explores mashing up [JournalMap](http://journalmap.org), DOIs, and [ORCID](http;//orcid.org).

## Database

Since we are getting JSON from various APIs, CouchDB is an obvious choice. By default CouchDB doesn’t support spatial queries, however [Iris Couch](https://www.iriscouch.com/) is a cloud-based CouchDB that supports geospatial queries.

## JournalMap API

Need a user key.

Spatial index example:

    {
       “_id”: “_design/geojson”,
       “language”: “javascript”,
       “spatial”: {
           “articles”: “function(doc) { if (doc.locations) {    for (var i in doc.locations) { var geometry = {};     geometry.type = \”Point\”;      geometry.coordinates = [doc.locations[i].longitude, doc.locations[i].latitude];      emit(geometry, doc._id);}}}”
       }
    }


