<div id="map" style="width:800px;height:800px;background:yellow"></div>

<script>
function myMap() {
var mapOptions = {
    center: new google.maps.LatLng(51.5, -0.12),
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.HYBRID
}
var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}
</script>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMW8m1XtWUAt87X3pW4Isoh1bM0mDI-Io&callback=myMap"></script> -->