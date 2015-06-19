# refcon15-journalmap

Ideas for a mashup of JournalMap for ReCon 15

@rdmpage Would quite like an @ORCID_Org mash-up with @JournalMap #ReCon_15
https://twitter.com/jacaryl/status/611791573941133312

This repository explores mashing up [JournalMap](http://journalmap.org), DOIs, and [ORCID](http;//orcid.org).

JournalMap is a database of localities of scientific papers, many with DOIs. Authors are identified by strings. ORCID is a database of authors, each with a unique identifier. Given this, we could ask some questions:

1. Given an ORCID for a researcher, can we generate a map of the localities mentioned in their published papers (i.e., what part of the world does this person study?). For this we need to get list of papers from ORCID, then look up each DOI in JournalMap.

2. Can we do this for a set of people, either via a list of ORCIDs, or directly form a list of DOIs?

3. Can we do the reverse query, given a geographic bounding box (a region on a map) who are the people doing research there? (In the sense of doing research on that part of the world, not necessarily physically based there).

## Database

Since we are getting JSON from various APIs, CouchDB is an obvious choice. By default CouchDB doesn’t support spatial queries, however [Iris Couch](https://www.iriscouch.com/) is a cloud-based CouchDB that supports geospatial queries.

## JournalMap API

Need a user key.

## CouchDB query

Spatial index example:

    {
       “_id”: “_design/geojson”,
       “language”: “javascript”,
       “spatial”: {
           “articles”: “function(doc) { if (doc.locations) {    for (var i in doc.locations) { var geometry = {};     geometry.type = \”Point\”;      geometry.coordinates = [doc.locations[i].longitude, doc.locations[i].latitude];      emit(geometry, doc._id);}}}”
       }
    }


