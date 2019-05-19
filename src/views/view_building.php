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
    <link rel="stylesheet" href="../../css/baguette_box.min.css">    
	<link rel="stylesheet" href="../../css/view_building.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/leaflet/1/leaflet.css" />

	<script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="../../js/baguette_box.min.js"></script>
</head>
<body>
    <div class="wrapper">
		<div class="container">
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
    </div>    
	<?php
		$location = explode(',', $building->location);
		echo "<input id='lat' readonly value='".$location[0]."' />";
		echo "<input id='lng' readonly value='".$location[1]."' />";
	?>
	<div id="map"></div>
	<div class="gallery row">
		<?php 
			foreach( $building->images as $image ) {
				echo "<a class='col-md-3 image-wrapper' href='".$image."'><img class='gallery-image' src='".$image."' > </a>";
			}
		?>
	</div>
    <script src="../../js/view_building.js"></script>
</body>
</html>
