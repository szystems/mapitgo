{!! Form::open(array('url'=>'reports/bitacora','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

	<div>
    	<div class="card mb-4">
            <header class="card-header">
				  <h5 class="h3 card-header-title"><strong>Filter by: </strong></h5>
				  <h6><font color="orange"> You can use only one or more search fields to filter your data.</font></h6>
				  <h6><font color="orange"> Required Fields *</font></h6>
            </header>
            <div class="card-body">
                <div class="row">
					<?php
					
					?>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="fecha"></label><font color="orange">*</font>Date:</label>
							<span class="form-icon-wrapper">
								<span class="form-icon form-icon--right">
									<i class="fas fa-calendar-alt form-icon__item"></i>
								</span>
								<input type="text" id="datepickerfecha" class="form-control datepicker" name="fecha" value="">
							</span>
						</div>
					</div>

					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="usuario"></label>User:</label>
							<select name="usuario" class="form-control" value="{{ old('usuario') }}">
								<option value="">All</option>
								@foreach ($usuarios as $usu)
                                <option value="{{$usu->id}}">{{$usu->name}}</option>
                              	@endforeach
							</select>
						</div>
					</div>
					
					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="tipo"></label>Type:</label>
							<select name="tipo" class="form-control" value="{{ old('tipo') }}">
								<option value="">All</option>
								<option value="Security">Security</option>
								<option value="Works">Works</option>
								<option value="Settings">Settings</option>
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
	$( '#datepickerfecha' ).datepicker( optSimple );

	$( '#datepickerfecha' ).datepicker( 'setDate', today );
</script>

    

{{Form::close()}}

	