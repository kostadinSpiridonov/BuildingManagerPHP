<?php 
require_once(dirname(__FILE__).'\..\managers\authentication_manager.php');
session_start();
$loggedin = isLoggedIn();
?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../../css/home.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Buildings</h2>
                        <?php if($loggedin) echo "<a href='create_building.php' class='btn btn-default create-button'>Create building</a>"?>
                        <?php if(!$loggedin) echo "<a href='login.php' class='btn btn-default create-button'>Login</a>"?>
                    </div>
                    <?php
                    require_once(dirname(__FILE__).'\..\db\building_repository.php');
                    require_once(dirname(__FILE__).'\..\models\building.php');
                    $buidlingRepository = new BuildingRepository();
                    $buildings = $buidlingRepository->all();
                    foreach ($buildings as $building) {
                        echo "<a href='../views/view_building.php?id=".$building->id."'>";
                        echo "<div class='col-md-4 building'>";
                        echo "<div class='cover-image' style='background-image: url(" . $building->images[0] . ") '></div>";
                        echo "<div  class='building-heading'><h2>" . $building->name . "</h2></div>";
                        echo "</div>";
                        echo "</a>";
                    }
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>