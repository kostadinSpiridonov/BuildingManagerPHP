<?php
	require_once(dirname(__FILE__).'\..\managers\create_building_manager.php');
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
	<script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
    <script src="../../js/file_input.min.js"></script>
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/leaflet/1/leaflet.css" />
    <link rel="stylesheet" href="../../css/file_input.min.css">
    <link rel="stylesheet" href="../../css/create_building.css">
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
	
    <script src="../../js/create_building.js"></script>
</body>
</html>