<?php
include_once 'header.php';
?>

<h1>Update Location</h1>

<?php 
if (isset($_GET['location_id'])) {
    $location_id = $_GET['location_id'];
    $url = "http://localhost/ict651/project/map_api.php?location_id=".$location_id;
	

     $client = curl_init($url);
     //curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
     $response = curl_exec($client);
    
    $result = json_decode($response);
    
    echo "Location ID : " . $result[0]->location_id; 
	echo "<br>Address : " . $result[0]->location_address; 
	echo "<br>Longitude : " . $result[0]->location_longitude; 
	echo "<br>Latitude : " . $result[0]->location_latitude; 

    ?>

    <form method="POST">

     <br>
    Are you sure you want to change this record? <br>
	<br>
    Location ID : <br>
    <input type="text" name="location_id" value="<?php echo $result[0]->location_id ?>">
    <br>
    Address : <br>
    <input type="text" name="location_address" value="<?php echo $result[0]->location_address ?>">
    <br>
	Longitude : <br>
    <input type="text" name="location_longitude" value="<?php echo $result[0]->location_longitude ?>">
	<br>
	Latitude : <br>
    <input type="text" name="location_latitude" value="<?php echo $result[0]->location_latitude ?>">
	<br>
    <input type="hidden" name="location_id" value="<?php echo $result[0]->location_id ?>">
    <input type="submit" name="submit" value="submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $url ="http://localhost/ict651/project/map_update_api.php";

        // Create a new cURL resource
        $ch = curl_init($url);

        // Setup request to send json via POST
        $data = array(
            'location_id' => $_POST['location_id'],
            'location_address' => $_POST['location_address'],
			'location_longitude' => $_POST['location_longitude'],
            'location_latitude' => $_POST['location_latitude']
        );		
        $payload = json_encode($data);

        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // Execute the POST request
        $result = curl_exec($ch);

        // Close cURL resource
        curl_close($ch);
        echo '<p>Receiving data from product client to product create API: ';
        var_dump($result);
        echo '</p>';
        echo '<a href="http://localhost/ict651/project/map_list_client.php">Back</a>';
    }
} else {
    echo 'invalid request';
}
?>

<?php
include_once 'footer.php';

?>