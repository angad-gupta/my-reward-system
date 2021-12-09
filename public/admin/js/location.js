var app = angular.module('locationSelector',['ngMap']);

app.controller('LocationController',function($scope, NgMap){

    $scope.error = null;

    $scope.map = {};
    $scope.address = { pos: { lat: '' , lng: '' }, location: ""};
    
    $scope.isValidGooglePlace = false;

    NgMap.getMap().then(function(map) {
        console.log('markers', map.markers);
        console.log('shapes', map.shapes);
        $scope.map = map;
    });

    function alert(type,msg){
    
        $.notify(msg,type);
    }

    $scope.getLocation = function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else { 
            alert('error',"Geolocation is not supported by this browser."); 
        }
    }

    function showPosition(pos) {
        $scope.address.pos = { lat: pos.coords.latitude , lng: pos.coords.longitude };

        console.log($scope.address.pos)

        getGoogleLocation($scope.address.pos);

    }

    function showError(error) {
        switch(error.code) {
          case error.PERMISSION_DENIED:
            alert('error',"User denied the request for Geolocation.")
            break;
          case error.POSITION_UNAVAILABLE:
            alert('error',"Location information is unavailable.")
            break;
          case error.TIMEOUT:
            alert('error',"The request to get user location timed out.")
            break;
          case error.UNKNOWN_ERROR:
            alert('error',"An unknown error occurred.")
            break;
        }
    }

    $scope.placeChanged = function () {
        $scope.address.place = this.getPlace();

        console.log($scope.address.place)

        $scope.address.Address = $scope.address.place.name +", "+ $scope.address.place.formatted_address;
        $scope.address.shortname = $scope.address.place['address_components'][0]['short_name'];

        $scope.isValidGooglePlace = true;

        $scope.map.setCenter($scope.address.place.geometry.location);
        $scope.map.markers[0].setPosition($scope.address.place.geometry.location);

        var latitude = $scope.address.place.geometry.location.lat().toPrecision(8);
        var longitude = $scope.address.place.geometry.location.lng().toPrecision(8);

        $scope.address.pos.lat = latitude;
        $scope.address.pos.lng = longitude;

        $('.locationModal').modal('show');
    };

    $scope.confirmLocation = function () {
        var type = $('#model-type').val();
      
            $('#geolocation').val($scope.address.Address);
            $('#latlong').val(JSON.stringify($scope.address.pos));
    
        $('.locationModal').modal('hide');
    }

    $scope.dragEnd = function(event) {
        $scope.address.pos = { lat: event.latLng.lat() , lng: event.latLng.lng() };
        $scope.map.setCenter($scope.address.pos);
        getGoogleLocation($scope.address.pos);
    }

    function getGoogleLocation(latlng){
        var geocoder = new google.maps.Geocoder();
        $scope.isValidGooglePlace = false;
        
        geocoder.geocode({ 'latLng': latlng }, function (results, status) {
            console.log(results,status)
            if (status == google.maps.GeocoderStatus.OK) {

                $scope.address.Address = results[0].formatted_address;

                if (results[0]) {
                    if(getCountry(results[0]) != "NP"){
                        alert('error',"We are not available in your country yet.");
                        $scope.$apply();
                        return;
                    }

                    $scope.address.shortname = results[0]['address_components'][0]['short_name'];
                    $scope.isValidGooglePlace = true;
                    
                    $scope.$apply();

                    $scope.map.setCenter(latlng);
                    $scope.map.markers[0].setPosition(latlng);
                    
                } else {
                    alert('error','Location not found');
                }
            } else {
                alert('error','Geocoder failed due to: ' + status);
            }

        });
    }

    function getCountry(results){
        
        for(var j=0;j < results.address_components.length; j++){
            for(var k=0; k < results.address_components[j].types.length; k++){
                if(results.address_components[j].types[k] == "country"){
                    return results.address_components[j].short_name;
                    
                }
            }
        }

        return '';
    }
});
