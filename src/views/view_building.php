<?php
    require_once(dirname(__FILE__).'\..\db\building_repository.php');
    require_once(dirname(__FILE__).'\..\models\building.php');
    $buidlingRepository = new BuildingRepository();
    $building = $buidlingRepository->getById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../../css/baguetteBox.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="../../js/baguetteBox.min.js"></script>
    <style >
     .cover{
        height:700px;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        top: 0;
        left: 0;
     }
     .building-heading{
        width: 100%;
        text-align: center;
      }
      .information-container{
        margin:15px;
      }
      .gallery-image{
        height: 300px;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
      }
      .gallery-image-wrapper{
        width:auto;
        float:left;
      }
    </style>
</head>
<body>
<div>
    <div class="col-md-6">
     <div class="row">
          <div class="col-md-12">
              <?php
                  echo "<div  class='building-heading'><h1>" . $building->name . "</h1></div>";
              ?>
          </div>
          <div class="col-md-12">
              <?php
                  echo "<div class='information-container'><p>" . $building->description . "</p></div>";
              ?>
          </div>
      </div>       
    </div>
    <?php
        echo "<div class='cover col-md-6' style='background-image: url(" . $building->images[0] . ") '></div>";
    ?>
</div>
<?php
$location = explode(',', $building->location);
echo "<input id='lat' readonly value='".$location[0]."' />";
echo "<input id='lng' readonly value='".$location[1]."' />";
?>
<div id="map"></div>
<div class="gallery">
    <?php 
        foreach( $building->images as $image ) {
            echo "<div class='gallery-image-wrapper'><a href='".$image."'><img class='gallery-image' src='".$image."' > </a></div>";
        }
    ?>
</div>
</body>
</html>
<script>
var vHeight = $(window).height();
 $('.cover').css({"height":vHeight});
 $('#map').css({"height":vHeight});
 baguetteBox.run('.gallery');
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/leaflet/1/leaflet.css" />
<script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
<script>
(function() {

  var map = L.map('map', {
    scrollWheelZoom: false,
    zoomControl: false
  });

  var osmLayer = new L.TileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      minZoom: 1,
      maxZoom: 13,
      attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
    }
  );


  var lng = $("#lng").val();
  var lat = $("#lat").val();
  map.setView(new L.LatLng(lat,lng), 1);
  map.addLayer(osmLayer);

  var markers = [];

  var marker = L.marker({lat:lat, lng:lng});
    marker.addTo(map);
    markers.push(marker);

  var featureGroup = L.featureGroup(markers);
    map.fitBounds(featureGroup.getBounds().pad(0.5), {animate: false});
 
})();
</script>