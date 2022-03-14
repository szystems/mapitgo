@extends ('layouts.admin')
@section ('contenido')

<div class="col-md-6 mb-4">
      <div class="card">
            <header class="card-header">
                  <h2 class="h3 card-header-title"><strong>Create Vehicle</strong></h2>
            </header>

            <div class="card-body">
                  <h5 class="h4 card-title">Enter the data you are asked for:</h5>
                  <h6><font color="orange"> Required Fields *</font></h6>
                  @if (count($errors)>0)
                        <div class="alert alert-danger">
                              <ul>
                                    @foreach ($errors->all() as $error)
                                          <li>{{$error}}</li>
                                    @endforeach
                              </ul>
                        </div>
                  @endif

                  {!!Form::open(array('url'=>'works/vehicle','method'=>'POST','autocomplete'=>'off'))!!}
                  {{Form::token()}}
                  <h3><strong><u>New Vechicle: </u></strong></h3>
                  <div class="form-group{{ $errors->has('number_vehicle') ? ' has-error' : '' }}">
                        <label for="number_vehicle"><font color="orange">*</font>Vehicle Number</label>
                        <input id="number_vehicle" type="text" class="form-control" name="number_vehicle" value="{{ old('number_vehicle') }}" placeholder="Vehicle Number...">
                        @if ($errors->has('number_vehicle'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('number_vehicle') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  <div class="form-group{{ $errors->has('other_id') ? ' has-error' : '' }}">
                        <label for="other_id">Other ID</label>
                        <input id="other_id" type="text" class="form-control" name="other_id" value="{{ old('other_id') }}" placeholder="Other ID...">
                        @if ($errors->has('other_id'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('other_id') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  <div class="form-group{{ $errors->has('make') ? ' has-error' : '' }}">
                        <label for="make">Make</label>
                        <input id="make" type="text" class="form-control" name="make" value="{{ old('make') }}" placeholder="Make...">
                        @if ($errors->has('make'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('make') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                        <label for="model">Model</label>
                        <input id="model" type="text" class="form-control" name="model" value="{{ old('model') }}" placeholder="Model...">
                        @if ($errors->has('model'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('model') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                        <label for="year">Year</label>
                        <input id="year" type="text" class="form-control" name="year" value="{{ old('year') }}" placeholder="Year...">
                        @if ($errors->has('year'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('year') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  <div class="form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
                        <label for="capacity">Capacity</label>
                        <input id="capacity" type="text" class="form-control" name="capacity" value="{{ old('capacity') }}" placeholder="Capacity...">
                        @if ($errors->has('capacity'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('capacity') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                        <label for="type"><font color="orange">*</font>Type</label>
                        <select id="type" type="text" class="form-control" name="type" value="{{ old('type') }}">
                              <option selected="selected" value="{{ old('type') }}">{{ old('type') }}</option>
                              <option value="Power Unit">Power Unit</option>
                              <option value="Trailer">Trailer</option>
                        </select>
                        @if ($errors->has('type'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('type') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  <div class="form-group{{ $errors->has('trailer_or_unit_type') ? ' has-error' : '' }}">
                        <label for="trailer_or_unit_type"><font color="orange">*</font>Trailer or Unit Type</label>
                        <select id="trailer_or_unit_type" type="text" class="form-control" name="trailer_or_unit_type" value="{{ old('trailer_or_unit_type') }}">
                              <option selected="selected" value="{{ old('trailer_or_unit_type') }}">{{ old('trailer_or_unit_type') }}</option>
                              <option value="Sleeper Tractor">Sleeper Tractor(Power Unit)</option>
                              <option value="Daycab Tractor">Daycab Tractor(Power Unit)</option>
                              <option value="53’ Dry Van">53’ Dry Van(Trailer)</option>
                              <option value="53’ Reefer">53’ Reefer(Trailer)</option>
                              <option value="20’ Intermodal Container">20’ Intermodal Container(Trailer)</option>
                        </select>
                        @if ($errors->has('trailer_or_unit_type'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('trailer_or_unit_type') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  <div class="form-group{{ $errors->has('no_plate') ? ' has-error' : '' }}">
                        <label for="no_plate">Number Plate</label>
                        <input id="no_plate" type="text" class="form-control" name="no_plate" value="{{ old('no_plate') }}" placeholder="Number Plate...">
                        @if ($errors->has('no_plate'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('no_plate') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  <div class="form-group{{ $errors->has('additional_licencing') ? ' has-error' : '' }}">
                        <label for="additional_licencing">Additional Licencing</label>
                        <input id="additional_licencing" type="text" class="form-control" name="additional_licencing" value="{{ old('additional_licencing') }}" placeholder="Additional Licencing...">
                        @if ($errors->has('additional_licencing'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('additional_licencing') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  <div class="form-group">
				<label class="d-flex align-items-center justify-content-between">
					<span class="form-label-text">Status</span>
					<div class="form-toggle">
                                    <input name="state_vehicle" type="checkbox" value="Enabled" checked>
						<div class="form-toggle__item">
							<i class="fa" data-check-icon="&#xf00c" data-uncheck-icon="&#xf00d"></i>
						</div>
					</div>
				</label>
                  </div>
                  
                  
                  
                  
            </div>

            <footer class="card-footer">
                  <div class="form-group">
                        <button class="btn btn-danger" type="reset"><i class="fas fa-ban"></i> Reset</button>
                        <button class="btn btn-info" type="submit"><i class="far fa-save"></i> Save</button>
                  </div>

                  {!!Form::close()!!}
            </footer>
      </div>
</div>


@endsection