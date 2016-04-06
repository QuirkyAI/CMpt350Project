		function formSlide(formID){
			var temp = "#";
			var temp2 = temp.concat(formID);
			 $(temp2).slideToggle();
		}

var getApp =angular.module('getApp', [])
  getApp.controller('getController', function ($scope, $http) {
		$scope.game = function logGame(){


			
			var title = document.getElementById("gameSystemGameTitle").value;
			var release_year = document.getElementById("gameSystemGameReleaseYear").value;
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
				}
			}
			$http.get(address)
			.then(function(response) {
				var retString = "";
				if(response.data.length === undefined)
				{
					retString = retString + "Game Title: "+ response.data.game_title+ "   Release Year:" + response.data.release_year+ "   Publisher:" + response.data.publisher + "   Developer:" + response.data.developer +"   Budget:" + response.data.budget +"\n";
				}
				else{
					for (i = 0; i < response.data.length; i++){
						retString = retString + "Game Title: "+ response.data[i].game_title+ "   Release Year:" + response.data[i].release_year+ "   Publisher:" + response.data[i].publisher + "   Developer:" + response.data[i].developer +"   Budget:" + response.data[i].budget +"\n";
					}
				}
     			document.getElementById("gameTextarea").value = retString;
  			});
		}

		$scope.gameSys =function logGameSystemGame(){


			var title = document.getElementById("gameSystemGameTitle").value;
			var release_year =document.getElementById("gameSystemGameReleaseYear").value;
			var game_system =document.getElementById("gameSystem").value;
			var address = 'http://localhost/api.php/games_systems';

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
					}
				}
			}
			$http.get(address)
			.then(function(response) {
				var retString = "";
				if(response.data.length === undefined)
				{
					retString = retString + "Game Title: "+ response.data.game_title+ "   Release Year:" + response.data.founding_year+ "   System:" + response.data.sys +"\n";
				}
				else{
					for (i = 0; i < response.data.length; i++){
						retString = retString + "Game Title: "+ response.data[i].game_title+ "   Release Year:" + response.data[i].founding_year+ "   System:" + response.data[i].sys +"\n";
					}
				}
     			document.getElementById("gameSysTextarea").value = retString;
  			});
		}

		$scope.gameReg =function logGameRegionGame(){

			var title = document.getElementById("gameRegionGameTitle").value;
			var release_year= document.getElementById("gameRegionGameReleaseYear").value;
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
					}
				}
			}
			$http.get(address)
			.then(function(response) {
				var retString = "";
				if(response.data.length === undefined)
				{
					retString = retString + "Game Title: "+ response.data.game_title+ "   Release Year:" + response.data.founding_year+ "   Region:" + response.data.region +"\n";
				}
				else{
					for (i = 0; i < response.data.length; i++){
						retString = retString + "Game Title: "+ response.data[i].game_title+ "   Release Year:" + response.data[i].founding_year+ "   Region:" + response.data[i].region +"\n";
					}
				}
     			document.getElementById("gameRegTextarea").value = retString;
  			});
		}

		
		$scope.gameTag =function logGameTag(){
			var title = document.getElementById("gameTagGameTitle").value;
			var release_year= document.getElementById("gameTagGameReleaseYear").value;
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
					}
				}
			}
			$http.get(address)
			.then(function(response) {
				var retString = "";
				if(response.data.length === undefined)
				{
					retString = retString + "Game Title: "+ response.data.game_title+ "   Release Year:" + response.data.founding_year+ "   Tag:" + response.data.tag +"\n";
				}
				else{
					for (i = 0; i < response.data.length; i++){
						retString = retString + "Game Title: "+ response.data[i].game_title+ "   Release Year:" + response.data[i].founding_year+ "   Tag:" + response.data[i].tag +"\n";
					}
				}
     			document.getElementById("gameTagTextarea").value = retString;
  			});
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
			}
			$http.get(address)
			.then(function(response) {
				var retString = "";
				if(response.data.length === undefined)
				{
					retString = retString + "Developer: "+ response.data.publisher+ "   Founding Year:" + response.data.founding_year+ "   Final Year:" + response.data.final_year+ "   HQ Region:" + response.data.hq_region+ " " +"\n";
				}
				else{
					for (i = 0; i < response.data.length; i++){
						retString = retString + "Developer: "+ response.data[i].publisher+ "   Founding Year:" + response.data[i].founding_year+ "   Final Year:" + response.data[i].final_year+ "   HQ Region:" + response.data[i].hq_region+ " " +"\n";
					}
				}
     			document.getElementById("gamePubTextarea").value = retString;
  			});
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
			}
			$http.get(address)
			.then(function(response) {
				var retString = "";
				if(response.data.length === undefined)
				{
					retString = retString + "Developer: "+ response.data.developer+ "   Founding Year:" + response.data.founding_year+ "   Final Year:" + response.data.final_year+ "   HQ Region:" + response.data.hq_region+ " " +"\n";
				}
				else{
					for (i = 0; i < response.data.length; i++){
						retString = retString + "Developer: "+ response.data[i].developer+ "   Founding Year:" + response.data[i].founding_year+ "   Final Year:" + response.data[i].final_year+ "   HQ Region:" + response.data[i].hq_region+ " " +"\n";
					}
				}
     			document.getElementById("gameDevTextarea").value = retString;
  			});
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

			var address = 'http://localhost/api.php/sales';

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
							}
						}

					}
				}
			}

			$http.get(address)
			.then(function(response) {
				var retString = "";
				if(response.data.length === undefined)
				{
					retString = retString + "Game Title: "+ response.data.game_title+ "  Release Date:" + response.data.release_date+ "   Price:" + response.data.price+ "   System:" + response.data.system + "   Units:" + response.data.units+ "   Last Update:" + response.data.last_update+ "   Organization:" + response.data.organization+ "   Region:" + response.data.region +" " +"\n";
				}
				else{
					for (i = 0; i < response.data.length; i++){
					retString = retString + "Game Title: "+ response.data[i].game_title+ "  Release Date:" + response.data[i].release_date+ "   Price:" + response.data[i].price+ "   System:" + response.data[i].system + "   Units:" + response.data[i].units+ "   Last Update:" + response.data[i].last_update+ "   Organization:" + response.data[i].organization+ "   Region:" + response.data[i].region+ " " +"\n";
					}
				}
     			document.getElementById("gameSalesTextarea").value = retString;
  			});

			
		}

		$scope.reg=function reg(){

			var address = 'http://localhost/api.php/regions';
			console.log("here1");
			$http.get(address)
			.then(function(response) {
				var retString = "";
				if(response.data.length === undefined)
				{
					retString = retString + "Region: "+ response.data.region+ " " +"\n";
				}
				else{
					for (i = 0; i < response.data.length; i++){
						console.log("inner1");
						retString = retString + "Region: "+ response.data[i].region+ " " +"\n";
					}
				}
     			document.getElementById("gameRegionsTextarea").value = retString;
  			});
		}

		$scope.sys =function sys(){

			var address = 'http://localhost/api.php/systems';
			console.log("here2");
			$http.get(address)
			.then(function(response) {
				var retString = "";
				if(response.data.length === undefined)
				{
					retString = retString + "System: "+ response.data.sys+ " " +"\n";
				}
				else{
					for (i = 0; i < response.data.length; i++){
						console.log("inner2");
						retString = retString + "System: "+ response.data[i].sys +" " +"\n";
					}
				}
     			document.getElementById("gameSystemsTextarea").value = retString;
  			});
		}
	})