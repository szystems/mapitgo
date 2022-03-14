@extends ('layouts.admin')
@section ('contenido')


<div>
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
            <header class="card-header">
                  <h2 class="h3 card-header-title"><strong>Vehicle: {{$vehicle->number_vehicle}}</strong></h2>
                  
            </header>
            {{Form::open(array('action' => 'ReportesController@vehicleview','method' => 'POST','role' => 'form', 'target' => '_blank'))}}

                {{Form::token()}}		
					<div class="card mb-4">
						<header class="card-header d-md-flex align-items-center">
							<h4><strong>Print Vehicle </strong></h4>
							<input type="hidden" id="rid" class="form-control datepicker" name="rid" value="{{$vehicle->idvehicle}}">
                            <input type="hidden" id="rnombre" class="form-control datepicker" name="rnombre" value="{{$vehicle->number_vehicle}}">
						</header>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
									<div class="form-group mb-2">
										<select name="pdf" class="form-control" value="">
												<option value="Descargar" selected>Download</option>
												<option value="Navegador">View in Browser</option>
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
            <div class="card-body">
                <a href="{{URL::action('VehicleController@edit',$vehicle->idvehicle)}}">
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Edit Vehicle">
                        <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button"><i class="far fa-edit"></i> Edit</button>
                    </span>
                  </a>
								
				  <a href="" data-target="#modaleliminarshow-delete-{{$vehicle->idvehicle}}" data-toggle="modal">
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Delete Vehicle">
                        <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button"><i class="far fa-minus-square"></i> Delete</button>
                    </span>
				  </a>
                  <div class="row">
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="number_vehicle"><strong>Number Vehicle</strong></label>
                            <p>{{$vehicle->number_vehicle}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="other_id"><strong>Other ID</strong></label>
                            <p>{{$vehicle->other_id}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="make"><strong>Make</strong></label>
                            <p>{{$vehicle->make}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="model"><strong>Model</strong></label>
                            <p>{{$vehicle->model}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="year"><strong>Year</strong></label>
                            <p>{{$vehicle->year}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="capacity"><strong>Capacity</strong></label>
                            <p>{{$vehicle->capacity}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="type"><strong>Type</strong></label>
                            <p>{{$vehicle->type}} / {{$vehicle->trailer_or_unit_type}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="no_plate"><strong>No.Plate</strong></label>
                            <p>{{$vehicle->no_plate}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="additional_licencing"><strong>Additional Licencing</strong></label>
                            <p>{{$vehicle->oregon_weight}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="state"><strong>Status</strong></label>
                            <p>{{$vehicle->state_vehicle}}</p>
                        </div>
                    </div>
                  </div>
            </div>
			@include('works.vehicle.modaleliminarshow')
                
                        
              

            <footer class="card-footer">
                  

        
            </footer>
      </div>
</div>
   
@endsection