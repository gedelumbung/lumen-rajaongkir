app.service('rajaOngkirService', ['$http',
	function($http) {
		'use strict';
		var base = 'http://berita.dev/api/';
		this.getCities = function() {
			return $http({
				method: 'GET',
				url: base+'cities'
			})
				.success(function(data) {
					return data;
				})
				.error(function(data) {
					return data;
				});
		};

		this.postOngkir = function(param) {
			return $http({
				method: 'POST',
				url: base+'cost',
				data: param,
				headers: {
					'Content-Type': 'application/json'
				}
			})
				.success(function(data) {
					return data;
				})
				.error(function(data) {
					return data;
				});
		};

		return this;
	}
]);