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
		</div> <!-- fin .flash-message -->
	<!-- Card Header -->
	<header class="card-header d-md-flex align-items-center">
		
					<?php
                    if (isset($mensaje))
                    {
                    ?> 
                        <div class="alert alert-warning">
                            <ul>
                                {{$mensaje}}
                            </ul>
                        </div>
                    <?php
                    }
                    ?> 
		<h4><strong>Works </strong>
			@if(Auth::user()->user_type == "ADMIN")
			<a href="work/create">
                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Create Work ">
                    <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                        <i class="far fa-plus-square"></i> Create Work
                    </button>
                </span>
			</a>
			@endif

		</h4>
		
	</header>

	<div class="card-body">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				@include('works.work.search')
				@include('works.work.searchCodigo')
				<?php
								$desde = date("d-m-Y", strtotime($desde));
								$hasta = date("d-m-Y", strtotime($hasta));
								if($desde == '01-01-1970' or $hasta == '01-01-1970')
								{
									$desde = null;
									$hasta = null;
								}
								
							?>
				<h6><strong>Filters:</strong><font color="Blue"> <strong>From:</strong> '{{ $desde}}', <strong>To:</strong> '{{ $hasta}}', <strong>Admin:</strong> '@foreach($adminfiltro as $adminf){{$adminf->name}}@endforeach', <strong>Client:</strong> '@foreach($clientfiltro as $clientf){{$clientf->name}}@endforeach', <strong>Driver:</strong> '@foreach($driverfiltro as $driverf){{$driverf->name}}@endforeach', <strong>Power Unit:</strong> '@foreach($vehiclepowerunitfiltro as $vehiclepuf){{$vehiclepuf->number_vehicle}}@endforeach', <strong>Trailer:</strong> '@foreach($vehicletrailerfiltro as $vehicletf){{$vehicletf->number_vehicle}}@endforeach', <strong>State:</strong> '{{ $state_work}}'</font></h6>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th><h5><strong><i class="fa fa-sliders-h"></i></strong></h5></th>
							<th><h5><strong>Date / Work ID</strong></h5></th>
							<th><h5><strong>Client</strong></h5></th>
							<th><h5><strong>Driver</strong></h5></th>
							<th><h5><strong>#/Power Unit</strong></h5></th>
							<th><h5><strong>#/Trailer</strong></h5></th>
							@if(Auth::user()->user_type == "ADMIN")
							<th><h5><strong>Days</strong></h5></th>
							<th><h5><strong>Total Driver</strong></h5></th>
							<th><h5><strong>Total Liabilities</strong></h5></th>
							<th><h5><strong>Total After Reduct</strong></h5></th>
							<th><h5><strong>RateCon Amount</strong></h5></th>
							@endif
							<th><h5><strong>Status</strong></h5></th>
							<th><h5><strong>Admin</strong></h5></th>
							
						</thead>
		               @foreach ($works as $work)
					   @if(Auth::user()->user_type == "ADMIN")
					   		<tr>
								<td align="left">
									<a href="{{URL::action('WorkController@show',$work->idwork)}}">
										<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="View Work">
											<button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
												<i class="far fa-eye"></i>
											</button>
										</span>
									</a>
									<a href="{{URL::action('WorkController@edit',$work->idwork)}}">
										<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Edit Work">
											<button class="btn btn-sm btn-warning" style="pointer-events: none;" type="button">
												<i class="far fa-edit"></i>
											</button>
										</span>
									</a> 
									@if(Auth::user()->user_type == "ADMIN")
										@if($work->state_work != "Canceled")
										<a href="" data-target="#modal-delete-{{$work->idwork}}" data-toggle="modal">
											<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Cancel Work">
												<button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
													<i class="fa fa-ban"></i>
												</button>
											</span>
										</a>
										@endif
									@endif
								</td>
								<?php
									$fecha = date("m-d-Y", strtotime($work->date));

									$admin=DB::table('users')
									->where('id','=',$work->idadmin)
									->first();

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
								<td align="left"><h5>{{ $fecha}} {{ $work->workid}}</h5></td>
								<td align="left"><h5>{{ $client->name}}</h5></td>
								<td align="left"><h5>@isset($driver) {{ $driver->name}} @endisset</h5></td>
								<td align="left"><h5>@isset($vehiclePU) {{ $vehiclePU->number_vehicle}} / {{$vehiclePU->trailer_or_unit_type}} @endisset</h5></td>
								<td align="left"><h5>@isset($vehicleT) {{ $vehicleT->number_vehicle}} / {{$vehicleT->trailer_or_unit_type}} / @if($vehicleT->trailer_or_unit_type == "53’ Reefer") {{$work->reefer_unit_number}} @endif @endisset</h5></td>
								@if(Auth::user()->user_type == "ADMIN")
								<td align="center"><h5>{{$work->days}}</h5></td>
								<td align="right"><h5><font color="Red">{{ Auth::user()->coin }}{{number_format($work->total_driver,2, '.', ',')}}</font></h5></td>
								<td align="right"><h5><font color="orange">{{ Auth::user()->coin }}{{number_format($work->total_liabilities,2, '.', ',')}}</font></h5></td>
								<td align="right"><h5><font color="limegreen">{{ Auth::user()->coin }}{{number_format($work->total_after_reduct,2, '.', ',')}}</font></h5></td>
								@if($work->state_work == "Canceled")
								<td align="right">
									<h5><font color="blue"><del>{{ Auth::user()->coin }}{{number_format($work->assets_gross,2, '.', ',')}}</del></font></h5>
									<small>
										@if($work->accept_quote == "Approved") 
											<font color="limegreen"><strong>{{$work->accept_quote}}</strong></font> 
										@else 
											<a href="{{URL::action('WorkController@edit',$work->idwork)}}">
												<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Needs approval">
													<button class="btn btn-sm btn-warning" style="pointer-events: none;" type="button">
														<i class="far fa-edit"></i>Needs approval
													</button>
												</span>
											</a>
										@endif
									</small>
								</td>
								@else
								<td align="right">
									<h5><font color="blue">{{ Auth::user()->coin }}{{number_format($work->assets_gross,2, '.', ',')}}</font></h5>
									<small>
										@if($work->accept_quote == "Approved") 
											<font color="limegreen"><strong>{{$work->accept_quote}}</strong></font> 
										@else 
											<a href="{{URL::action('WorkController@edit',$work->idwork)}}">
												<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Needs approval">
													<button class="btn btn-sm btn-warning" style="pointer-events: none;" type="button">
														<i class="far fa-edit"></i>Needs approval
													</button>
												</span>
											</a>
										@endif
									</small>
								</td>
								@endif
								@endif
								<td align="center"><h5>
									@if ($work->state_work == "Pending")<font color="brown">{{ $work->state_work}} </font> @endif
									@if ($work->state_work == "Active")<font color="orange">{{ $work->state_work}} </font> @endif
									@if ($work->state_work == "Finalized")<font color="limegreen">{{ $work->state_work}} </font> @endif
									@if ($work->state_work == "Canceled")<font color="Red">{{ $work->state_work}} </font> @endif
								</h5></td>

								<td align="left"><h5>{{ $admin->name}}</h5></td>
							</tr>
							
							@include('works.work.modal')
					   @elseif(Auth::user()->user_type == "DRIVER")
							@if($work->iddriver == Auth::user()->id)
								<tr>
									<td align="left">
										
										<a href="{{URL::action('WorkController@show',$work->idwork)}}">
											<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="View Work">
												<button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
													<i class="far fa-eye"></i>
												</button>
											</span>
										</a>
										<a href="{{URL::action('WorkController@edit',$work->idwork)}}">
											<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Edit Work">
												<button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
														<i class="far fa-edit"></i>
												</button>
											</span>
										</a> 
									</td>
									<?php
										$fecha = date("m-d-Y", strtotime($work->date));

										$admin=DB::table('users')
										->where('id','=',$work->idadmin)
										->first();

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
									<td align="left"><h5>{{ $fecha}} {{ $work->workid}}</h5></td>
									<td align="left"><h5>{{ $client->name}}</h5></td>
									<td align="left"><h5>@isset($driver) {{ $driver->name}} @endisset</h5></td>
									<td align="left"><h5>@isset($vehiclePU) {{ $vehiclePU->number_vehicle}} / {{$vehiclePU->trailer_or_unit_type}} @endisset</h5></td>
									<td align="left"><h5>@isset($vehicleT) {{ $vehicleT->number_vehicle}} / {{$vehicleT->trailer_or_unit_type}} / @if($vehicleT->trailer_or_unit_type == "53’ Reefer") {{$work->reefer_unit_number}} @endif @endisset</h5></td>
									@if(Auth::user()->user_type == "ADMIN")
									<td align="center"><h5>{{$work->days}}</h5></td>
									<td align="right"><h5><font color="Red">{{ Auth::user()->coin }}{{number_format($work->total_driver,2, '.', ',')}}</font></h5></td>
									<td align="right"><h5><font color="orange">{{ Auth::user()->coin }}{{number_format($work->total_liabilities,2, '.', ',')}}</font></h5></td>
									<td align="right"><h5><font color="limegreen">{{ Auth::user()->coin }}{{number_format($work->total_after_reduct,2, '.', ',')}}</font></h5></td>
									@if($work->state_work == "Canceled")
									<td align="right"><h5><font color="blue"><del>{{ Auth::user()->coin }}{{number_format($work->assets_gross,2, '.', ',')}}</del></font></h5></td>
									@else
									<td align="right">
										<h5><font color="blue">{{ Auth::user()->coin }}{{number_format($work->assets_gross,2, '.', ',')}}</font></h5>
										@if($work->accept_quote != null) <font color="limegreen">{{$work->accept_quote}}</font> @else <font color="orange">Not approved yet</font> @endif
									</td>
									@endif
									@endif
									<td align="center"><h5>
										@if ($work->state_work == "Pending")<font color="brown">{{ $work->state_work}} </font> @endif
										@if ($work->state_work == "Active")<font color="orange">{{ $work->state_work}} </font> @endif
										@if ($work->state_work == "Finalized")<font color="limegreen">{{ $work->state_work}} </font> @endif
										@if ($work->state_work == "Canceled")<font color="Red">{{ $work->state_work}} </font> @endif
									</h5></td>

									<td align="left"><h5>{{ $admin->name}}</h5></td>
								</tr>
							
								@include('works.work.modal')
							@endif
					   @endif
					   
				@endforeach
					</table>
				</div>
				
				{{$works->render()}}
			</div>
		</div>
	</div>
</div>
@endsection