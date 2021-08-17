<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
$_SESSION['valid']=true;
?>


<?php
    if(isset($_SESSION['valid'])==True){?>
 
     <div class="card-body">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">ADD ORGANIZATION 
           
    </h6>
	</br>
	<?php if(isset($_GET['ok'])){
		echo'
	<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:330px; float:right;">
  <strong>Successfully!</strong>  Added.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
	
  </button>
</div>';
	}
	
?>
  </div>
  <style>
  #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }
</style>

            <div class="row">
                <div class="col-lg-6">

                   
						<form method="post" action="add_map_process.php">
                       <div class="col col-lg-6">
					   
               

                   <div class="form-group">
                            <label>Organization Name*</label>
						   <select style="width:300px;" name="name" class="form-control">
						   <option selected>Select Organization</option>
							<?php 
					
					    require "database/Db_Connection.php";
					
				    	$result = $con->query("SELECT * FROM organization ");
				
						
						while($row1 = $result->fetch_assoc()) {																$id=$row1['organization_id'];											
							$title=$row1['organization_name'];
							echo'
                           
							
							<option>'.$title.'</option>';
						}
						
						?>
						<option>Others</option>
						
						  </select>
                        </div>
					
                        
							<div class="form-group">
							   <input id="pac-input" style="height:40px; width:300px;" name="loc" class="controls" type="text"placeholder="Enter a location">
							</div>
					  
							<div id="map" style="height:300px;width:540px"></div>
							<br>
							<input type="hidden" name="lat" id="lat">
							<input type="hidden" name="lng" id="lng">
							<input type="hidden" name="location" id="location">
							<input type="submit" name="submit" value="Save" class="form-control btn btn-primary">
							</div>
							</form>
									</div>
									
									
								</div>
								
			<script>

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 24.979987, lng: 90.680978},
          zoom: 6
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);
var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();

          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
          }));
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);
var item_Lat =place.geometry.location.lat()
var item_Lng= place.geometry.location.lng()
var item_Location = place.formatted_address;
//alert("Lat= "+item_Lat+"_____Lang="+item_Lng+"_____Location="+item_Location);
        $("#lat").val(item_Lat);
        $("#lng").val(item_Lng);
        $("#location").val(item_Location);
          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);
      }
        
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPBkZsNsrXjgWNl3LY2-tYSQJ0f-TrDvo&libraries=places&callback=initMap"
        async defer></script>

    <?php
}
?>
</div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>