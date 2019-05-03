
<?php 
session_start();
$loggedin=false;
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $loggedin=true;
} ?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style >
        .building{
            border: 5px solid transparent;
            padding: 5px;
            height:300px;
            opacity:0.9;
        }
        .building:hover { 
            cursor: pointer;
            border: 2px solid transparent;
            opacity:1;
        }
        .cover-image{
            width:100%;
            height:100%;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            position: absolute;
            top: 0;
            left: 0;
        }
        .building-heading{
            width: 100%;
            text-align: center;
            margin: 0px;
            background-color: #12101094;
            position: absolute;
            bottom: 0;
            left: 0;
            color: white;
        }
        .create-button{
            margin-top: 20px;
            margin-left: 23px;
        }
    </style>
 
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