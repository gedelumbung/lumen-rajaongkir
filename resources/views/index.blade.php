<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Lumen - RajaOngkir</title>

    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/ngAutocomplete/angucomplete-alt.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body ng-app="App">

    <div class="container" ng-controller="OngkirCtrl">
      <div class="loading" ng-show="loading">Loading&#8230;</div>
      <form class="form-signin" ng-submit="postOngkir()">
        <h2 class="form-signin-heading">Lumen - RajaOngkir</h2>
        <label for="origin" class="sr-only">Origin</label>
        <div class="padded-row">
          <div angucomplete-alt id="ex2" placeholder="Origin - Search city" pause="100" selected-object="selectedOrigin" local-data="cities" search-fields="city_name" title-field="city_name" description-field="twitter" image-field="pic" minlength="1" input-class="form-control form-control-small" match-class="highlight">
          </div>
        </div>
        <label for="destination" class="sr-only">Destination</label>
        <div class="padded-row">
          <div angucomplete-alt id="ex2" placeholder="Destination - Search city" pause="100" selected-object="selectedDestination" local-data="cities" search-fields="city_name" title-field="city_name" description-field="twitter" image-field="pic" minlength="1" input-class="form-control form-control-small" match-class="highlight">
          </div>
        </div>
        <label for="weight" class="sr-only">Weight</label>
        <input type="text" id="weight" class="form-control" ng-model="weight" placeholder="Weight" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Check</button>
      </form>
      <table class="table" ng-if="results.length > 0">
        <thead>
          <tr>
            <th>#</th>
            <th>Kurir</th>
            <th>Ongkos Kirim</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="result in results">
            <th scope="row" ng-bind="$index+1"></th>
            <td ng-bind="result.name"></td>
            <td>
              <table class="table" ng-if="results.length > 0">
                <thead>
                  <tr>
                    <th>Service</th>
                    <th>Ongkos Kirim</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="item in result.costs">
                    <td ng-bind="item.service"></td>
                    <td>
                      <ul>
                        <li ng-repeat="cost in item.cost">Rp. {{cost.value}} | Estimasi : {{cost.etd}} hari</li>
                      </ul>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bower_components/angular/angular.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/service/rajaongkir.service.js"></script>
    <script src="bower_components/ngAutocomplete/angucomplete-alt.js"></script>
  </body>
</html>
