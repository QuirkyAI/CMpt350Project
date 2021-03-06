		function formSlide(formID){
			var temp = "#";
			var temp2 = temp.concat(formID);
			 $(temp2).slideToggle();
		}

var modifyApp =angular.module('modifyApp', [])
  modifyApp.controller('modifyController', function ($scope, $http) {
		$scope.game = function logGame(){


			
			var title = encodeURI(document.getElementById("gameTitle").value);
			var release_year = encodeURI(document.getElementById("gameReleaseYear").value);
			var address = 'api.php/games';

			title = title.toLowerCase();
			release_year = release_year.toLowerCase();

			console.log(title);
			if (title != "")
			{
				address = address +"/"+title;
				if (release_year != "")
				{
					address = address +"/"+release_year;
					var json = {'game_title': (document.getElementById("gameTitle").value),
						'release_year': (document.getElementById("gameReleaseYear").value),
						'publisher' : (document.getElementById("gamePublisher").value),
						'developer' : (document.getElementById("gameDeveloper").value),
						'budget': (document.getElementById("gameBudget").value) };
					$http.put(address,json);
				}
			}
		}

		$scope.gameSys =function logGameSystemGame(){


			var title = encodeURI(document.getElementById("gameSystemGameTitle").value);
			var release_year =encodeURI(document.getElementById("gameSystemGameReleaseYear").value);
			var game_system =encodeURI(document.getElementById("gameSystem").value);
			var address = 'api.php/games_systems';

			title = title.toLowerCase();
			release_year = release_year.toLowerCase();
			game_system = game_system.toLowerCase();

			console.log(title);
			if (title != "")
			{
				address = address +"/"+title;
				if (release_year != "")
				{
					address = address +"/"+release_year;
					if (game_system != "")
					{
						address = address +"/"+game_system;
						var json = {'game_title': (document.getElementById("gameSystemGameTitle").value),
						'release_year': (document.getElementById("gameSystemGameReleaseYear").value),
						'sys': (document.getElementById("gameSystem").value)};
						$http.put(address,json);
					}
				}
			}
		}

		$scope.gameReg =function logGameRegionGame(){

			var title = encodeURI(document.getElementById("gameRegionGameTitle").value);
			var release_year= encodeURI(document.getElementById("gameRegionGameReleaseYear").value);
			var game_region =encodeURI(document.getElementById("gameRegion").value);
			var address = 'api.php/game_regions';

			title = title.toLowerCase();
			release_year = release_year.toLowerCase();
			game_region = game_region.toLowerCase();

			console.log(title);
			if (title != "")
			{
				address = address +"/"+title;
				if (release_year != "")
				{
					address = address +"/"+release_year;
					if (game_region != "")
					{
						address = address +"/"+game_region;
						var json = {'game_title': (document.getElementById("gameRegionGameTitle").value),
						'release_year':  (document.getElementById("gameRegionGameReleaseYear").value),
						'region': (document.getElementById("gameRegion").value)};

						$http.put(address,json);
					}
				}
			}
		}

		$scope.gameTag =function logGameTag(){
			var title = encodeURI(document.getElementById("gameTagGameTitle").value);
			var release_year =encodeURI(document.getElementById("gameTagGameReleaseYear").value);
			var game_tag =encodeURI(document.getElementById("gameTag").value);
			var address = 'api.php/game_tags';

			title = title.toLowerCase();
			release_year = release_year.toLowerCase();
			game_tag = game_tag.toLowerCase();

			console.log(title);
			if (title != "")
			{
				address = address +"/"+title;
				if (release_year != "")
				{
					address = address +"/"+release_year;
					if (game_tag != "")
					{
						address = address +"/"+game_tag;
						var json = {'game_title': (document.getElementById("gameTagGameTitle").value),
						'release_year': (document.getElementById("gameTagGameReleaseYear").value),
						'tag': (document.getElementById("gameTag").value)};
						$http.put(address,json);
					}
				}
			}
		}
		


		$scope.gamePub =function logPublisher(){

			console.log("got here pub ");
			var address = 'api.php/publishers';
			var dev = encodeURI(document.getElementById("publisherName").value);
			dev = dev.toLowerCase();
			console.log(dev);
			if (dev != "")
			{
				console.log("here");
				address = address +"/"+dev;
				console.log(address);
				var json = {'publisher':(document.getElementById("publisherName").value),
						'founding_year': (document.getElementById("publisherFoundingYear").value),
						'final_year': (document.getElementById("publisherFinalYear").value),
						'hq_region':(document.getElementById("publisherHQ").value)};

				$http.put(address,json);
			}
		}

		$scope.gameDev =function logDeveloper(){
			


			var address = 'api.php/developers';
			var dev = encodeURI(document.getElementById("developerName").value);
			dev = dev.toLowerCase();
			console.log(dev);
			if (dev != "")
			{
				console.log("here");
				address = address +"/"+dev;
				console.log(address);
				var json = {'developer':(document.getElementById("developerName").value),
						'founding_year': (document.getElementById("developerFoundingYear").value),
						'final_year': (document.getElementById("developerFinalYear").value),
						'hq_region':(document.getElementById("developerHQ").value)};

				$http.put(address,json);
			}
		}

		$scope.gameSale =function logSales(){
			var json = {'game_title' : (document.getElementById("salesGameTitle").value),
				'release_year' : (document.getElementById("salesGameReleaseYear").value),
				'price' : (document.getElementById("salesPrice").value),
				'system':(document.getElementById("salesSystem").value),
				'units' :(document.getElementById("saleUnits").value),
				'last_update' : (document.getElementById("salesUpdate").value),
				'organization' : (document.getElementById("salesOrginization").value),
				'region' : (document.getElementById("salesRegion").value)};
			console.log(json);

			var game_title = encodeURI(document.getElementById("salesGameTitle").value);
			var release_year = encodeURI(document.getElementById("salesGameReleaseYear").value);
			var price = encodeURI(document.getElementById("salesPrice").value);
			var system =encodeURI(document.getElementById("salesSystem").value);
			var organization = encodeURI(document.getElementById("salesOrginization").value);

			game_title = game_title.toLowerCase();
			release_year = release_year.toLowerCase();
			price = price.toLowerCase();
			system = system.toLowerCase();
			organization = organization.toLowerCase();

			var address = 'api.php/sales';

			if( game_title != "")
			{
				address = address + "/" + game_title;
				if( release_year != "")
				{
					address = address + "/" + release_year;
					if( price != "")
					{
						address = address + "/" + price;
						if( system != "")
						{
							address = address + "/" + system;
							if( organization != "")
							{
								address = address + "/" + organization;
								$http.put(address,json);
							}
						}

					}
				}
			}
		}	
	})
