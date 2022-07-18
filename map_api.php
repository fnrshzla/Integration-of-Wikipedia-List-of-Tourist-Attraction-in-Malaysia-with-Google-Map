<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once "db_connect.php";
if(isset($_GET['location_id'])&& $_GET['location_id']!="") {
	$location_id = $_GET['location_id'];
    $query = "SELECT * FROM location WHERE location_id=$location_id";

	$result = mysqli_query($conn, $query) or die("Select Query Failed.");

	$count = mysqli_num_rows($result);

	if($count > 0)
	{ 
	 $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
	 http_response_code(200);
	 echo json_encode($row);
	}
	else
	{ 
		http_response_code(400);
		echo json_encode(array("message" => "No Location Found.", "status" => false));
	}
  }
?>