<script type="text/javascript">
$(document).ready(function()
 {
      var newmarker ="" ;  // whether there is already marker exist or not , in the start no
      var lat= $("#lat").val();
      var long=$("#long").val();

        if (navigator.geolocation) 
        {  
        if($("#lat").val()!= "" )       // on editing: if lat long already have value from database on page refresh to place the marker at that latlng
                {
                  lat = $("#lat").val();
                  long = $("#long").val();
                }
                $("#locess").val(lat+','+long);
                var LatLng = new google.maps.LatLng(lat,long);  

                  var geocoder = new google.maps.Geocoder;
                  var infowindow = new google.maps.InfoWindow;
                  var mapOptions = {  
                    center: LatLng,  
                    zoom: 17,  
                    mapTypeId: google.maps.MapTypeId.ROADMAP,  
                    draggableCursor:'crosshair'
                  };  

                  var map = new google.maps.Map(document.getElementById("MyMapLOC"), mapOptions);  

                //search code started
                // Create the search box and link it to the UI element.
                var input = document.getElementById('pac-input');
                
                var searchBox = new google.maps.places.SearchBox(input);
                //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                // Bias the SearchBox results towards current map's viewport.
                map.addListener('bounds_changed', function() {
                  searchBox.setBounds(map.getBounds());
                });

                // Listen for the event fired when the user selects a prediction and retrieve
                // more details for that place.
                searchBox.addListener('places_changed', function() {
                  var places = searchBox.getPlaces();

                  if (places.length == 0) {
                    return;
                  }

                    // For each place, get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();
                    var marker;
                    var search_latLng;
                    places.forEach(function(place) {

                      if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                      }
                      var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                      };

                      search_latLng = place.geometry.location;


                      var str=String(search_latLng);

                      var arr=str.split(",");
                      lat=arr[0].split("(");
                      lng=arr[1].split(")");

                      $("#lat").val(lat[1]);
                      $("#long").val(lng[0]); 

                      if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                      } else {
                        bounds.extend(place.geometry.location);
                      }
                    });
                    map.fitBounds(bounds);

                    geocoder.geocode({'location': search_latLng}, function(results, status) {

                      if (status === 'OK') {
                        if (results[0]) 
                        {
                          location_name.value=results[0].formatted_address;
                            var str=String(search_latLng);

                      var arr=str.split(",");
                      lat=arr[0].split("(");
                      lng=arr[1].split(")");

                      $("#lat").val(lat[1]);
                      $("#long").val(lng[0]); 



                          if(newmarker!="")
                            newmarker.setMap(null);

                                // Create a marker for each place.
                                marker = new google.maps.Marker({
                                  map: map,
                                  position:search_latLng
                                });

                                newmarker = marker;
                                
                                infowindow.setContent(results[0].formatted_address);
                                infowindow.open(map, marker);
                              } else {
                                //window.alert('No results found');
                              }
                            } else {
                        //window.alert('yahan Geocoder failed due to: ' + status);
                      }
                    });

                  });

                //serach code ended

                map.setZoom(11);
                geocodeLatLng(geocoder, map, infowindow,LatLng);
                
                google.maps.event.addListener(map, "click", function (e) {

                //lat and lng is available in e object
                var latLng = e.latLng;

                //getting cordinates to store in the database
                var str=String(latLng);

                var arr=str.split(",");
                lat=arr[0].split("(");
                lng=arr[1].split(")");
                
                $("#lat").val(lat[1]);
                $("#long").val(lng[0]); 



                geocodeLatLng(geocoder, map, infowindow , latLng);
              });
                
                function geocodeLatLng(geocoder, map, infowindow,latLng) {

                  geocoder.geocode({'location': latLng}, function(results, status) {

                    if (status === 'OK') {
                      if (results[0]) {

                        location_name.value=results[0].formatted_address;

                        if(newmarker!="")
                          newmarker.setMap(null);

                        var marker = new google.maps.Marker({
                          position: latLng,
                          map: map
                        });
                        newmarker = marker;

                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                      } else {
                            //window.alert('No results found');
                          }
                        } else {
                        //window.alert('yahan Geocoder failed due to: ' + status);
                      }
                    });
                } //end geocoding
               
} 
else{
  alert("Sorry");
} 
});

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADGphJ0qFssunnZSahdMQ-JB4cAlkVLXc&libraries=geometry,places" type="text/javascript"></script> 