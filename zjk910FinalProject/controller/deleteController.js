		function formSlide(formID){
			var temp = "#";
			var temp2 = temp.concat(formID);
			 $(temp2).slideToggle();
		}

var deleteApp =angular.module('deleteApp', [])
  deleteApp.controller('deleteController', function ($scope, $http) {
		$scope.game = function logGame(){


			
			var title = document.getElementById("gameTitle").value;
			var release_year =document.getElementById("gameReleaseYear").value;
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
					console.log(address);
					$http.delete(encodeURI(address));
				}
			}
		}

		$scope.gameSys =function logGameSystemGame(){


			var title = document.getElementById("gameSystemGameTitle").value;
			var release_year= document.getElementById("gameSystemGameReleaseYear").value;
			var game_system =document.getElementById("gameSystem").value;
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
						$http.delete(encodeURI(address));
					}
				}
			}
		}

		$scope.gameReg =function logGameRegionGame(){

			var title = document.getElementById("gameRegionGameTitle").value;
			var release_year =document.getElementById("gameRegionGameReleaseYear").value;
			var game_region =document.getElementById("gameRegion").value;
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
						$http.delete(encodeURI(address));
					}
				}
			}
		}

		
		$scope.gameTag =function logGameTag(){
			var title = document.getElementById("gameTagGameTitle").value;
			var release_year =document.getElementById("gameTagGameReleaseYear").value;
			var game_tag =document.getElementById("gameTag").value;
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
						$http.delete(encodeURI(address));
					}
				}
			}
		}
		


		$scope.gamePub =function logPublisher(){

			console.log("got here pub ");
			var address = 'api.php/publishers';
			var dev = document.getElementById("publisherName").value;
			dev = dev.toLowerCase();
			console.log(dev);
			if (dev != "")
			{
				console.log("here");
				address = address +"/"+dev;
				console.log(address);
				$http.delete(encodeURI(address));
			}
		}

		$scope.gameDev =function logDeveloper(){
			


			var address = 'api.php/developers';
			var dev = document.getElementById("developerName").value;
			dev = dev.toLowerCase();
			console.log(dev);
			if (dev != "")
			{
				console.log("here");
				address = address +"/"+dev;
				console.log(address);
				$http.delete(encodeURI(address));
			}
		}

		$scope.gameSale =function logSales(){

			var game_title = document.getElementById("salesGameTitle").value;
			var release_year = document.getElementById("salesGameReleaseYear").value;
			var price = document.getElementById("salesPrice").value;
			var system =document.getElementById("salesSystem").value;
			var organization = document.getElementById("salesOrginization").value;

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
								$http.delete(encodeURI(address));
							}
						}

					}
				}
			}

			
		}
	})