@extends('layouts.app')
@section('content')
    <!-- Cabecera -->
	<br><br><br><br><br><br><br>
	
    <!-- Cliente Menu -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-2">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Account</div>
							<ul class="sidebar_categories">
								<li><a href="{{URL::action('VistaUsuarioController@show',Auth::user()->id)}}">Profile</a></li>
								<li style="background-color: gray;"><a href="{{ url('/vistas/vorden') }}">Orders</a></li>
								<li><a href="{{ url('/logout') }}">Logout</a></li>
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-10">
					
					<!-- Contenido -->
                    <div class="card mb-4">
                        <header class="card-header">
                            <h2 class="h3 card-header-title"><strong>Edit Order: {{$work->workid}}</strong></h2>      
                        </header>
                                     
                        <div class="card-body">
                        <h5 class="h4 card-title">Edit the information and save the changes.</h5>
                            @if (count($errors)>0)
                                    <div class="alert alert-danger">
                                        <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                        </ul>
                                    </div>
                            @endif

                            {!!Form::model($work,['method'=>'PATCH','route'=>['vorden.update',$work->idwork]])!!}
                            {{Form::token()}}
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="pickup_address"><b>Pick Up</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                    <div class="form-group">
                                        <label for="pickup_contact">Contact</label>
                                        <input type="text" name="pickup_contact"  value="{{$work->pickup_contact}}" class="form-control" placeholder="Contact..." >
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="pickup_phone">Phone</label>
                                        <input type="text" name="pickup_phone"  value="{{$work->pickup_phone}}" class="form-control" placeholder="Phone..." >
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="map"><b>Choose a point on the map:</b> </label>
                                        <p>If you want to change the position you can choose a point on the map or if you know directly the latitude and longitude you can put it directly in the corresponding fields, you can also go to <a target="_blank" href="https://www.google.com/maps">Google Maps</a> to collect the information and copy it.</p>
                                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9qYT90AVrfMfbaCR_PUK35h9d9-tcbJw"></script>
                                            <script type="application/javascript">
                                                var map;
                                                var marker;
                                                var myLatlng = new google.maps.LatLng(40.411293902828156, -101.88586174854017);
                                                var geocoder = new google.maps.Geocoder();
                                                function initialize() {
                                                    var mapOptions = {
                                                    zoom: 4,
                                                    center: myLatlng,
                                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                                    };
                                            map = new google.maps.Map(document.getElementById("Mapa"), mapOptions);
                                                var marker;
                                                    google.maps.event.addListener(map, 'click', function(event) {
                                                    placeMarker(event.latLng);
                                                    });
                                        
                                        
                                                function placeMarker(location) {
                                                    if (marker == null)
                                                    {
                                                        marker = new google.maps.Marker({
                                                            position: location,
                                                            map: map,
                                                            zoom:13
                                                        });
                                                    }
                                                    else
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
                                                                    $('#pickup_location_latitude').val(marker.getPosition().lat());
                                                                    $('#pickup_location_longitude').val(marker.getPosition().lng());
                                                                    $('#pickup_address').val(results[0].formatted_address+', '+state+', '+city); 
                                                        
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
                                        <div id="Mapa" width="100%" style="height: 280px;"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Latitude</span>
                                            </div>
                                            <input type="text" name="pickup_location_latitude" id="pickup_location_latitude" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{$work->pickup_location_latitude}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Longitude</span>
                                            </div>
                                            <input type="text" name="pickup_location_longitude" id="pickup_location_longitude" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{$work->pickup_location_longitude}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="pickup_address">Address</label>
                                        <input type="text" name="pickup_address" id="pickup_address" value="{{$work->pickup_address}}" class="form-control" placeholder="Address..." >
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="delivery_address"><b>Delivery</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                    <div class="form-group">
                                        <label for="pickup_contact">Contact</label>
                                        <input type="text" name="delivery_contact"  value="{{$work->delivery_contact}}" class="form-control" placeholder="Contact..." >
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="delivery_phone">Phone</label>
                                        <input type="text" name="delivery_phone"  value="{{$work->delivery_phone}}" class="form-control" placeholder="Phone..." >
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="map"><b>Choose a point on the map:</b></label>
                                        <p>If you want to change the position you can choose a point on the map or if you know directly the latitude and longitude you can put it directly in the corresponding fields, you can also go to <a target="_blank" href="https://www.google.com/maps">Google Maps</a> to collect the information and copy it.</p>
                                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9qYT90AVrfMfbaCR_PUK35h9d9-tcbJw"></script>
                                            <script type="application/javascript">
                                                var map2;
                                                var marker;
                                                var myLatlng = new google.maps.LatLng(40.411293902828156, -101.88586174854017);
                                                var geocoder = new google.maps.Geocoder();
                                                function initialize() {
                                                    var mapOptions = {
                                                    zoom: 4,
                                                    center: myLatlng,
                                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                                    };
                                            map2 = new google.maps.Map(document.getElementById("Mapa2"), mapOptions);
                                                var marker;
                                                    google.maps.event.addListener(map2, 'click', function(event) {
                                                    placeMarker(event.latLng);
                                                    });
                                        
                                        
                                                function placeMarker(location) {
                                                    if (marker == null)
                                                    {
                                                        marker = new google.maps.Marker({
                                                            position: location,
                                                            map: map2,
                                                            zoom:13
                                                        });
                                                    }
                                                    else
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
                                                                    $('#delivery_location_latitude').val(marker.getPosition().lat());
                                                                    $('#delivery_location_longitude').val(marker.getPosition().lng());
                                                                    $('#delivery_address').val(results[0].formatted_address+', '+state+', '+city); 
                                                        
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
                                        <div id="Mapa2" width="100%" style="height: 280px;"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Latitude</span>
                                            </div>
                                            <input type="text" name="delivery_location_latitude" id="delivery_location_latitude" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{$work->delivery_location_latitude}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Longitude</span>
                                            </div>
                                            <input type="text" name="delivery_location_longitude" id="delivery_location_longitude" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{$work->delivery_location_longitude}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="delivery_address">Address</label>
                                        <input type="text" name="delivery_address" id="delivery_address" value="{{$work->delivery_address}}" class="form-control" placeholder="Address..." >
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="description">Work Description</label>
                                        <span class="form-icon-wrapper">
                                            <textarea id="description" type="text" class="form-control" name="description"  rows="4" cols="50">{{$work->description}}</textarea>
                                        </span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>   

                        <footer class="card-footer">
                                <button class="btn btn-danger" type="reset"><i class="fa fa-times-circle"></i> Reset</button>
                                <button class="btn btn-info" type="submit"><i class="fa fa-check-square"></i> Save</button>
                        </footer>
                        {!!Form::close()!!}
                    </div>
				</div>
			</div>
		</div>
    </div>
@endsection