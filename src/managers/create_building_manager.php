<?php

    require_once(dirname(__FILE__).'\..\models\building.php');
    require_once(dirname(__FILE__).'\..\db\building_repository.php');
    require_once(dirname(__FILE__).'\utilities\image_utilities.php');
	require_once(dirname(__FILE__).'\authentication_manager.php');

	session_start();
	if(!isLoggedIn()){
		header('Location: home.php');
	} 

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
