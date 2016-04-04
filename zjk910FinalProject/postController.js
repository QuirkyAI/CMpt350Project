		function formSlide(formID){
			var temp = "#";
			var temp2 = temp.concat(formID);
			 $(temp2).slideToggle();
		}

		function logGame($scope , $http){

			var json = {'game_title': document.getElementById("gameTitle").value,
						'release_year': document.getElementById("gameReleaseYear").value,
						'publisher' : document.getElementById("gamePublisher").value,
						'developer' : document.getElementById("gameDeveloper").value,
						'budget': document.getElementById("gameBudget").value };
			console.log( json);
			$http.post('http://localhost/api.php/games', json);
		}

		function logGameSystemGame($scope , $http){
			var json = {'game_title': document.getElementById("gameSystemGameTitle").value,
						'release_year': document.getElementById("gameSystemGameReleaseYear").value,
						'system': document.getElementById("gameSystem").value};
			console.log( json);
			$http.post('http://localhost/api.php/game_systems', json);
		}

		function logGameRegionGame($scope , $http){
			var json = {'game_title': document.getElementById("gameRegionGameTitle").value,
						'release_year': document.getElementById("gameRegionGameReleaseYear").value,
						'region': document.getElementById("gameRegion").value};
			console.log( json);
			$http.post('http://localhost/api.php/game_regions', json);
		}
		function logGameTag($scope , $http){
			var json = {'game_title': document.getElementById("gameTagGameTitle").value,
						'release_year': document.getElementById("gameTagGameReleaseYear").value,
						'tag': document.getElementById("gameTag").value};
			console.log( json);
			$http.post('http://localhost/api.php/game_tags', json);
		}
		function logPublisher($scope , $http){
			var json = {'publisher_name':document.getElementById("publisherName").value,
						'founding_year': document.getElementById("publisherFoundingYear").value,
						'final_year': document.getElementById("publisherFinalYear").value,
						'hq_region':document.getElementById("publisherHQ").value};

			console.log(json);
			$http.post('http://localhost/api.php/publisher', json);
		}

			function logDeveloper($scope , $http){
			var json = {'publisher_name':document.getElementById("developerName").value,
						'founding_year': document.getElementById("developerFoundingYear").value,
						'final_year': document.getElementById("developerFinalYear").value,
						'hq_region':document.getElementById("developerHQ").value};

			console.log(json);
			$http.post('http://localhost/api.php/developer', json);
		}

		function logSales($scope , $http){
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