
<p>You successfully landed on the home page. Congrats! We just wanted to show you your current location as a quick test of our new integration of Google + maps. If it is not showing the correct location, this site may be compromised, so contact an administrator if that occurs.</p>

<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        width: 500px;
        height: 400px;
      }
    </style>
	    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="610349580962-vpj2aogr7nf2ndb3bg7ecfuae6qn1lei.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>
	<div class="form">
    <div id="map"></div>
	</div>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Your current location.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwyjhnYYRviJuRs7CL30cMNL1F6G7OfLw&callback=initMap">
    </script>
  </body>
</html>