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
                            <h2 class="h3 card-header-title"><strong>Orders</strong></h2>
							<a href="vorden/create">
							<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Create Work ">
								<button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
								<i class="fa fa-plus-square"></i> New Order
								</button>
							</span>
						</a>      
                        </header>
                                     
                        <div class="card-body">
							<div class="row">

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									@include('vistas.vorden.searchCodigo')
									<div>
        
										@foreach (['danger', 'warning', 'success', 'info'] as $msg)
											@if(Session::has('alert-' . $msg))
												<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
											@endif
											{{session()->forget('alert-' . $msg)}}
										@endforeach
										
									</div>
									<br>
									@if($searchCode != null)
										<h6><strong>code searched:</strong><font color="Blue"> {{ $searchCode}}</font></h6>
									@endif
									<div class="table-responsive">
										<table class="table table-striped table-bordered table-condensed table-hover">
											<thead>
												<?php
													$cuantos = count($works);
												?>
												<th><h5><strong><i class="fa fa-sliders-h"></i></strong></h5></th>
												<th><h5><strong>Date</strong></h5></th>
												<th><h5><strong>Work ID</strong></h5></th>
												<th><h5><strong>Driver</strong></h5></th>
												<th><h5><strong>Power Unit# / #Plate / Make / Model / Year / Type</strong></h5></th>
												<th><h5><strong>Trailer# / #Plate / Make / Model / Year / Type</strong></h5></th>
												<th><h5><strong>Days</strong></h5></th>
												<th><h5><strong>Total</strong></h5></th>
												<th><h5><strong>State</strong></h5></th>
												
											</thead>
										@foreach ($works as $work)
											<tr>
												<td align="left">
													<!--<a href="" data-target="#modal-delete-{{$work->idwork}}" data-toggle="modal">
														<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Cancel Order">
															<button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
																<i class="fa fa-minus-square"></i>
															</button>
														</span>
													</a>-->
													<a href="{{URL::action('VistaOrderController@show',$work->idwork)}}">
														<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="View Order">
															<button class="btn btn-sm btn-primary" style="pointer-events: none;" type="button">
																<i class="fa fa-eye"></i>
															</button>
														</span>
													</a>
													<a href="{{URL::action('VistaOrderController@edit',$work->idwork)}}">
														<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Edit Order">
															<button class="btn btn-sm btn-warning" style="pointer-events: none;" type="button">
																	<i class="fa fa-pencil-square-o"></i>
															</button>
														</span>
													</a> 
												</td>
												<?php
													$fecha = date("m-d-Y", strtotime($work->date));

													$client=DB::table('users')
													->where('id','=',$work->idclient)
													->first();

													$driver=DB::table('users')
													->where('id','=',$work->iddriver)
													->first();

													$vehiclePU=DB::table('vehicle')
													->where('idvehicle','=',$work->idvehicle_power_unit)
													->first();

													$vehicleT=DB::table('vehicle')
													->where('idvehicle','=',$work->idvehicle_trailer)
													->first();
															
												?>
												<td align="left"><h5>{{ $fecha}}</h5></td>
												<td align="left"><h5>{{ $work->workid}}</h5></td>
												<td align="left"><h5>@isset($driver) {{ $driver->name}} @endisset</h5></td>
												<td align="left"><h5>@isset($vehiclePU) {{ $vehiclePU->number_vehicle}} / {{$vehiclePU->trailer_or_unit_type}} @endisset</h5></td>
												<td align="left"><h5>@isset($vehicleT) {{ $vehicleT->number_vehicle}} / {{$vehicleT->trailer_or_unit_type}} / @if($vehicleT->trailer_or_unit_type == "53’ Reefer") {{$work->reefer_unit_number}} @endif @endisset</h5></td>
												<td align="center"><h5>{{$work->days}}</h5></td>
												<td align="right">
													<h5><font color="blue">{{ Auth::user()->coin }}{{number_format($work->assets_gross,2, '.', ',')}}</font></h5>
													@if($work->accept_quote == null)
														{{Form::Open(array('action'=>array('VistaOrderController@destroy',$work->idwork),'method'=>'delete'))}}
															<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i> Accept Quote</button>
														{{Form::Close()}}
													@else
													<p><font color="limegreen"><strong>Approved</strong></font></p>
													@endif
													
												</td>
												<td align="center"><h5>
													@if ($work->state_work == "Pending")<font color="brown">{{ $work->state_work}} </font> @endif
													@if ($work->state_work == "Active")<font color="orange">{{ $work->state_work}} </font> @endif
													@if ($work->state_work == "Finalized")<font color="green">{{ $work->state_work}} </font> @endif
													@if ($work->state_work == "Canceled")<font color="Red">{{ $work->state_work}} </font> @endif
												</h5></td>
											</tr>
											@include('vistas.vorden.modal')
										@endforeach
										</table>
									</div>
									
									{{$works->render()}}
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