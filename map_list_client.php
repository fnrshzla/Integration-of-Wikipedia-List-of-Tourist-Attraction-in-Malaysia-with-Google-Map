<?php
include_once 'header.php';
?>

<h1>Location List</h1>

<?php

    $url = "http://localhost/ict651/project/map_list_api.php";

     $client = curl_init($url);
     //curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
     $response = curl_exec($client);
    
    $result = json_decode($response);
    echo '<table border="1">';
    echo "<TR>
			<th>ID</th>
			<th>Address</th>
			<th>Longitude</th>
			<th>Latitude</th>
			<th colspan=2>Action</th>
		 </TR>";
    
	foreach($result as $x => $val) {
        echo "<tr>";
        echo "<td>" . $result[$x]->location_id . "</td>"; 
        echo "<td>" . $result[$x]->location_address . "</td>"; 
        echo "<td>" . $result[$x]->location_longitude . "</td>";
		echo "<td>" . $result[$x]->location_latitude . "</td>";
        echo "<td><a href='http://localhost/ict651/project/map_update_client.php?location_id=" . $result[$x]->location_id . "'>Update</a></td>"; 
        echo "<td><a href='http://localhost/ict651/project/map_delete_client2.php?location_id=" . $result[$x]->location_id . "'>Delete</a></td>"; 		
		echo "</tr>";
    }
    echo "</table>";
	
	//product_id tu nnti kena tukar kat product_api.php or nnti kita punya web buat baru kat map_api.php
?>
	

<?php
include_once 'footer.php';

?>	