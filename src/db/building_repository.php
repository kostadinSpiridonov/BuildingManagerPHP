<?php

require_once(dirname(__FILE__).'\..\models\building.php');
require_once(dirname(__FILE__).'..\mysql_connection.php');

class BuildingRepository
{
    public function all()
    {
        $connection = MySqlConnection::getConnection();

        $sql = "SELECT b.id, b.name, i.path FROM buildings b JOIN images i ON i.buildingId=b.id";
        $result = $connection->query($sql);
      
        $buildings = array();
       
         while($building =  $result->fetch_object()) {
            if (!array_key_exists($building->id, $buildings)) {
              $buildings[$building->id]=
              new Building($building->id, $building->name,"","", array());
            }   

            array_push($buildings[$building->id]->images, $building->path);
        }
        
        return $buildings;
    }

    public function getById(int $id)
    {
        $connection = MySqlConnection::getConnection();

        $sql = "SELECT b.id, b.name, i.path, b.location, b.description FROM buildings b JOIN images i ON i.buildingId=b.id
        WHERE b.id=".$connection->real_escape_string($id);
        $result = $connection->query($sql);
   
        $buildingResult = NULL;
        while($building =  $result->fetch_object()) {
            if (!isset($buildingResult)) {
                $buildingResult = new Building($building->id, $building->name, $building->location, $building->description, array());
            }   

            array_push($buildingResult->images, $building->path);
        }
     
        return $buildingResult;
    }

    public function add(Building $building)
    {
        $connection = MySqlConnection::getConnection();

        $sql = "INSERT INTO buildings (name, location, description) VALUES (?,?,?)";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sss", $param_name, $param_location, $param_description);
 
        $param_name = $building->name;
        $param_location = $building->location;
        $param_description = $building->description;
        $stmt->execute();
        $this->addBuildingImages((array)$building->images, $stmt->insert_id,$connection);
        $stmt->close();
    }

    private function addBuildingImages(array $images, int $buildingId, $connection){
        $sql = array(); 
        foreach( $images as $image ) {
            $sql[] = '("'.$connection->real_escape_string($image).'", '.$buildingId.')';
        }

        $connection->query('INSERT INTO images (path, buildingId) VALUES '.implode(',', $sql));
    }
}
?>