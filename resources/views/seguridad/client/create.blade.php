@extends ('layouts.admin')
@section ('contenido')

<?php 
    $user = Auth::user(); 
?>

<div class="col-md-6 mb-4">
      <div class="card">
            <header class="card-header">
                  <h2 class="h3 card-header-title"><strong>Create Client </strong></h2>
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

                  {!!Form::open(array('url'=>'seguridad/client','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
                  {{Form::token()}}
                  <h3><strong><u>General Data: </u></strong></h3>
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name"><font color="orange">*</font>Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="User Name...">
                        @if ($errors->has('name'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('name') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                        <label for="birthday"><font color="orange">*</font>Start Date</label>
                        <span class="form-icon-wrapper">
                              <span class="form-icon form-icon--right">
                                    <i class="fas fa-calendar-alt form-icon__item"></i>
                              </span>
                              <input type="text" id="birthday" class="form-control datepicker" name="birthday" >
                        </span>
                  </div>
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email"><font color="orange">*</font>Email</label>
                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="User Email">
                        @if ($errors->has('email'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('email') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone">Phone</label>
                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="User Phone...">
                        @if ($errors->has('phone'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('phone') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address">Address</label>
                        <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="User Address...">
                        @if ($errors->has('address'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('address') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  <!--<div class="form-group{{ $errors->has('driver_license_number') ? ' has-error' : '' }}">
                        <label for="driver_license_number">Driver License Number</label>
                        <input id="driver_license_number" type="text" class="form-control" name="driver_license_number" value="{{ old('driver_license_number') }}" placeholder="Driver license number...">
                        @if ($errors->has('driver_license_number'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('driver_license_number') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  <div class="form-group{{ $errors->has('expiration_day') ? ' has-error' : '' }}">
                        <label for="expiration_day">License Expiration Day</label>
                        <span class="form-icon-wrapper">
                              <span class="form-icon form-icon--right">
                                    <i class="fas fa-calendar-alt form-icon__item"></i>
                              </span>
                              <input type="text" id="expiration_day" class="form-control datepicker" name="expiration_day" >
                        </span>
                  </div>
                  <div class="form-group{{ $errors->has('issuing_state') ? ' has-error' : '' }}">
                        <label for="issuing_state">Issuing State</label>
                        <select id="issuing_state" type="text" class="form-control" name="issuing_state" value="{{ old('issuing_state') }}">
                              <option selected="selected" value="{{ old('issuing_state') }}">{{ old('issuing_state') }}</option>
                              <option value="AL">AL</option>
                              <option value="AK">AK</option>
                              <option value="AZ">AZ</option>
                              <option value="AR">AR</option>
                              <option value="CA">CA</option>
                              <option value="CO">CO</option>
                              <option value="CT">CT</option>
                              <option value="DE">DE</option>
                              <option value="DC">DC</option>
                              <option value="FL">FL</option>
                              <option value="GA">GA</option>
                              <option value="HI">HI</option>
                              <option value="ID">ID</option>
                              <option value="IL">IL</option>
                              <option value="IN">IN</option>
                              <option value="IA">IA</option>
                              <option value="KS">KS</option>
                              <option value="KY">KY</option>
                              <option value="LA">LA</option>
                              <option value="ME">ME</option>
                              <option value="MD">MD</option>
                              <option value="MA">MA</option>
                              <option value="MI">MI</option>
                              <option value="MN">MN</option>
                              <option value="MS">MS</option>
                              <option value="MO">MO</option>
                              <option value="MT">MT</option>
                              <option value="NE">NE</option>
                              <option value="NV">NV</option>
                              <option value="NH">NH</option>
                              <option value="NJ">NJ</option>
                              <option value="NM">NM</option>
                              <option value="NY">NY</option>
                              <option value="NC">NC</option>
                              <option value="ND">ND</option>
                              <option value="OH">OH</option>
                              <option value="OK">OK</option>
                              <option value="OR">OR</option>
                              <option value="PA">PA</option>
                              <option value="RI">RI</option>
                              <option value="SC">SC</option>
                              <option value="SD">SD</option>
                              <option value="TN">TN</option>
                              <option value="TX">TX</option>
                              <option value="UT">UT</option>
                              <option value="VT">VT</option>
                              <option value="VA">VA</option>
                              <option value="WA">WA</option>
                              <option value="WV">WV</option>
                              <option value="WI">WI</option>
                              <option value="WY">WY</option>
                                    
                        </select>
                        @if ($errors->has('issuing_state'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('issuing_state') }}
                                    </strong>
                              </span>
                        @endif
                  </div>

                  <div class="form-group{{ $errors->has('ssn') ? ' has-error' : '' }}">
                        <label for="ssn">SSN</label>
                        <input id="ssn" type="text" class="form-control" name="ssn" value="{{ old('ssn') }}" placeholder="XXX-XX-XXXX">
                        @if ($errors->has('ssn'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('ssn') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  
                  <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-image"></i> License Image</span>
                        </div>
                        <div class="custom-file">
                              <input type="file" class="custom-file-input" id="license_image" name="license_image">
                              <label class="custom-file-label" for="license_image">Choose file</label>
                        </div>
                  </div>

                  <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-image"></i> Medical Card Image</span>
                        </div>
                        <div class="custom-file">
                              <input type="file" class="custom-file-input" id="medical_card_image" name="medical_card_image">
                              <label class="custom-file-label" for="medical_card_image">Choose file</label>
                        </div>
                  </div>-->

                  <h3><strong><u>Security: </u></strong></h3>
                  <div class="form-group{{ $errors->has('user_type') ? ' has-error' : '' }}">
                        <label for="user_type"><font color="orange">*</font>User Type</label>
                        <select id="user_type" type="text" class="form-control" name="user_type" value="{{ old('user_type') }}">
                              <option selected="selected" value="{{ old('user_type') }}">{{ old('user_type') }}</option>
                              <option value="CLIENT">CLIENT</option>
                                    
                        </select>
                        @if ($errors->has('user_type'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('user_type') }}
                                    </strong>
                              </span>
                        @endif
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
<script>
      $('#license_image').on('change',function(){
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
      })
      
      $('#medical_card_image').on('change',function(){
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
      })
</script>
<script>
	var date = new Date();
	var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
	var tomorrow = new Date(today);
	tomorrow.setDate(tomorrow.getDate() + 1);
	var optSimple = {
		format: "mm-dd-yyyy",
    	language: "en",
    	autoclose: true,
		todayHighlight: true,
		todayBtn: "linked",
	};

	$( '#birthday' ).datepicker( optSimple );
      $( '#expiration_day' ).datepicker( optSimple );

	$( '#birthday').datepicker( 'setDate', today );
      $( '#expiration_day').datepicker( 'setDate', today );
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