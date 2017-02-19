<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />

	<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<style>
		body {
			padding: 0;
			margin: 0;
		}
		html, body, #map {
			height: 100%;
		}
	</style>
</head>
</head>

<body>
<div>Bishop's Castle has historically hosted around 46 pubs. The map on this page, as printed in 1926, can be used to locate both the pubs open and trading today, shown as blue building outlines, and the sites of the 'lost pubs', now closed, shown as blue markers. Click the markers and building outlines to discover some of the history of each pub.</div>
<div id="map"><script>// <![CDATA[
var map = L.map('map', {
		    center: [52.4935,-2.9981],
		    zoom: 17,
		});
		L.tileLayer('http://mapwarper.net/maps/tile/12484/{z}/{x}/{y}.png', {
			maxZoom: 18,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="http://mapbox.com">Mapbox</a>',
			id: 'mapbox.streets'
		}).addTo(map);
		$.getJSON("pubs.geojson", function(data) {
			var geojson = L.geoJson(data)
                        geojson.on('click', function(e) {
                                document.location.href = e.layer.feature.properties.url;
                        });
			geojson.addTo(map);
		});
                $.getJSON("lost_pubs.geojson", function(data) {
			var geojson = L.geoJson(data)
                        geojson.on('click', function(e) {
                                document.location.href = e.layer.feature.properties.url;
                        });
			geojson.addTo(map);
		});
// ]]></script></div>
</body>
</html>