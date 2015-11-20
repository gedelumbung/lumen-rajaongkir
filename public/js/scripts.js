var app = angular.module('App', ['angucomplete-alt']).controller('OngkirCtrl', ['$scope', 'rajaOngkirService',
	function($scope, $rajaOngkirService) {

		$scope.loading = true;

		$rajaOngkirService.getCities().then(function(response) {
			$scope.cities = response.data.rajaongkir.results;
			$scope.loading = false;
		});

		$scope.postOngkir = function(){
			$scope.loading = true;
			var params = {
				'origin' : $scope.selectedOrigin.originalObject.city_id,
				'destination' : $scope.selectedDestination.originalObject.city_id,
				'weight' : $scope.weight
			};
			$rajaOngkirService.postOngkir(params).then(function(response) {
				$scope.results = response.data.rajaongkir.results;
				$scope.loading = false;
			});
		};
	 
	}
]);