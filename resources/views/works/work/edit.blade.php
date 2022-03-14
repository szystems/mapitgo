@extends ('layouts.admin')
@section ('contenido')
<script>

</script>

<div class="col-md-12 mb-12">
        @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                    </ul>
                </div>
        @endif
        <!--Mensaje de abono correcto-->
        <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                    {{session()->forget('alert-' . $msg)}}
                @endforeach
        </div> <!-- fin .flash-message -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @if(Auth::user()->user_type == "ADMIN")
            <li class="nav-item">
                  <a class="nav-link active" id="work-tab" data-toggle="tab" href="#work" role="tab" aria-controls="work" aria-selected="true">Work Header</a>
            </li>
            @endif
            <li class="nav-item">
                  <a class="nav-link" id="liabilities-tab" data-toggle="tab" href="#liabilities" role="tab" aria-controls="liabilities" aria-selected="false">Liabilities</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" id="locations-tab" data-toggle="tab" href="#locations" role="tab" aria-controls="locations" aria-selected="false">Locations</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" id="files-tab" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false">Files</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            @if(Auth::user()->user_type == "ADMIN")
            <div class="tab-pane fade show active" id="work" role="tabpanel" aria-labelledby="work-tab">
                <div class="card">
                    <header class="card-header">
                        <h2 class="h3 card-header-title"><strong>Edit Work ID: {{$work->workid}}</strong></h2>
                    </header> 

                    <div class="card-body">
                        <h5 class="h4 card-title">Change the data that you want to edit:</h5>
                        {!!Form::model($work,['method'=>'PATCH','route'=>['work.update',$work->idwork]])!!}
                        {{Form::token()}}
                        <div class="row">
                            <input type="hidden" name="idadmin" class="form-control" id="idadmin" value="{{ Auth::user()->id}}">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="status">Work Status</label>
                                    <select name="status" id="status" class="form-control"  >
                                        <option selected value="{{$work->state_work}}">{{$work->state_work}}</option>
                                        <option value="Active">Active</option>
                                        <option value="Finalized">Finalized</option>
                                        <option value="Canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <a href="{{url('seguridad\client\create')}}">
                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Create Client">
                                            <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                                                <i class="far fa-plus-square"></i>
                                            </button>
                                        </span>
                                    </a>
                                    <?php
                                        $fecha = date("m-d-Y", strtotime($work->date));

                                        $adminw=DB::table('users')
                                        ->where('id','=',$work->idadmin)
                                        ->first();

                                        $clientw=DB::table('users')
                                        ->where('id','=',$work->idclient)
                                        ->first();

                                        $driverw=DB::table('users')
                                        ->where('id','=',$work->iddriver)
                                        ->first();

                                        $vehiclePUw=DB::table('vehicle')
                                            ->where('idvehicle','=',$work->idvehicle_power_unit)
                                            ->first();

                                        $vehicleTw=DB::table('vehicle')
                                            ->where('idvehicle','=',$work->idvehicle_trailer)
                                            ->first();
                                                    
                                    ?>
                                    <label for="idclient">Client</label>
                                    <select name="idclient" id="idclient" class="form-control selectpicker"  data-live-search="true">
                                        <option value="{{$work->idclient}}">{{$clientw->name}} / {{$clientw->email}} / {{$clientw->phone}}</option>
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}">{{$client->name}} / {{$client->email}} / {{$client->phone}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <a href="{{url('works\vehicle\create')}}">
                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Create Vehicle">
                                            <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                                                <i class="far fa-plus-square"></i>
                                            </button>
                                        </span>
                                    </a>
                                    <label for="idvehicle_power_unit">Power Unit</label>
                                    <select name="idvehicle_power_unit" id="idvehicle_power_unit" class="form-control selectpicker"  data-live-search="true">
                                        @if( @isset($work->idvehicle_power_unit))
                                            <option value="{{$work->idvehicle_power_unit}}">{{$vehiclePUw->number_vehicle}} / {{$vehiclePUw->make}} / {{$vehiclePUw->model}} / {{$vehiclePUw->year}} / {{$vehiclePUw->trailer_or_unit_type}}</option>
                                        @else
                                            <option value="">Not defined</option>
                                        @endif
                                        @foreach($vehicles_power_unit as $vehiclePU)
                                            <option value="{{$vehiclePU->idvehicle}}">{{$vehiclePU->number_vehicle}} / {{$vehiclePU->make}} / {{$vehiclePU->model}} / {{$vehiclePU->year}} / {{$vehiclePU->trailer_or_unit_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                <div class="form-group">
                                    <a href="{{url('works\vehicle\create')}}">
                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Create Vehicle">
                                            <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                                                <i class="far fa-plus-square"></i>
                                            </button>
                                        </span>
                                    </a>
                                    <label for="idvehicle_trailer">Trailer</label>
                                    <select name="idvehicle_trailer" id="idvehicle_trailer" class="form-control selectpicker"  data-live-search="true">
                                        @if( @isset($work->idvehicle_trailer))
                                            <option value="{{$work->idvehicle_trailer}}">{{$vehicleTw->number_vehicle}} / {{$vehicleTw->make}} / {{$vehicleTw->model}} / {{$vehicleTw->year}} / {{$vehicleTw->trailer_or_unit_type}}</option>
                                        @else
                                            <option value="">Not defined</option>
                                        @endif
                                        @foreach($vehicles_trailer as $vehicleT)
                                            <option value="{{$vehicleT->idvehicle}}">{{$vehicleT->number_vehicle}} / {{$vehicleT->make}} / {{$vehicleT->model}} / {{$vehicleT->year}} / {{$vehicleT->trailer_or_unit_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="reefer_unit_number">If is Reefer</label>
                                    <input type="text" name="reefer_unit_number" class="form-control" placeholder="Reefer unit number..." value="{{$work->reefer_unit_number}}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <a href="{{url('seguridad\driver\create')}}">
                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Create Driver">
                                            <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                                                <i class="far fa-plus-square"></i>
                                            </button>
                                        </span>
                                    </a>
                                    <label for="iddriver">Driver</label>
                                    <select name="iddriver" id="iddriver" class="form-control selectpicker"  data-live-search="true">
                                        @if( @isset($work->iddriver))
                                            <option value="{{$work->iddriver}}">{{$driverw->name}} / {{$driverw->email}} / {{$driverw->phone}}</option>
                                        @else
                                            <option value="">Not defined</option>
                                        @endif
                                        @foreach($drivers as $driver)
                                        <option value="{{$driver->id}}">{{$driver->name}} / {{$driver->email}} / {{$driver->phone}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                <div class="form-group">
                                    <label>Days:</label>
                                    <select name="days" class="form-control">
                                        <option value="{{$work->days}}" selected>{{$work->days}}</option>
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                <div class="form-group">
                                    <label for="salaryxday">Day Rate/Hour Rate</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ Auth::user()->coin }}</span>
                                        </div>
                                        <input type="text" name="day_rate-hour_rate" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{$work->salaryxday}}" onkeypress="return validardecimal(event,this.value)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                <div class="form-group">
                                    <label for="assets_gross">RateCon Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ Auth::user()->coin }}</span>
                                        </div>
                                        <input type="text" name="rateCon_amount" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{$work->assets_gross}}" onkeypress="return validardecimal(event,this.value)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                <div class="form-group">
                                    <label for="accept_quote">Accept Quote</label>
                                    <select name="accept_quote" id="accept_quote" class="form-control selectpicker" >
                                        @if($work->accept_quote == null)
                                        <option selected value="">Not approved</option>
                                        <option value="Approved">Approved</option>
                                        @else
                                        <option selected value="Approved">Approved</option>
                                        <option value="">Not approved</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="pickup_address"><b>Pick Up</b></label>
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                <div class="form-group">
                                    <label for="pickup_contact">Contact</label>
                                    <input type="text" name="pickup_contact" class="form-control" placeholder="Contact..." value="{{$work->pickup_contact}}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                        <label for="pickup_phone">Phone</label>
                                        <input type="text" name="pickup_phone" class="form-control" placeholder="Phone..." value="{{$work->pickup_phone}}">
                                    </div>
                                </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="pickup_address">Address</label>
                                    <input type="text" name="pickup_address" id="pickup_address" class="form-control" placeholder="Address..." value="{{$work->pickup_address}}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="pickup_address"><b>Choose a point on the map:</b> </label>
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
                                    <label for="delivery_address"><b>Delivery</b></label>
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                <div class="form-group">
                                    <label for="pickup_contact">Contact</label>
                                    <input type="text" name="delivery_contact" class="form-control" placeholder="Contact..." value="{{$work->delivery_contact}}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="delivery_phone">Phone</label>
                                    <input type="text" name="delivery_phone" class="form-control" placeholder="Phone..." value="{{$work->delivery_phone}}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="delivery_address">Address</label>
                                    <input type="text" name="delivery_address" id="delivery_address" class="form-control" placeholder="Address..." value="{{$work->delivery_address}}">
                                </div>
                            </div>
                            <!--aqui va mapa faltante-->

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label for="pickup_address"><b>Choose a point on the map:</b> </label>
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

                            <!--fin mapa faltante-->
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
                                    <label for="description">Work Description</label>
                                    <span class="form-icon-wrapper">
                                        <textarea id="description" type="text" class="form-control" name="description"  rows="4" cols="50">{{$work->description}}</textarea>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer class="card-footer">
                            <input name="_token" value="{{ csrf_token() }}" type="hidden" >
                            <button class="btn btn-danger" type="reset"><i class="fas fa-ban"></i> Reset</button>
                            <button class="btn btn-info" type="submit"><i class="far fa-save"></i> Save</button>
                        {!!Form::close()!!}
                    </footer>
                </div>
            </div>
            @endif
            <div class="tab-pane fade" id="liabilities" role="tabpanel" aria-labelledby="liabilities-tab">
                <!--Liabilities-->
                <div class="card">
                        <header class="card-header">
                              <h2 class="h3 card-header-title"><strong>Work Liabilities: {{$work->workid}}</strong></h2>
                        </header>

                        <div class="card-body">
                            @if(Auth::user()->user_type == "ADMIN")
                            <div class="card">
                                <header class="card-header">
                                    <h2 class="h3 card-header-title"><strong>Liabilities:</strong></h2>
                                </header>
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">          
                                            <thead>
                                                <th><h5><strong><i class="fa fa-sliders-h"></i></strong></h5></th>
                                                <th><h5><strong>Date/Time</strong></h5></th>
                                                <th><h5><strong>Type</strong></h5></th>
                                                <th><h5><strong>Name</strong></h5></th>
                                                <th><h5><strong>Description</strong></h5></th>
                                                <th><h5><strong>Total</strong></h5></th>        
                                            </thead>
                                            <?php
                                                $total_liabilities = 0;
                                            ?>
                                            @foreach ($liabilities as $liability)
                                                <tr>
                                                    <?php
                                                        $total_liabilities = $total_liabilities + $liability->total;

                                                        $datetime = $hoy = date("m-d-Y H:i:s", strtotime($liability->datetime));
                                                    ?>
                                                    <td align="left">
                                                        <a href="" data-target="#modal-editar-liability{{$liability->idliability}}" data-toggle="modal">
                                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Edit Liability">
                                                                <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
                                                                    <i class="far fa-edit"></i>
                                                                </button>
                                                            </span>
                                                        </a>
                                                        <a href="" data-target="#modal-eliminar-liability{{$liability->idliability}}" data-toggle="modal">
                                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Delete Liability">
                                                                <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
                                                                    <i class="far fa-minus-square"></i>
                                                                </button>
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td align="left"><h5>{{$datetime}}</h5></td>
                                                    <td align="left"><h5>{{$liability->type}}</h5></td>
                                                    <td align="left"><h5>{{$liability->name}}</h5></td>
                                                    <td align="left"><h5>{{$liability->description}}</h5></td>
                                                    <td align="Right"><h5>{{ Auth::user()->coin }}{{number_format($liability->total,2, '.', ',')}}</h5></td>
                                                </tr>
                                                @include('works.work.deleteliability.deleteliability')
                                                @include('works.work.editliability.editliability')
                                            @endforeach
                                                <tfoot>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th ><h3 align="Right"><strong>Liabilities Total:</strong></h3></th>
                                                    <th ><h3 align="right"><strong>{{ Auth::user()->coin }}{{number_format($total_liabilities,2, '.', ',')}}</strong></h3></th>
                                                </tfoot>
                                        </table>
                                    </div>
                                    
                                </div>

                                <footer class="card-footer">

                                </footer>
                            </div> 
                            @endif
                            <div class="card">
                                {!!Form::open(array('url'=>'works/liability','method'=>'POST','autocomplete'=>'off'))!!}
                                {{Form::token()}}
                                <header class="card-header">
                                    <h2 class="h3 card-header-title"><strong>Add Liability:</strong></h2>
                                    <h6><font color="orange"> Required Fields *</font></h6>
                                </header>
                                
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="hidden" name="idwork" class="form-control" id="idwork" value="{{$work->idwork}}">
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <label for="type"><strong><font color="orange">*</font>Type:</strong></label>
                                                <div class="form-group">
                                                    <select name="type" class="form-control selectpicker" data-live-search="true" placeholder="Select liability type">
                                                        <option selected value="{{old('type')}}">{{old('type')}}</option>
                                                        <option value="Insurance">Insurance</option>
                                                        <option value="Truck Lease/Payment">Truck Lease/Payment</option>
                                                        <option value="Fuel">Fuel</option>
                                                        <option value="Maintenance">Maintenance</option>
                                                        <option value="Accesorial Charges">Accesorial Charges</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <label for="name"><strong><font color="orange">*</font>Name:</strong></label>
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <label for="description"><strong>Description:</strong></label>
                                                <div class="form-group">
                                                <span class="form-icon-wrapper">
                                                    <textarea id="description" type="text" class="form-control" name="description"  rows="4" cols="50">{{old('description')}}</textarea>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <label for="total"><strong><font color="orange">*</font>Total:</strong></label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">{{ Auth::user()->coin }}</span>
                                                        </div>
                                                        <input type="text" name="total" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{old('total')}}" onkeypress="return validardecimal(event,this.value)">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <footer class="card-footer">
                                    <div class="form-group" id="guardar">
                                            <button class="btn btn-danger" type="reset"><i class="fas fa-ban"></i> Reset</button>
                                            <button class="btn btn-info" type="submit"><i class="far fa-save"></i> Add</button>
                                    </div>
                                </footer>
                                {!!Form::close()!!}
                            </div>
                            
                        </div>

                        <footer class="card-footer">
                              
                        </footer>
                </div>
            </div>
            <div class="tab-pane fade" id="locations" role="tabpanel" aria-labelledby="locations-tab">
                  <!--Locations-->
                
                <div class="card">
                        <header class="card-header">
                              <h2 class="h3 card-header-title"><strong>Work Locations: {{$work->workid}}</strong></h2>
                        </header>

                        <div class="card-body">
                            @if(Auth::user()->user_type == "ADMIN")
                            <div class="card">
                                <header class="card-header">
                                    <h2 class="h3 card-header-title"><strong>Locations:</strong></h2>
                                </header>
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">          
                                            <thead>
                                                <th><h5><strong><i class="fa fa-sliders-h"></i></strong></h5></th>
                                                <th><h5><strong>Date/Time</strong></h5></th>
                                                <th><h5><strong>Title</strong></h5></th>
                                                <th><h5><strong>Description</strong></h5></th>
                                                <th><h5><strong>Latitude</strong></h5></th>
                                                <th><h5><strong>Longitude</strong></h5></th>        
                                            </thead>
                                            @foreach ($locations as $location)
                                                <tr>
                                                    <?php
                                                        $datetime = $hoy = date("m-d-Y H:i:s", strtotime($location->datetime));
                                                    ?>
                                                    <td align="left">
                                                        <a href="" data-target="#modal-editar-location{{$location->idlocation}}" data-toggle="modal">
                                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Edit Location">
                                                                <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
                                                                    <i class="far fa-edit"></i>
                                                                </button>
                                                            </span>
                                                        </a>
                                                        <a href="" data-target="#modal-eliminar-location{{$location->idlocation}}" data-toggle="modal">
                                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Delete Location">
                                                                <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
                                                                    <i class="far fa-minus-square"></i>
                                                                </button>
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td align="left"><h5>{{$datetime}}</h5></td>
                                                    <td align="left"><h5>{{$location->title}}</h5></td>
                                                    <td align="left"><h5>{{$location->description}}</h5></td>
                                                    <td align="left"><h5>{{$location->latitude}}</h5></td>
                                                    <td align="Right"><h5>{{$location->longitude}}</h5></td>
                                                </tr>
                                                @include('works.work.deletelocation.deletelocation')
                                                @include('works.work.editlocation.editlocation')
                                            @endforeach
                                                <tfoot>
                                                   
                                                </tfoot>
                                        </table>
                                    </div>
                                    
                                </div>

                                <footer class="card-footer">

                                </footer>
                            </div> 
                            @endif
                            <div class="card">
                                {!!Form::open(array('url'=>'works/location','method'=>'POST','autocomplete'=>'off'))!!}
                                {{Form::token()}}
                                <header class="card-header">
                                    <h2 class="h3 card-header-title"><strong>Add Location:</strong></h2>
                                    <h6><font color="orange"> Required Fields *</font></h6>
                                </header>
                                
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="hidden" name="idwork" class="form-control" id="idwork" value="{{$work->idwork}}">
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <label for="title"><strong><font color="orange">*</font>Title:</strong></label>
                                                <div class="form-group">
                                                    <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <label for="mapa"><strong>Choose a point on the map:</strong></label>
                                                <p>If your device supports Geolocation, your position will appear automatically in the latitude and longitude fields, otherwise select a point which you want to save on the map or if you know the latitude and longitude put it directly in the mentioned fields, you can also go to <a target="_blank" href="https://www.google.com/maps">Google Maps</a> to collect the information and copy it.</p>
                                                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9qYT90AVrfMfbaCR_PUK35h9d9-tcbJw"></script>
                                                <script type="application/javascript">
                                                    //obtener geolocalizacion y mostrar en inputs latitude y longitude
                                                        if (navigator.geolocation){
                                                            navigator.geolocation.getCurrentPosition(success, error, options);
                                                        }
                                                        else
                                                        {
                                                            alert("No Puedes obtener GEO");
                                                        }

                                                        var options = {
                                                            EnableHighAccuracy:true,
                                                            Timeout:1000,
                                                            MaximunAge:0
                                                        }

                                                        function success(geolocationPosition){
                                                            let coords = geolocationPosition.coords;

                                                            $('#latitude').val(coords.latitude);
                                                            $('#longitude').val(coords.longitude);

                                                        }

                                                        function error(err){

                                                            document.getElementById("mymap").innerHTML = err.message;
                                                        }
                                                    //fin obtener geolocalizacion
                                                        var map3;
                                                        var marker;
                                                        var myLatlng = new google.maps.LatLng(40.411293902828156, -101.88586174854017);
                                                        var geocoder = new google.maps.Geocoder();
                                                        function initialize() {
                                                            var mapOptions = {
                                                            zoom: 4,
                                                            center: myLatlng,
                                                            mapTypeId: google.maps.MapTypeId.ROADMAP
                                                            };
                                                    map3 = new google.maps.Map(document.getElementById("Mapa3"), mapOptions);
                                                        var marker;
                                                            google.maps.event.addListener(map3, 'click', function(event) {
                                                            placeMarker(event.latLng);
                                                            });
                                                
                                                
                                                        function placeMarker(location) {
                                                            if (marker == null)
                                                            {
                                                                marker = new google.maps.Marker({
                                                                    position: location,
                                                                    map: map3,
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
                                                                            $('#latitude').val(marker.getPosition().lat());
                                                                            $('#longitude').val(marker.getPosition().lng());
                                                                            $('#description_location').val(results[0].formatted_address+', '+state+', '+city); 
                                                                
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

                                                    
                                                <div id="Mapa3" width="100%" style="height: 280px;"></div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <label for="latitude"><strong>Latitude:</strong></label>
                                                <div class="form-group">
                                                    <input type="text" name="latitude" id="latitude" class="form-control" value="{{old('latitude')}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <label for="longitude"><strong>Longitude:</strong></label>
                                                <div class="form-group">
                                                    <input type="text" name="longitude" id="longitude" class="form-control" value="{{old('longitude')}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <label for="description"><strong>Description:</strong></label>
                                                <div class="form-group">
                                                <span class="form-icon-wrapper">
                                                    <textarea type="text" class="form-control" name="description" id="description_location" rows="4" cols="50">{{old('description')}}</textarea>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <footer class="card-footer">
                                    <div class="form-group" id="guardar">
                                            <button class="btn btn-danger" type="reset"><i class="fas fa-ban"></i> Reset</button>
                                            <button class="btn btn-info" type="submit"><i class="far fa-save"></i> Add</button>
                                    </div>
                                </footer>
                                {!!Form::close()!!}
                            </div>
                            
                        </div>

                        <footer class="card-footer">
                              
                        </footer>
                </div>
            </div>
            <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="files-tab">
                    <!--Alumnos de Grado-->
                    <div class="card">
                        <header class="card-header">
                              <h2 class="h3 card-header-title"><strong>Work Files: {{$work->workid}}</strong></h2>
                        </header>

                        <div class="card-body">
                            @if(Auth::user()->user_type == "ADMIN")
                            <div class="card">
                                <header class="card-header">
                                    <h2 class="h3 card-header-title"><strong>Files:</strong></h2>
                                </header>
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed table-hover">          
                                            <thead>
                                                <th><h5><strong><i class="fa fa-sliders-h"></i></strong></h5></th>
                                                <th><h5><strong>Date/Time</strong></h5></th>
                                                <th><h5><strong>Name</strong></h5></th>
                                                <th><h5><strong>Description</strong></h5></th>
                                                <th><h5><strong>File</strong></h5></th>        
                                            </thead>
                                           
                                            @foreach ($files as $file)
                                                <tr>
                                                    <?php

                                                        $datetimefile = $hoy = date("m-d-Y H:i:s", strtotime($file->datetime));
                                                    ?>
                                                    <td align="left">
                                                        <a href="" data-target="#modal-editar-file{{$file->idfile}}" data-toggle="modal">
                                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Edit File">
                                                                <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
                                                                    <i class="far fa-edit"></i>
                                                                </button>
                                                            </span>
                                                        </a>
                                                        <a href="" data-target="#modal-eliminar-file{{$file->idfile}}" data-toggle="modal">
                                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Delete File">
                                                                <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
                                                                    <i class="far fa-minus-square"></i>
                                                                </button>
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td align="left"><h5>{{$datetimefile}}</h5></td>
                                                    <td align="left"><h5>{{$file->name}}</h5></td>
                                                    <td align="left"><h5>{{$file->description}}</h5></td>
                                                    <td align="Center"><h5><a href="{{asset('work/files/'.$file->file)}}" target="_blank">Download <i class="fas fa-download"></i></a></h5></td>
                                                </tr>
                                                @include('works.work.deletefile.deletefile')
                                                @include('works.work.editfile.editfile')
                                            @endforeach
                                                <tfoot>
                                                </tfoot>
                                        </table>
                                    </div>
                                    
                                </div>

                                <footer class="card-footer">

                                </footer>
                            </div> 
                            @endif
                            <div class="card">
                                {!!Form::open(array('url'=>'works/file','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
                                {{Form::token()}}
                                <header class="card-header">
                                    <h2 class="h3 card-header-title"><strong>Add File:</strong></h2>
                                    <h6><font color="orange"> Required Fields *</font></h6>
                                </header>
                                
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="hidden" name="idwork" class="form-control" id="idwork" value="{{$work->idwork}}">
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <label for="name"><strong><font color="orange">*</font>Name:</strong></label>
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <label for="description"><strong>Description:</strong></label>
                                                <div class="form-group">
                                                <span class="form-icon-wrapper">
                                                    <textarea id="description" type="text" class="form-control" name="description"  rows="4" cols="50">{{old('description')}}</textarea>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-image"></i> File</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file" name="file">
                                                    <label class="custom-file-label" for="file">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <footer class="card-footer">
                                    <div class="form-group" id="guardar">
                                            <button class="btn btn-danger" type="reset"><i class="fas fa-ban"></i> Reset</button>
                                            <button class="btn btn-info" type="submit"><i class="far fa-save"></i> Add</button>
                                    </div>
                                </footer>
                                {!!Form::close()!!}
                            </div>
                              
                        </div>

                        <footer class="card-footer">
                              
                        </footer>
                    </div>
            </div>
        </div>
</div>
<script>
      $('#file').on('change',function(){
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
      })
</script>
@push ('scripts')
    <script>
        

        function validardecimal(e,txt) 
        {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true;
            if (tecla==46 && txt.indexOf('.') != -1) return false;
            patron = /[\d\.]/;
            te = String.fromCharCode(tecla);
            return patron.test(te); 
        }  

        function validarentero(e,txt) 
        {
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla==8)
            {
                return true;
            }
        
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final); 
        }
    </script>
@endpush
@endsection