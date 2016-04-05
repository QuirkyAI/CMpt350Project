		function formSlide(formID){
			var temp = "#";
			var temp2 = temp.concat(formID);
			 $(temp2).slideToggle();
		}

var deleteApp =angular.module('deleteApp', [])
  deleteApp.controller('deleteController', function ($scope, $http) {
		$scope.game = function logGame(){


			
			var title = document.getElementById("gameSystemGameTitle").value;
			var release_year =document.getElementById("gameSystemGameReleaseYear").value;
			var address = 'http://localhost/api.php/games';

			title = title.toLowerCase();
			release_year = release_year.toLowerCase();

			console.log(title);
			if (title != "")
			{
				address = address +"/"+title;
				if (release_year != "")
				{
					address = address +"/"+release_year;
					$http.delete(address);
				}
			}
		}

		$scope.gameSys =function logGameSystemGame(){


			var title = document.getElementById("gameSystemGameTitle").value;
			var release_year= document.getElementById("gameSystemGameReleaseYear").value;
			var game_system =document.getElementById("gameSystem").value;
			var address = 'http://localhost/api.php/game_systems';

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
						$http.delete(address);
					}
				}
			}
		}

		$scope.gameReg =function logGameRegionGame(){

			var title = document.getElementById("gameRegionGameTitle").value;
			var release_year =document.getElementById("gameRegionGameReleaseYear").value;
			var game_region =document.getElementById("gameRegion").value;
			var address = 'http://localhost/api.php/game_regions';

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
						$http.delete(address);
					}
				}
			}
		}

		
		$scope.gameTag =function logGameTag(){
			var title = document.getElementById("gameTagGameTitle").value;
			var release_year =document.getElementById("gameTagGameReleaseYear").value;
			var game_tag =document.getElementById("gameTag").value;
			var address = 'http://localhost/api.php/game_tags';

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
						$http.delete(address);
					}
				}
			}
		}
		


		$scope.gamePub =function logPublisher(){

			console.log("got here pub ");
			var address = 'http://localhost/api.php/publishers';
			var dev = document.getElementById("publisherName").value;
			dev = dev.toLowerCase();
			console.log(dev);
			if (dev != "")
			{
				console.log("here");
				address = address +"/"+dev;
				console.log(address);
				$http.delete(address);
			}
		}

		$scope.gameDev =function logDeveloper(){
			


			var address = 'http://localhost/api.php/developers';
			var dev = document.getElementById("developerName").value;
			dev = dev.toLowerCase();
			console.log(dev);
			if (dev != "")
			{
				console.log("here");
				address = address +"/"+dev;
				console.log(address);
				$http.delete(address);
			}
		}

		$scope.gameSale =function logSales(){
			var json = {'game_title' : document.getElementById("salesGameTitle").value,
				'release_year' : document.getElementById("salesGameReleaseYear").value,
				'price' : document.getElementById("salesPrice").value,
				'system':document.getElementById("salesSystem").value,
				'units' :document.getElementById("saleUnits").value,
				'last_update' : document.getElementById("salesUpdate").value,
				'organization' : document.getElementById("salesOrginization").value,
				'region' : document.getElementById("salesRegion").value};
			console.log(json);
			$http.post('http://localhost/api.php/sales', json);

			
		}
	})