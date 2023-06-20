<!DOCTYPE html>
<html>
  <head>
      <style>
          #map {
            height: 610px;
            /* height: 100%; */
            width: 100%;
           }
        </style>
  </head>
  <body>


    <div id="map"></div>
    <script src="{{asset('/js/map.js')}}" defer></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2FpvKQuiGCw8oo-mxFPy26L0H9qViZto&callback=initMap">
    </script>
  </body>
</html>