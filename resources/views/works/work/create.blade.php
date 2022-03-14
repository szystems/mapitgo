@extends ('layouts.admin')
@section ('contenido')


<div>
        <div class="card mb-4">
            <header class="card-header">
                  <h2 class="h3 card-header-title"><strong>Create Work </strong></h2>
            </header>

            <div class="card-body">
                  <h5 class="h4 card-title">Enter the data you are asked for:</h5>
                  @if (count($errors)>0)
                        <div class="alert alert-danger">
                              <ul>
                                    @foreach ($errors->all() as $error)
                                          <li>{{$error}}</li>
                                    @endforeach
                              </ul>
                        </div>
                  @endif

                {!!Form::open(array('url'=>'works/work','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                <div class="row">
                    <input type="hidden" name="idadmin" class="form-control" id="idadmin" value="{{ Auth::user()->id}}">
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group">
                            <a href="{{url('seguridad\client\create')}}">
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Create Client">
                                    <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                                        <i class="far fa-plus-square"></i>
                                    </button>
                                </span>
                            </a>
                            <label for="idclient">Client</label>
                            <select name="idclient" id="idclient" class="form-control selectpicker"  data-live-search="true">
                                  <option value="">Search Client Name / Email / Phone</option>
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
                                <select name="idvehicle_power_unit" class="form-control selectpicker"  data-live-search="true">
                                    <option value="">All (Search by: # / #Plate / Make / Model / Year / Type)</option>
                                    @foreach ($vehicles_power_unit as $vehiclePU)
                                    <option value="{{$vehiclePU->idvehicle}}">{{$vehiclePU->number_vehicle}} / {{$vehiclePU->no_plate}} / {{$vehiclePU->make}} / {{$vehiclePU->model}} / {{$vehiclePU->year}} / {{$vehiclePU->type}} - {{$vehiclePU->trailer_or_unit_type}}</option>
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
                            <label for="idvehicle_power_unit">Trailer</label>
                                <select name="idvehicle_trailer" class="form-control selectpicker"  data-live-search="true">
                                    <option value="">All (Search by: # / #Plate / Make / Model / Year / Type)</option>
                                    @foreach ($vehicles_trailer as $vehicleT)
                                    <option value="{{$vehicleT->idvehicle}}">{{$vehicleT->number_vehicle}} / {{$vehicleT->no_plate}} / {{$vehicleT->make}} / {{$vehicleT->model}} / {{$vehicleT->year}} / {{$vehicleT->type}} - {{$vehicleT->trailer_or_unit_type}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="reefer_unit_number"><b>If is Reefer</b></label>
                            <input type="text" name="reefer_unit_number"  value="{{old('reefer_unit_number')}}" class="form-control" placeholder="Reefer unit number...">
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
                                  <option value="">Search Driver Name / Email / Phone</option>
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
                            <option value="{{old('days')}}" selected>{{old('days')}}</option>
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
                                <input type="text" name="day_rate-hour_rate" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{old('day_rate-hour_rate')}}" onkeypress="return validardecimal(event,this.value)">
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
                                <input type="text" name="rateCon_amount" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{old('rateCon_amount')}}" onkeypress="return validardecimal(event,this.value)">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group">
                            <label for="accept_quote">Accept Quote</label>
                            <select name="accept_quote" id="accept_quote" class="form-control selectpicker" >
                                  <option selected value="">Not approved</option>
                                  <option value="Approved">Approved</option>
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
                            <input type="text" name="pickup_contact"  value="{{old('pickup_contact')}}" class="form-control" placeholder="Contact...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                      <div class="form-group">
                            <label for="pickup_phone">Phone</label>
                            <input type="text" name="pickup_phone"  value="{{old('pickup_phone')}}" class="form-control" placeholder="Phone...">
                          </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                      <div class="form-group">
                            <label for="map"><b>Choose a point on the map:</b> </label>
                            <p>You can choose a point on the map or if you know directly the latitude and longitude you can put it directly in the corresponding fields, you can also go to <a target="_blank" href="https://www.google.com/maps">Google Maps</a> to collect the information and copy it.</p>
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
                                <input type="text" name="pickup_location_latitude" id="pickup_location_latitude" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{old('pickup_location_latitude')}}">
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
                                <input type="text" name="pickup_location_longitude" id="pickup_location_longitude" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{old('pickup_location_longitude')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                      <div class="form-group">
                            <label for="pickup_address">Address</label>
                            <input type="text" name="pickup_address" id="pickup_address" value="{{old('pickup_address')}}" class="form-control" placeholder="Address...">
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
                            <input type="text" name="delivery_contact"  value="{{old('delivery_contact')}}" class="form-control" placeholder="Contact...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="delivery_phone">Phone</label>
                            <input type="text" name="delivery_phone"  value="{{old('delivery_phone')}}" class="form-control" placeholder="Phone...">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="map"><b>Choose a point on the map:</b></label>
                            <p>You can choose a point on the map or if you know directly the latitude and longitude you can put it directly in the corresponding fields, you can also go to <a target="_blank" href="https://www.google.com/maps">Google Maps</a>  to collect the information and copy it.</p>
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
                                <input type="text" name="delivery_location_latitude" id="delivery_location_latitude" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{old('delivery_location_latitude')}}">
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
                                <input type="text" name="delivery_location_longitude" id="delivery_location_longitude" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{old('delivery_location_longitude')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                      <div class="form-group">
                            <label for="delivery_address">Address</label>
                            <input type="text" name="delivery_address" id="delivery_address" value="{{old('delivery_address')}}" class="form-control" placeholder="Address...">
                          </div>
                    </div>

                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="description">Work Description</label>
                            <span class="form-icon-wrapper">
                                <textarea id="description" type="text" class="form-control" name="description"  rows="4" cols="50">{{old('description')}}</textarea>
				            </span>
                        </div>
                    </div>
                      
                </div>


            </div>

                
                        
              

            <footer class="card-footer">
                  <div class="form-group" id="guardar">
                        <button class="btn btn-danger" type="reset"><i class="fas fa-ban"></i> Reset</button>
                        <button class="btn btn-info" type="submit"><i class="far fa-save"></i> Save</button>
                  </div>

        
            </footer>
        </div>
</div>
    {!!Form::close()!!}
    <script>
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

        var optSimple = {
            format: "dd-mm-yyyy",
            language: "en",
            autoclose: true,
            todayHighlight: true,
            todayBtn: "linked",
        };
        $( '#datepicker' ).datepicker( optSimple );

        $( '#datepicker' ).datepicker( 'setDate', today );
    </script>
@push ('scripts')
    <script>
        function validardecimal(e,txt) 
        {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true;
            if (tecla==46 && txt.indexOf('.') != -1) return false;
            patron = /^\d*\.?\d*$/;
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