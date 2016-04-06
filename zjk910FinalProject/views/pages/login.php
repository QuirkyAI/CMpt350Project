<?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->
	<head>
    <title>Geolocation</title>
    <style>
      #map {
        width: 40em;
        height: 30em;
		margin-left: auto;
		margin-right:auto;
      }
    </style>
	    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="610349580962-vpj2aogr7nf2ndb3bg7ecfuae6qn1lei.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>
	<h2 align="center">You are Currently Logged in From</h1>
    <div id="map"></div>
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
            infoWindow.setContent('Your Location.');
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
	<br>
	<p>	We don't store this data, this is just to ensure our website is correctly working. Please contact the web administrator if you are displaying incorrect location data, as it may be an indicator of the site being compromised.</p>
	<h2 align="center">Hello and welcome!</h1>
	<p>	You are currently viewing version 1.0 of our Game Sales Database project. This version was deployed on April 3rd, 2016.</p>
	<p>	The purpose of this application is to store data to track video game sales. Currently this website's purpose is only to store this information to assist analysts and enthusiasts in researching the sales of video games. You can contact the website administrator (email at the bottom) if you wish to gain further access to the data for school projects, marketing estimates, or any other purpose.</p>
	<br>
	<h2 align="center">The Purpose for this Site</h1>
	<p>	To many people, it may seem odd or useless to track video game purchases across the globe. I mean, it's just video games, right? And the companies are pretty upfront about their sales, right? And these companies are in business to make money, so of course they'll make the best decisions about their products, right? And as a company serving gamers, you would think they have their finger on the pulse of the gaming community across the globe?</p>
	<p>	Right?</p>
	<p>	Well, the answers to most of those questions is a firm "Nope" in our books.</p>
	<p>	To start, while video games are mainly used for enterainment purposes, we believe that there is a stronger power that video games have that makes them very different from other entertainment media: Agency. When you play a game, everything that happens during gameplay is influenced by you or up to you to handle. This leads to stronger connection and engagement with the work because of the agency afforded to the player. Playing Silent Hill 2 is considered so terrifying because it is up to the player to keep the protagonist alive throughout the horrors of the game. Playing Call of Duty is so exciting because it is up to the player to fight and win in the events the game throws at them. This ability to engage a player is can be far stronger than in other media, such as film or books, and this engagement has the potential to create advances in physical rehabilitation, education techniques, and training simulations. So to us, video games represent a potential gold mine of new techniques to help us grow as individuals in a healthier environment.</p>
	<p>	As for the company sales, not so much. Mainly we only know what video game publishers announce. Accounting records (such as income statements, balance sheets, etc.) only need to show these amounts in total value, not the number of units sold. Even if these are available from the publisher, gaining up-to-date information is incredibly value for investors, especially ones with interests in particular regions. And without some deep research it can be difficult to find out where popular games sell, what kinds of games sell, or the probability of financial success from both publishers and developers (based on historical data). So, this website is to keep track of the sales from individual retailers and distributors to help keep track of this important marketing data.</p>
	<p>	Third, it has been seen time and time again that while these publishers are in business to make money, they are becoming more out-of-touch with their audience as the years drag on. Famous publisher Electronic Arts has made several odd decisions in the past, such as inputting microstransactions and free-to-play business models into $60 single-player games on release (such as Dragon Age: Inquisition, and Dead Space 3). Many triple-A publishers such as Electronic Arts (Capcom, SEGA, 2K, Ubisoft) have been having issues with their demographic recently, with critics giving lower and lower ratings in longstanding franchises as publishers continue to add sketchier business models to their products. This website will hopefully allow for another method in which to corroborate their anouncements.</p>
	<p>	As for keeping their finger on the pulse of the gaming community, it appears that this is not the case. The Dead Space franchise (a survival-horror game with some third-person shooting mechanics about fighting zombies in space) effectively died with Dead Space 3, the third game in franchise. There are many possible reasons for this, such as the added microstransactions into a $60 product (it was one of the first to do this), the transistion from a survial horror game to cooperative shooter (alienating fans of the franchise in favor of other demographics with less interest), and the unachievable sales target of 5,000,000 units (the other two games sold around half that each). Resident Evil 6 was a critical failure. Games in long-standing franchises are consistently compared to their priors, and often found lacking. Even long-standing franchises such as the EA Sports games appear to be taking out features rather than adding any in.</p>
	<p>	So, to see the effects of these products on the larger market, and to see the financial success or failure of these products, we created this application to hopefully allow users to keep a closer eye on the workings of the games industry. We don't expect you to completely trust our data - our users can add and update a lot of content - but we hope that it gives you a better view of the video game industry and the financial working of the gaming community. If we can encourage better behavior from just one publisher, and improve their consumer relations, we will consider our website a success.</p>
  </body>
<?php else: ?>     <!-- Before login --> 
		<div class="container">
		<h1>NOT CONNECTED! YOU MUST LOG IN TO ACCESS THIS WEBSITE</h1>
		<h2 align="center"><a href="fbconfig.php">Login with Facebook</a></h2>
		</div>
<?php endif ?>