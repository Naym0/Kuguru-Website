
<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {
        width: 100%;
        height: 400px;
        background-color: grey;
      }
    </style>
  </head>
  <body>
  
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var nairobi = {lat: -1.3028618, lng: 36.707308};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: nairobi});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: nairobi, map: map});
}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNSoQjlA-lhdRiS3sT9XphPFbnu7GZgso&callback=initMap">
    </script>
  </body>
</html>