<!DOCTYPE html>
<html>
<head>
	<title>Google Maps API</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		#map{
			width: 100%;
			height: 500px;
		}
	</style>
</head>
<body>
<div id="map"></div>

<script>
	function initMap(){
		var location = {lat: 31.147129, lng: 131.044};
		var map = new google.maps.Map(document.getElementById("map"), {
			zoom: 4,
			center: location
		});
	}
</script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbEI_WGrAwgYo4Os13np41FNOnn4SiTCI&callback=initMap"
  type="text/javascript"></script>
</body>
</html>