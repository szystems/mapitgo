<!-- Basic Modals -->
		<div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modal-editar-location{{$location->idlocation}}">
			{!!Form::model($location,['method'=>'PATCH','route'=>['location.update',$location->idlocation]])!!}
            {{Form::token()}}
        
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Location</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
								<div class="form-group">
									<div class="input-group">
                                            <input type="hidden" name="idwork" class="form-control" id="idwork" value="{{$work->idwork}}">
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <label for="title"><strong><font color="orange">*</font>Title:</strong></label>
                                                <div class="form-group">
                                                    <input type="text" name="title" class="form-control" value="{{$location->title}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <label for="title"><strong><font color="orange">*</font>Choose a point on the map:</strong></label>
                                                <p>If you want to change the position you can choose a point on the map or if you know directly the latitude and longitude you can put it directly in the corresponding fields, you can also go to <a target="_blank" href="https://www.google.com/maps">Google Maps</a> to collect the information and copy it.</p>
                                                    
                                                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9qYT90AVrfMfbaCR_PUK35h9d9-tcbJw"></script>
                                                    <script type="application/javascript">

                                                        var map{{$location->idlocation}};
                                                        var marker;
                                                        var myLatlng = new google.maps.LatLng(40.411293902828156, -101.88586174854017);
                                                        var geocoder = new google.maps.Geocoder();

                                                        function initialize() {
                                                            var mapOptions = {
                                                            zoom: 4,
                                                            center: myLatlng,
                                                            mapTypeId: google.maps.MapTypeId.ROADMAP
                                                        };

                                                        map{{$location->idlocation}} = new google.maps.Map(document.getElementById("Mapa{{$location->idlocation}}"), mapOptions);

                                                        var marker;

                                                        google.maps.event.addListener(map{{$location->idlocation}}, 'click', function(event) {
                                                            placeMarker(event.latLng);
                                                        });
                                                        
                                                        
                                                        function placeMarker(location) {
                                                            if (marker == null)
                                                            {
                                                                marker = new google.maps.Marker({
                                                                    position: location,
                                                                    map: map{{$location->idlocation}},
                                                                    zoom:13
                                                                });
                                                            }else
                                                            {
                                                                marker.setPosition(location);
                                                            }

                                                            geocoder.geocode(
                                                                { location: location },
                                                                (
                                                                    results = google.maps.GeocoderResult,
                                                                    status= google.maps.GeocoderStatus
                                                                ) => {
                                                                    if (status === "OK") {
                                                                        if (results[0]) {
                                                                            console.log  (results[0].address_components);
                                                                            var address_components = results[0].address_components;
                                                                            var components={};
                                                                            jQuery.each(address_components,function(k,v1) {jQuery.each(v1.types,function(k2, v2){components[v2]=v1.long_name});});
                                                                            var city, postal_code,state,country,sublocality,street_number,route;
                                                                                            
                                                                            console.log(components);
                                                                            if(components.locality) {
                                                                                city = components.locality;
                                                                            }
                                                                    
                                                                            if(!city) {
                                                                                city = components.administrative_area_level_1;
                                                                            }
                                                                    
                                                                            if(components.postal_code) {
                                                                                postal_code = components.postal_code;
                                                                            }

                                                                            if(components.postal_code) {
                                                                                postal_code = components.postal_code;
                                                                            }
                                                                    
                                                                            if(components.administrative_area_level_1) {
                                                                                state = components.administrative_area_level_1;
                                                                            }
                                                                                            
                                                                            if(components.route) {
                                                                                    route = components.route;
                                                                            }

                                                                            if(components.sublocality_level_1) {
                                                                                sublocality = components.sublocality_level_1;
                                                                            }

                                                                            if(components.country) {
                                                                                country = components.country;
                                                                            }

                                                                            if(components.street_number) {
                                                                                street_number = components.street_number;
                                                                            }
                                                                            $('#input-address-formated').val(results[0].formatted_address);
                                                                            $('#input-address').val(state);
                                                                            $('#input-city').val(city);
                                                                            $('#input-country').val(country);
                                                                            $('#input-postal-code').val(postal_code);
                                                                            $('#input-street').val(route+', '+sublocality);
                                                                            $('#input-interior-number').val(street_number);
                                                                            $('#input-exterior-number').val(street_number);
                                                                            $('#latitude_edit{{$location->idlocation}}').val(marker.getPosition().lat());
                                                                            $('#longitude_edit{{$location->idlocation}}').val(marker.getPosition().lng());
                                                                            $('#description_edit{{$location->idlocation}}').val(results[0].formatted_address+', '+state+', '+city); 
                                                                                
                                                                        } else {
                                                                            window.alert("No results found");
                                                                        }
                                                                    } else {
                                                                        window.alert("Geocoder failed due to: " + status);
                                                                    }
                                                                }
                                                            );
                                                        }
                                                        
                                                        }
                                                        google.maps.event.addDomListener(window, 'load', initialize);
                                                    </script>
                                                    <div id="Mapa{{$location->idlocation}}" width="100%" style="height: 280px;"></div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <label for="latitude"><strong>Latitude:</strong></label>
                                                <div class="form-group">
                                                    <input type="text" name="latitude" id="latitude_edit{{$location->idlocation}}" class="form-control" value="{{$location->latitude}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <label for="longitude"><strong>Longitude:</strong></label>
                                                <div class="form-group">
                                                    <input type="text" name="longitude" id="longitude_edit{{$location->idlocation}}" class="form-control" value="{{$location->longitude}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <label for="description"><strong>Description:</strong></label>
                                                <div class="form-group">
                                                <span class="form-icon-wrapper">
                                                    <textarea type="text" class="form-control" name="description" id="description_edit{{$location->idlocation}}" rows="4" cols="50">{{$location->description}}</textarea>
                                                </span>
                                                </div>
                                            </div>
									</div>
								</div>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
                        <button type="submit" class="btn btn-info"><i class="far fa-save"></i> Save</button>
					</div>
				</div>
			</div>
            {{Form::close()}}
            
		</div>


<!-- End Basic Modals -->