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
					
                    <div>
						@foreach (['danger', 'warning', 'success', 'info'] as $msg)
							@if(Session::has('alert-' . $msg))
								<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
							@endif
							{{session()->forget('alert-' . $msg)}}
						@endforeach
										
					</div>
					<!-- Contenido -->

                    <div class="card mb-4">
                        <header class="card-header">
                            <h2 class="h3 card-header-title"><strong>Order: {{$work->workid}}</strong></h2>      
                        </header>
                                     
                        <div class="card-body">
                            <!--<a href="" data-target="#modaleliminarshow-delete-{{$work->idwork}}" data-toggle="modal">
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Cancel Order">
                                    <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button"><i class="fa fa-minus-square"></i> Cancel Order</button>
                                </span>
                            </a>-->
                            @include('vistas.vorden.modaleliminarshow')
                            <a href="{{URL::action('VistaOrderController@edit',$work->idwork)}}">
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Edit Order">
                                        <button class="btn btn-sm btn-warning" style="pointer-events: none;" type="button">
                                            <i class="	fa fa-pencil-square-o"></i> Edit Order
                                        </button>
                                </span>
                            </a> 
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <div class="form-group">
                                            <?php
                                                $fecha = date("m-d-Y", strtotime($work->date));
                                            ?>
                                            <label for="date"><strong>Date</strong></label>
                                            <p>{{$fecha}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <div class="form-group">
                                            <?php
                                                $fecha = date("m-d-Y", strtotime($work->date));
                                            ?>
                                            <label for="date"><strong>Work ID</strong></label>
                                            <p>{{$work->workid}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="state_work"><strong>Work State</strong></label>
                                            @if($work->state_work == "Canceled")
                                            <p><font color="red">{{$work->state_work}}</font></p>
                                            @elseif($work->state_work == "Finalized")
                                            <p><font color="limegreen">{{$work->state_work}}</font></p>
                                            @elseif($work->state_work == "Active")
                                            <p><font color="orange">{{$work->state_work}}</font></p>
                                            @elseif($work->state_work == "Pending")
                                            <p><font color="brown">{{$work->state_work}}</font></p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                            <label for="date"><strong>Accept Quote</strong></label>
                                            <p>@if($work->accept_quote != null) <font color="limegreen">{{$work->accept_quote}}</font> @else <font color="orange">Not approved yet</font> @endif</p>
                                            @if($work->accept_quote == null)
														{{Form::Open(array('action'=>array('VistaOrderController@destroy',$work->idwork),'method'=>'delete'))}}
															<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i> Accept Quote</button>
														{{Form::Close()}}
													@endif
                                        </div>
                                    </div>
                                    <?php
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
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="client"><strong>Client / Phone / Email</strong></label>
                                            <p>{{$clientw->name}} / {{$clientw->phone}} / {{$clientw->email}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="driver"><strong>Driver / Phone / Email</strong></label>
                                            <p>@if (isset($driverw)) {{$driverw->name}} / {{$driverw->phone}} / {{$driverw->email}} @else <p>Not defined</p>@endif</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Power Unit# / #Plate / Make / Model / Year / Type</strong></label>
                                            <p>@if (@isset($vehiclePUw)) {{$vehiclePUw->number_vehicle}} / {{$vehiclePUw->no_plate}} / {{$vehiclePUw->make}} / {{$vehiclePUw->model}} / {{$vehiclePUw->year}} / {{$vehiclePUw->trailer_or_unit_type}} @else <p>Not defined</p>@endif</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Trailer# / #Plate / Make / Model / Year / Type</strong></label>
                                            <p>@if (@isset($vehicleTw)) {{$vehicleTw->number_vehicle}} / {{$vehicleTw->no_plate}} / {{$vehicleTw->make}} / {{$vehicleTw->model}} / {{$vehicleTw->year}} / {{$vehicleTw->trailer_or_unit_type}} / @if($vehicleTw->trailer_or_unit_type == "53’ Reefer") <b> Reefer Unit #=</b> {{$work->reefer_unit_number}} @endif @else <p>Not defined</p>@endif</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="assets_gross"><strong>Total Order</strong></label>
                                            <p> <font color="limegreen"> {{ Auth::user()->coin }}{{number_format($work->assets_gross,2, '.', ',')}}</font></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><h2><strong><u>Pick Up</u></strong></h2></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Contact</strong></label>
                                            <p>{{$work->pickup_contact}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Phone</strong></label>
                                            <p>{{$work->pickup_phone}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Address</strong></label>
                                            <p>{{$work->pickup_address}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><h2><strong><u>Delivery</u></strong></h2></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Contact</strong></label>
                                            <p>{{$work->delivery_contact}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Phone</strong></label>
                                            <p>{{$work->delivery_phone}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Address</strong></label>
                                            <p>{{$work->delivery_address}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Work Description</strong></label>
                                            <span class="form-icon-wrapper">
                                                <textarea readonly id="description" type="text" class="form-control" name="description"  rows="4" cols="50">{{$work->description}}</textarea>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><h2><strong><u>Locations</u></strong></h2></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <!--api google maps-->
                                        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
                                        <script defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC9qYT90AVrfMfbaCR_PUK35h9d9-tcbJw&callback=initMapView&libraries=&v=weekly' async></script>
                                        <!--api google maps end-->
                                        <?php
                                            $numLocations = $locations->count();
                                        ?>
                                        <div id='map1' style='width: 100%; height: 300px;'></div>
                                        
                                        <style type="text/css">
                                            /* Set the size of the div element that contains the map */
                                            #map {
                                                height: 100%;
                                                /* The height is 400 pixels */
                                                width: 100%;
                                                /* The width is the width of the web page */
                                            }
                                        </style>
                                        <script>
                                        
                                            // Initialize and add the map
                                            

                                            function initMapView() {
                                                map = new google.maps.Map(document.getElementById("map1"), {
                                                    @if($work->pickup_location_latitude != null or $work->pickup_location_longitude != null)
                                                        center: { lat: {{$work->pickup_location_latitude}} , lng: {{$work->pickup_location_longitude}} },
                                                        zoom:4,
                                                    @else
                                                        center: { lat: 40.411293902828156 , lng: -101.88586174854017 },
                                                        zoom:4,
                                                    @endif
                                                    
                                                });

                                                    var iconPickup = {
                                                        url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png", // url
                                                        scaledSize: new google.maps.Size(50, 50), // scaled size
                                                    };
                                                    var iconDelivery = {
                                                        url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png", // url
                                                        scaledSize: new google.maps.Size(50, 50), // scaled size
                                                    };
                                                    @if($work->pickup_location_latitude != null or $work->pickup_location_longitude != null)
                                                        marker = new google.maps.Marker({
                                                            position: { lat: {{$work->pickup_location_latitude}} , lng: {{$work->pickup_location_longitude}} },
                                                            map,
                                                            title: "Pickup: {{$work->pickup_contact}}, {{$work->pickup_address}}, {{$work->pickup_phone}}",
                                                            icon: iconPickup
                                                        });
                                                    @endif
                                                    @if($work->delivery_location_latitude != null or $work->delivery_location_longitude != null)
                                                        marker = new google.maps.Marker({
                                                            position: { lat: {{$work->delivery_location_latitude}} , lng: {{$work->delivery_location_longitude}} },
                                                            map,
                                                            title: "Pickup: {{$work->delivery_contact}}, {{$work->delivery_address}}, {{$work->delivery_phone}}",
                                                            icon: iconDelivery
                                                        });
                                                    @endif
                                                @if($numLocations != 0)
                                
                                                    @foreach($locations as $location)
                                                        <?php
                                                            $datetimelocation = $hoy = date("m-d-Y H:i:s", strtotime($location->datetime));
                                                        ?>
                                                        marker = new google.maps.Marker({
                                                            icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
                                                            position: { lat: {{$location->latitude}} , lng: {{$location->longitude}} },
                                                            map,
                                                            title: " {{$location->title}}: {{$location->description}}, {{$datetimelocation}} PST8PDT"
                                                        });
                                                    @endforeach
                                                @endif
                                               

                                            }

                                            
                                        </script> 
                                    </div>
                                    
                                </div>
                            </div>
                        </div>   

                        <footer class="card-footer">

                        </footer>
                    </div>
				</div>
			</div>
		</div>
    </div>
@endsection