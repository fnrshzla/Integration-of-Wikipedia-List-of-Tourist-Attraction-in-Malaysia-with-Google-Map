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

$query = "DELETE FROM location WHERE location_id = ".$location_id;
echo $query;
$result=mysqli_query($conn, $query) or die("Update Query Failed");
if($result)
{
    if (mysqli_affected_rows($conn) > 0) 
    {
        echo json_encode(array("message" => mysqli_affected_rows($conn)." Product Deleted Successfully", "status" => true));
    } else 
    {
        echo json_encode(array("message" => "Failed Location Not Deleted ", "status" => false));
    } 
}
else
{
    echo json_encode(array("message" => "Failed Location Not Deleted ", "status" => false)); 
}

?>
