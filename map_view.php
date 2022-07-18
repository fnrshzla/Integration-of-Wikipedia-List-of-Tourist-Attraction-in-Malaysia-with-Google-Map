<?php
include_once'header.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>List of Tourist Attraction in Malaysia</title>
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <meta charset="utf-8">
    <style>
      #map {
        width: 100%;
		height: 150px;
      }
    
      html, body {
        height: 50%;
		align: left;
		width: 50%
		margin-left: 100;
		margin-right: 100;
      }
    </style>
	
	  <!-- Navigation -->

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
    			<form id="mapform" <?php if (isset($edit_page_data)) { echo "action='".base_url('edit_action')."'";} ?> method="post" class="mt-3">
    				<div class="input-group">
    				   <input type="text" name="desc" id="desc" class="form-control" placeholder="Enter a description..." 
					   <?php if (isset($edit_page_data)) {echo 'value="'.$edit_page_data->description.'"';}; ?>>
    				   <input type="hidden" name="lat" id="lat" value="<?php if (isset($edit_page_data)){ echo $edit_page_data->lat;} ?>">
               <input type="hidden" name="lng" id="lng" value="<?php if (isset($edit_page_data)){ echo $edit_page_data->lng;} ?>">
               <?php if (isset($edit_page_data)): ?>
               <input type="hidden" name="id" value="<?php echo $edit_page_data->id; ?>">
               <?php endif ?>
    				   <span class="input-group-btn">
                  <?php if (isset($edit_page_data)) { ?>
                    <button class="btn btn-success ml-2" type="submit">Edit The Location</button>
                  <?php } else { ?>
                    <button class="btn btn-success ml-2" type="button" disabled="">Get a Location</button>
                  <?php } ?>
    				   </span>
    				</div>
    			</form>
    			<div class="alert alert-success mt-3" role="alert" style="display: none">
    			  Successful.
    			</div>
    			<div class="mt-3" id="map_div">
    				<div style="height:450px;" id="map"></div> <!-- Map Div -->
    			</div>
        </div>
      </div>
    </div>
	
  </head>
  <body>
    <div id="map"></div>
	
	
  </body>
</html>
	
	<script type="text/javascript">
      var map;
      function getData() {
        $.ajax({
        url: "map_geocode_api.php",
        async: true,
        dataType: 'json',
        success: function (data) {
          console.log(data);
          //load map
          init_map(data);
        }
      });  
      }   

	  
      function init_map(data) {
            var map_options = {
                zoom: 10,
                center: new google.maps.LatLng(data['latitude'], data['longitude'])
              }
			  
			  
			  
            map = new google.maps.Map(document.getElementById("map"), map_options);
           marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(data['latitude'], data['longitude'])
            });
            infowindow = new google.maps.InfoWindow({
                content: data['formatted_address']
            });
            google.maps.event.addListener(marker, "click", function () {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }
		
		
      </script>



     <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyoypA0rt46Icc_yb8K851Axdz4A0P7Ao&callback=getData" >
    </script>



<?php
include_once'footer.php';
?>