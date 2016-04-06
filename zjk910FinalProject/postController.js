		function formSlide(formID){
			var temp = "#";
			var temp2 = temp.concat(formID);
			 $(temp2).slideToggle();
		}

var postApp =angular.module('postApp', [])
  postApp.controller('postController', function ($scope, $http) {
		$scope.game = function logGame(){

			var json = {'game_title':  encodeURI(document.getElementById("gameTitle").value),
						'release_year':  encodeURI(document.getElementById("gameReleaseYear").value),
						'publisher' :  encodeURI(document.getElementById("gamePublisher").value),
						'developer' :  encodeURI(document.getElementById("gameDeveloper").value),
						'budget':  encodeURI(document.getElementById("gameBudget").value) };
			console.log( json);
			$http.post('http://localhost/api.php/games', json);
		}

		$scope.gameSys =function logGameSystemGame(){
			var json = {'game_title':  encodeURI(document.getElementById("gameSystemGameTitle").value),
						'release_year':  encodeURI(document.getElementById("gameSystemGameReleaseYear").value),
						'system':  encodeURI(document.getElementById("gameSystem").value)};
			console.log( json);
			$http.post('http://localhost/api.php/game_systems', json);
		}

		$scope.gameReg =function logGameRegionGame(){
			var json = {'game_title':  encodeURI(document.getElementById("gameRegionGameTitle").value),
						'release_year':  encodeURI(document.getElementById("gameRegionGameReleaseYear").value),
						'region':  encodeURI(document.getElementById("gameRegion").value)};
			console.log( json);
			$http.post('http://localhost/api.php/game_regions', json);
		}
		$scope.gameTag =function logGameTag(){
			var json = {'game_title':  encodeURI(document.getElementById("gameTagGameTitle").value),
						'release_year':  encodeURI(document.getElementById("gameTagGameReleaseYear").value),
						'tag':  encodeURI(document.getElementById("gameTag").value)};
			console.log( json);
			$http.post('http://localhost/api.php/game_tags', json);
		}
		$scope.gamePub =function logPublisher(){
			var json = {'publisher': encodeURI(document.getElementById("publisherName").value),
						'founding_year':  encodeURI(document.getElementById("publisherFoundingYear").value),
						'final_year':  encodeURI(document.getElementById("publisherFinalYear").value),
						'hq_region': encodeURI(document.getElementById("publisherHQ").value)};

			console.log(json);
			$http.post('http://localhost/api.php/publishers', json);
		}

		$scope.gameDev =function logDeveloper(){
			var json = {'developer': encodeURI(document.getElementById("developerName").value),
						'founding_year':  encodeURI(document.getElementById("developerFoundingYear").value),
						'final_year':  encodeURI(document.getElementById("developerFinalYear").value),
						'hq_region': encodeURI(document.getElementById("developerHQ").value)};

			console.log(json);
			$http.post('http://localhost/api.php/developers', json);
		}

		$scope.gameSale =function logSales(){
			var json = {'game_title' :  encodeURI(document.getElementById("salesGameTitle").value),
				'release_year' :  encodeURI(document.getElementById("salesGameReleaseYear").value),
				'price' :  encodeURI(document.getElementById("salesPrice").value),
				'system': encodeURI(document.getElementById("salesSystem").value),
				'units' : encodeURI(document.getElementById("saleUnits").value),
				'last_update' :  encodeURI(document.getElementById("salesUpdate").value),
				'organization' :  encodeURI(document.getElementById("salesOrginization").value),
				'region' :  encodeURI(document.getElementById("salesRegion").value)};
			console.log(json);
			$http.post('http://localhost/api.php/sales', json);

			
		}
	})