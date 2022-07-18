<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);
echo '<p>Receiving data from product client to product create API: ';
var_dump($data);
echo '</p>';

$location_id = $data["location_id"];
$location_address = $data["location_address"];
$location_longitude = $data["location_longitude"];
$location_latitude = $data["location_latitude"];

require_once "db_connect.php";
							
$query = "UPDATE location SET location_address = '".$location_address."' , 
							  location_longitude = '".$location_longitude."' ,
							  location_latitude = '".$location_latitude."' ".
                          " WHERE location_id = ".$location_id;
						 							
echo $query;
$result=mysqli_query($conn, $query) or die("Update Query Failed");
if($result)
{
    if (mysqli_affected_rows($conn) > 0) 
    {
        echo '<br>';
        echo json_encode(array("message" => mysqli_affected_rows($conn)." Location Updated Successfully", "status" => true));
    } else 
    {
        echo json_encode(array("message" => "Failed Location Not Updated ", "status" => false));
    } 
}
else
{
    echo json_encode(array("message" => "Failed Location Not Updated ", "status" => false)); 
}

?>