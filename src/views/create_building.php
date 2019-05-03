<?php

  session_start();
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false){
    header('Location: home.php');
  } 
    require_once(dirname(__FILE__).'\..\models\building.php');
    require_once(dirname(__FILE__).'\..\db\building_repository.php');
    require_once(dirname(__FILE__).'\utilities\image_utilities.php');

    $nameErr = $locationErr = $descriptionErr = $imagesErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buidlingRepository = new BuildingRepository();
    $image_utilities = new ImageUtilities();

    if (validateForm()) {
        $countfiles = count($_FILES['image']['name']);
        $images = array();
        for ($i = 0; $i < $countfiles; $i++) {
            $image = $_FILES['image']['name'][$i];
            $target_file = $image_utilities->getTargetFileName($image);
            move_uploaded_file($_FILES['image']['tmp_name'][$i], $target_file);
            array_push($images, $target_file);
        }

        $building = new Building(0, $_POST['name'], $_POST['location'], $_POST['description'], $images);
        $buidlingRepository->add($building);

        header('Location: home.php');
    }
}

function validateForm() : bool
{
    global $nameErr, $locationErr, $descriptionErr, $imagesErr;
    $valid = true;

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $valid = false;
    }
    if (empty($_POST["location"])) {
        $locationErr = "Location is required";
        $valid = false;
    }
    if (empty($_POST["description"])) {
        $descriptionErr = "Description is required";
        $valid = false;
    }
    if (!array_filter($_FILES["image"]["name"])) {
        $imagesErr = "Images are required";
        $valid = false;
    }

    return $valid;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    
    <script src="../../js/fileinput.min.js"></script>
    <link rel="stylesheet" href="../../css/fileinput.min.css">
    <style>
        .error { color: #FF0000; }
        #map { height: 300px; margin-bottom:10px; z-index:0; }
    </style>
</head>
<body>
    <div class="row centered-form center-block">
        <div class="container col-md-6 col-md-offset-3">
            <h1>Create a buidling</h1>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <span class="error">* <?php echo $nameErr;?></span>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Building name">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <span class="error">* <?php echo $locationErr;?></span>
                    <input type="text" class="form-control" id="locationInput" placeholder="Building location">
                    <input type="hidden" name="location" class="form-control" id="location" >
                </div>
                <div id="map"></div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <span class="error">* <?php echo $descriptionErr;?></span>
                    <textarea name="description" class="form-control" id="description" placeholder="Building description"></textarea>
                </div>
                <div class="form-group">
                    <label for="images">Images</label>
                    <span class="error">* <?php echo $imagesErr;?></span>
                    <input id="images" type="file" name="image[]" multiple/>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
<script>
    $(document).ready(function () {
        $("#images").fileinput({
            showUpload: false
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/leaflet/1/leaflet.css" />
<script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
<script>
(function() {
  var placesAutocomplete = places({
    appId: 'plY79MGQ3R5U',
    apiKey: '556e9569d373015727a1a371481c4b09',
    container: document.querySelector('#locationInput')
  });

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

  var markers = [];

  map.setView(new L.LatLng(0, 0), 1);
  map.addLayer(osmLayer);

  placesAutocomplete.on('suggestions', handleOnSuggestions);
  placesAutocomplete.on('cursorchanged', handleOnCursorchanged);
  placesAutocomplete.on('change', handleOnChange);
  placesAutocomplete.on('clear', handleOnClear);

  function handleOnSuggestions(e) {
    markers.forEach(removeMarker);
    markers = [];

    if (e.suggestions.length === 0) {
      map.setView(new L.LatLng(0, 0), 1);
      return;
    }

    e.suggestions.forEach(addMarker);
    findBestZoom();
  }

  function handleOnChange(e) {
    markers
      .forEach(function(marker, markerIndex) {
        if (markerIndex === e.suggestionIndex) {
          markers = [marker];
          marker.setOpacity(1);
          findBestZoom();
        $("#location").val(marker._latlng.lat+","+marker._latlng.lng);
        } else {
          removeMarker(marker);
        }
      });
  }

  function handleOnClear() {
    map.setView(new L.LatLng(0, 0), 1);
    markers.forEach(removeMarker);
  }

  function handleOnCursorchanged(e) {
    markers
      .forEach(function(marker, markerIndex) {
        if (markerIndex === e.suggestionIndex) {
          marker.setOpacity(1);
          marker.setZIndexOffset(1000);
        } else {
          marker.setZIndexOffset(0);
          marker.setOpacity(0.5);
        }
      });
  }

  function addMarker(suggestion) {
    var marker = L.marker(suggestion.latlng, {opacity: .4});
    marker.addTo(map);
    markers.push(marker);
  }

  function removeMarker(marker) {
    map.removeLayer(marker);
  }

  function findBestZoom() {
    var featureGroup = L.featureGroup(markers);
    map.fitBounds(featureGroup.getBounds().pad(0.5), {animate: false});
  }
})();
</script>
</html>