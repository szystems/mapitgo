{!! Form::open(array('url'=>'reports/works','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

<div>
    	<div class="card mb-4">
			<input type="hidden" class="form-control" name="xsearch" value="xfil">
            <header class="card-header">
				  <h5 class="h3 card-header-title"><strong>Filter by: </strong></h5>
				  <h6><font color="orange"> You can use only one or more search fields to filter your data.</font></h6>
				  <h6><font color="orange"> Required Fields *</font></h6>
            </header>
            <div class="card-body">
                <div class="row">
					<?php
					
					?>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group mb-2">
							<label for="desde"></label><font color="orange">*</font>From:</label>
							<span class="form-icon-wrapper">
								<span class="form-icon form-icon--right">
									<i class="fas fa-calendar-alt form-icon__item"></i>
								</span>
								<input type="text" id="datepickerdesde" class="form-control datepicker" name="desde">
							</span>
						</div>
					</div>

					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group mb-2">
							<label for="hasta"></label><font color="orange">*</font>To:</label>
							<span class="form-icon-wrapper">
								<span class="form-icon form-icon--right">
									<i class="fas fa-calendar-alt form-icon__item"></i>
								</span>
								<input type="text" id="datepickerhasta" class="form-control datepicker" name="hasta">
							</span>
						</div>
					</div>

					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group mb-2">
							<label for="idadmin"></label>Admin:</label>
							<select name="idadmin" class="form-control selectpicker"  data-live-search="true">
								<option value="">All (Search by: Name / Email / Phone)</option>
								@foreach ($admins as $admin)
                                <option value="{{$admin->id}}">{{$admin->name}} / {{$admin->email}} / {{$admin->phone}}</option>
                              	@endforeach
							</select>
						</div>
					</div>

					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group mb-2">
							<label for="idclient"></label>Client:</label>
							<select name="idclient" class="form-control selectpicker"  data-live-search="true">
								<option value="">All (Search by: Name / Email / Phone)</option>
								@foreach ($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}} / {{$client->email}} / {{$client->phone}}</option>
                              	@endforeach
							</select>
						</div>
					</div>
					
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group mb-2">
							<label for="iddriver"></label>Driver:</label>
							<select name="iddriver" class="form-control selectpicker"  data-live-search="true">
								<option value="">All (Search by: Name / Email / Phone)</option>
								@foreach ($drivers as $driver)
                                <option value="{{$driver->id}}">{{$driver->name}} / {{$driver->email}} / {{$driver->phone}}</option>
                              	@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group mb-2">
							<label for="idvehicle_power_unit"></label>Power Unit:</label>
							<select name="idvehicle_power_unit" class="form-control selectpicker"  data-live-search="true">
								<option value="">All (Search by: # / #Plate / Make / Model / Year / Type)</option>
								@foreach ($vehicles_power_unit as $vehiclePU)
                                <option value="{{$vehiclePU->idvehicle}}">{{$vehiclePU->number_vehicle}} / {{$vehiclePU->no_plate}} / {{$vehiclePU->make}} / {{$vehiclePU->model}} / {{$vehiclePU->year}} / {{$vehiclePU->type}} - {{$vehiclePU->trailer_or_unit_type}}</option>
                              	@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group mb-2">
							<label for="idvehicle_trailer"></label>Trailer:</label>
							<select name="idvehicle_trailer" class="form-control selectpicker"  data-live-search="true">
								<option value="">All (Search by: # / #Plate / Make / Model / Year / Type)</option>
								@foreach ($vehicles_trailer as $vehicleT)
                                <option value="{{$vehicleT->idvehicle}}">{{$vehicleT->number_vehicle}} / {{$vehicleT->no_plate}} / {{$vehicleT->make}} / {{$vehicleT->model}} / {{$vehicleT->year}} / {{$vehicleT->type}} - {{$vehicleT->trailer_or_unit_type}}</option>
                              	@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group mb-2">
							<label for="state"></label>Status:</label>
							<select name="state" class="form-control">
								<option value="">All</option>
								<option value="Active">Pending</option>
								<option value="Active">Active</option>
								<option value="Finalized">Finalized</option>
								<option value="Canceled">Canceled</option>
							</select>
						</div>
					</div>
					
				</div>


            </div>
                
                        
              

            <footer class="card-footer">
                <div class="form-group">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-info">
									<i class="fas fa-search"></i> Search
								</button>
							</span>
						</div>

        
            </footer>
    	</div>
	</div>

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
	$( '#datepickerdesde' ).datepicker( optSimple );

	$( '#datepickerhasta' ).datepicker( optSimple );

	$( '#datepickerdesde,#datepickerhasta' ).datepicker( 'setDate', today );
</script>

    

{{Form::close()}}

	