<!--Footer Section-->
<?php $furl= explode('/',$_SERVER['REQUEST_URI']); ?>
<footer class="footer-section text-white">
   <div class="container">
      <div class="copyright">
         <p>Zoningspace Copyright © 2020 </p>
      </div>
   </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<?php if(in_array('cart',$furl)) { ?>
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
<?php } ?>
<link href="<?php echo base_url(); ?>/assets/js/loading.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>/assets/js/loading.js" defer></script>

<?php if($furl[2]=='') { ?>
<script>
var placeSearch, autocomplete,headerautocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'short_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
 
};

function initAutocomplete() {
	
	headerautocomplete = new google.maps.places.Autocomplete(
		document.getElementById('searchbox'), {types: ['geocode']}
	);
	
autocomplete = new google.maps.places.Autocomplete(
document.getElementById('autocomplete'), {types: ['geocode']}
);

//autocomplete.setFields(['address_component']);
autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
 var place = autocomplete.getPlace();
 console.log(place.place_id);

 $('#lat').val(place.geometry.location.lat());
 $('#lng').val(place.geometry.location.lng());
 $('#place_id').val(place.place_id);
	 
for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
	
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}


function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhG0rSKPHuXerYxM4uquAt6CHaUSxaj1I&libraries=places&callback=initAutocomplete" 
async defer></script>
<?php } ?>

 <?php if(in_array('view-data',$furl)) { ?>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhG0rSKPHuXerYxM4uquAt6CHaUSxaj1I&libraries=places&callback=initAutocomplete" 
async defer></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script>
function initMap() {
	var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: {
      lat: <?php if(!empty($mapdraw['lat'])) { echo $mapdraw['lat']; }else { echo "38.89967823";} ?>,
      lng: <?php  if(!empty($mapdraw['lng'])) { echo $mapdraw['lng']; }else { echo "-76.9893254";} ?>
    }
  });
  var infoWin = new google.maps.InfoWindow();
	var markers = locations.map(function(location, i) {
    var marker = new google.maps.Marker({
      position: location
    });
    google.maps.event.addListener(marker, 'click', function(evt) {
      infoWin.setContent(location.info);
      infoWin.open(map, marker);
    })
    return marker;
  });
	var markerCluster = new MarkerClusterer(map, markers, {
    imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
  });

}
var locations = [
 <?php  if(!empty($mapdraw['lat']) && !empty($mapdraw['lng'])){?>
			{			
			lat: <?php echo $mapdraw['lat']?>,
			lng: <?php echo $mapdraw['lng']?>,
			info : "<?php echo $mapdraw['address']?>"
			}
			<?php } ?>
];

google.maps.event.addDomListener(window, "load", initMap);
</script>
 <?php } ?>	



</body>
</html>