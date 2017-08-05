angular.module('starter.controllers', [])

.controller('DashCtrl', function($scope,MapService) {
      // Set the global API key

 $scope.$watch('$viewContentLoaded', function(){
 
     L.Mapzen.apiKey = "mapzen-M6Sq5AM";

      // Add a map to the #map div
      // Center on the Pigott building at Seattle University
        $scope.map = L.Mapzen.map("map", {
        center: ['23.7231','90.4086'],
        zoom: 16,
      });

var marker = L.marker(new L.LatLng('23.7231','90.4086'), {
    draggable: true
})
.bindPopup('Circle marker draggable')
.addTo($scope.map);
marker.on("drag", function(e) {
    var marker = e.target;
    var position = marker.getLatLng();

    console.log(position.lat);
    $scope.map.panTo(new L.LatLng(position.lat, position.lng));
});
      // Disable autocomplete and set parameters for the search query
      var geocoderOptions = {
        autocomplete: true,
        expanded: true,
        params: {
          sources: 'wof'
        }
      };

      // Add the geocoder to the map, set parameters for geocoder options
     $scope.geocoder = L.Mapzen.geocoder(geocoderOptions);
     $scope.geocoder.addTo($scope.map);
		 $scope.geocoder.addTo($scope.map).on('select', function (data) {
		  console.log(data);
		}); 
 });


})

.controller('SpotCtrl', function($scope, Chats) {
  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //
  //$scope.$on('$ionicView.enter', function(e) {
  //});

  $scope.chats = Chats.all();
  $scope.remove = function(chat) {
    Chats.remove(chat);
  };
})

.controller('ChatDetailCtrl', function($scope, $stateParams, Chats) {
  $scope.chat = Chats.get($stateParams.chatId);
})

.controller('SpotDetailCtrl', function($scope, $stateParams, Chats) {
  $scope.chat = Chats.get($stateParams.chatId);
})



.controller('TestCtrl', function($scope, $stateParams) {
  
})

.controller('WishCtrl', function($scope) {

 $scope.wishlist = [{
    id: 0,
    name: 'Bisana kandi',
    location: 'Sylhet',
    temp:'26',
    face: 'img/place/bisanakandi.jpg'
  },
{
    id: 2,
    name: 'Sajek',
    location: 'Khagrachori',
    temp:'32',
    hum:'32',
    face: 'img/bisana/2.jpg'
  }


  ];



})
  .controller('LoginCtrl', function($scope,$state) {
    $scope.loginName = '';
    $scope.loginPassword = '';
    $scope.init = function(){};
    $scope.login = function(){
      console.log($scope.loginName);
      console.log($scope.loginPassword);
      if($scope.loginName =='admin'&&$scope.loginPassword =='admin'){
        $state.go("tab.dash");
      }
    }
  })

  .controller('SetupCtrl', function($scope) {
    //TODO
  })
  .controller('TraceCtrl', function($scope) {
    $scope.settings={};
    $scope.settings.enableFriends=true;
  })

;
