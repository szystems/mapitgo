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
                  <h2 class="h3 card-header-title"><strong>User: {{$usuario->name}}</strong></h2>
                  
            </header>
            {{Form::open(array('action' => 'ReportesController@vistaclient','method' => 'POST','role' => 'form', 'target' => '_blank'))}}

                {{Form::token()}}		
					<div class="card mb-4">
						<header class="card-header d-md-flex align-items-center">
							<h4><strong>Print User Info</strong></h4>
							<input type="hidden" id="rid" class="form-control datepicker" name="rid" value="{{$usuario->id}}">
                            <input type="hidden" id="rnombre" class="form-control datepicker" name="rnombre" value="{{$usuario->name}}">
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
            <div class="card-body">
                <a href="{{URL::action('ClientController@edit',$usuario->id)}}">
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Edit Client">
                        <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button"><i class="far fa-edit"></i> Edit</button>
                    </span>
                  </a>
				  @if ($usuario->principal  == 'NO')			
                    <a href="" data-target="#modaleliminarshow-delete-{{$usuario->id}}" data-toggle="modal">
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Delete Client">
                            <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button"><i class="far fa-minus-square"></i> Delete</button>
                        </span>
                    </a>
                  @endif
                  <div class="row">
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="name"><strong>Name</strong></label>
                            <p>{{$usuario->name}}</p>
                        </div>
                    </div>
                    <?php
                        $birthday = date("m-d-Y", strtotime($usuario->birthday));

                        $birth = new DateTime($usuario->birthday);
                        $today = new DateTime();
                        $years = $today->diff($birth);
                        $age = $years->y;
                    ?>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="birthday"><strong>Start Date</strong></label>
                            <p>{{$birthday}} ({{$age}} Years)</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="email"><strong>Email</strong></label>
                            <p>{{$usuario->email}}</p>
                        </div>
                    </div>
                    <!--<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="empresa"><strong>Company</strong></label>
                            <p>{{$usuario->empresa}}</p>
                        </div>
                    </div>-->
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="phone"><strong>Phone</strong></label>
                            <p>{{$usuario->phone}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="address"><strong>Address</strong></label>
                            <p>{{$usuario->address}}</p>
                        </div>
                    </div>
                    <!--<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="driver_number_license"><strong>Driver License Number</strong></label>
                            <p>{{$usuario->driver_license_number}}</p>
                        </div>
                    </div>
                    <?php
                        $expiration = date("m-d-Y", strtotime($usuario->expiration_day));
                    ?>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="expiration_day"><strong>Expiration Day</strong></label>
                            <p>{{$expiration}})</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="issuing_state"><strong>Issuing State</strong></label>
                            <p>{{$usuario->issuing_state}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="ssn"><strong>SSN</strong></label>
                            <p>{{$usuario->ssn}}</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="user_type"><strong>User Type</strong></label>
                            <p>{{$usuario->user_type}}</p>
                        </div>
                    </div>
                    @if ($usuario->license_image != null)
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="license_image"><strong>License Image</strong></label>
                            <p><img src="{{asset('images/licenses/'.$usuario->license_image)}}" height="300px"  class="img-thumbnail"></p>
                        </div>
                    </div>
                    @endif
                    @if ($usuario->medical_card_image != null)
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="medical_card_image"><strong>Medical Card Image</strong></label>
                            <p><img src="{{asset('images/licenses/'.$usuario->medical_card_image)}}" height="300px"  class="img-thumbnail"></p>
                        </div>
                    </div>
                    @endif-->
                    
                  </div>
            </div>
			@include('seguridad.client.modaleliminarshow')
                
                        
              

            <footer class="card-footer">
                  

        
            </footer>
      </div>
</div>
   
@endsection