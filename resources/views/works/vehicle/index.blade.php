@extends ('layouts.admin')
@section ('contenido')
<div class="card mb-4">
	<!--Mensaje de abono correcto-->
	<div class="flash-message">
		@foreach (['danger', 'warning', 'success', 'info'] as $msg)
			@if(Session::has('alert-' . $msg))

				<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
			@endif
			{{session()->forget('alert-' . $msg)}}
		@endforeach
	</div> 
	<!-- fin .flash-message -->
						<!-- Card Header -->
	<header class="card-header d-md-flex align-items-center">
		<h4><strong>Vehicles</strong>

			<a href="vehicle/create">
                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Create Vehicle ">
                    <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                        <i class="far fa-plus-square"></i> Create Vehicle
                    </button>
                </span>
			</a>

		</h4>
		
	</header>

	<div class="card-body">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				{{Form::open(array('action' => 'ReportesController@reportvehicles','method' => 'POST','role' => 'form', 'target' => '_blank'))}}

                {{Form::token()}}
					
					<div class="card mb-4">
						<header class="card-header d-md-flex align-items-center">
							<h4><strong>Print Vehicles List </strong></h4>
							
						</header>
						<div class="card-body">
							<div class="row">
							<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
									<div class="form-group mb-2">
										<select name="pdf" class="form-control" value="">
												<option value="Descargar" selected>Download</option>
												<option value="Navegador">View in browser</option>
											</select>
									</div>
								</div>
								<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
									<div class="form-group mb-2">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-danger">
												<i class="fa fa-file-pdf"></i> PDF
											</button>
										</span>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
				{{Form::close()}}
				@include('works.vehicle.search')
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th><h5><STRONG><i class="fa fa-sliders-h"></i></STRONG></h5></th>
							<th><h5><STRONG>Vehicle Number</STRONG></h5></th>
							<th><h5><STRONG>No. Plate</STRONG></h5></th>
							<th><h5><STRONG>Other ID</STRONG></h5></th>
							<th><h5><STRONG>Type</STRONG></h5></th>
							<th><h5><STRONG>Make/Model/Year/Capacity</STRONG></h5></th>
							<th><h5><STRONG>Additional Licencing</STRONG></h5></th>
							<th><h5><STRONG>Status</STRONG></h5></th>
							
						</thead>
		               @foreach ($vehicles as $vehi)
						<tr>
							<td>

								<a href="{{URL::action('VehicleController@show',$vehi->idvehicle)}}">
									<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="View Vehicle">
										<button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
											<i class="far fa-eye"></i>
										</button>
									</span>
								</a>

								<a href="{{URL::action('VehicleController@edit',$vehi->idvehicle)}}">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Edit Vehicle">
                                          <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
                                                <i class="far fa-edit"></i>
                                          </button>
                                    </span>
								</a>
								  
								<a href="" data-target="#modal-delete-{{$vehi->idvehicle}}" data-toggle="modal">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Delete Vehicle">
                                          <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
                                                <i class="far fa-minus-square"></i>
                                          </button>
                                    </span>
								</a>

							</td>
							<td align="left"><h5>{{ $vehi->number_vehicle}}</h5></td>
							<td align="center"><h5>{{ $vehi->no_plate}}</h5></td>
							<td align="center"><h5>{{ $vehi->other_id}}</h5></td>
							<td align="center"><h5>{{ $vehi->type}} / {{$vehi->trailer_or_unit_type}}</h5></td>
							<td align="center"><h5>{{ $vehi->make}} / {{ $vehi->model}} / {{ $vehi->year}} / {{ $vehi->capacity}}</h5></td>
							<td align="left"><h5>{{ $vehi->oregon_weight}}</h5></td>
							<td align="left"><h5>{{ $vehi->state_vehicle}}</h5></td>
							
						</tr>
						@include('works.vehicle.modal')
						@endforeach
					</table>
				</div>
				{{$vehicles->render()}}
			</div>
		</div>
	</div>
</div>
@endsection