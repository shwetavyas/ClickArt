<!DOCTYPE html>
<html>
  <head>
    <title>Art Galleries</title>
    
    <meta charset="utf-8">
    <style>
      html, body{
        height: 100%;
        margin: 0px;
        padding: 0px;
        
      }
      #map-canvas{
        width: 800px;
        height: 450px;
        margin-left: 20%;
        margin-top: 5%;
      }
      #map_canvas {
     height: 100%;
     }
    </style>
    <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>-->
    <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>-->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <link href="css/main.css" rel="stylesheet"> 
    <script>

var map;
var infowindow;

function initialize() {

  var mapOptions = {
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
  

  navigator.geolocation.getCurrentPosition(function(position){
  
        var pyrmont = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

        map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: pyrmont,
          zoom: 12
        });

        var myCity = new google.maps.Circle({
  center:pyrmont,
  radius:8046, //5miles
  strokeColor:"#0000FF",
  strokeOpacity:0.8,
  strokeWeight:2,
  fillColor:"#0000FF",
  fillOpacity:0.4
  });

myCity.setMap(map);

        var request = {
    location: pyrmont,
    radius: '500',
    types: ['art_gallery'] //fetch art galleries
  };

  infowindow = new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch(request, callback);

  //map.setCenter(pyrmont);
});
}
function callback(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }
  }
}

function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

//google.maps.event.addDomListener(window, 'load', initialize);

    </script>



    <?php
        require_once('startsession.php');
        require_once('headerTopArtlover.php');
        require_once('header.php');
        require_once('headerMiddleArtlover.php');
        
    ?>
  </head>
  <body onload="initialize()">
    <div id="map-canvas" width='100' height='100'></div>
    <hr/>
     <p class="pull-left" style="color:white">&nbsp &nbspCopyright &copy;2015 IT354 Project.</p>
          <p class="pull-right" style="color:white">Developed by <span>Nikunj <a href="http://www.linkedin.com/in/nikunjr" target="_blank"><i class="fa fa-linkedin"></i></a> and Shweta <a href="https://www.linkedin.com/in/svyas1" target="_blank"><i class="fa fa-linkedin"></i></a>&nbsp &nbsp&nbsp </span></p>
  </body>


  <style>
    body{
      background-color: black;
    }
  </style>
</html>