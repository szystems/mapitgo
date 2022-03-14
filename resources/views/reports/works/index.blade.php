@extends ('layouts.admin')
@section ('contenido')
<div class="card mb-4">
						<!-- Card Header -->
	<header class="card-header d-md-flex align-items-center">
		<h4>
			<strong>Works Report</strong>
			<a href="work/create">
                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Create Work ">
                    <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                        <i class="far fa-plus-square"></i> Create Work
                    </button>
                </span>
			</a>
		</h4>
		
	</header>

	<div class="card-body">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				@include('reports.works.search')
				
				
				
				{{Form::open(array('action' => 'ReportesController@worksreport','method' => 'POST','role' => 'form', 'target' => '_blank'))}}

                {{Form::token()}}
					<input type="hidden" id="rdesde" class="form-control datepicker" name="rdesde" value="{{$desde}}">
					<input type="hidden" id="rhasta" class="form-control datepicker" name="rhasta" value="{{$hasta}}">
					<input type="hidden" id="rclient" class="form-control datepicker" name="rclient" value="@foreach($clientfiltro as $clientf){{$clientf->name}}@endforeach">
					<input type="hidden" id="ridclient" class="form-control datepicker" name="ridclient" value="@foreach($clientfiltro as $clientf){{$clientf->id}}@endforeach">
					<input type="hidden" id="radmin" class="form-control datepicker" name="radmin" value="@foreach($adminfiltro as $adminf){{$adminf->name}}@endforeach">
					<input type="hidden" id="ridadmin" class="form-control datepicker" name="ridadmin" value="@foreach($adminfiltro as $adminf){{$adminf->id}}@endforeach">
					<input type="hidden" id="rdriver" class="form-control datepicker" name="rdriver" value="@foreach($driverfiltro as $driverf){{$driverf->name}}@endforeach">
					<input type="hidden" id="riddriver" class="form-control datepicker" name="riddriver" value="@foreach($driverfiltro as $driverf){{$driverf->id}}@endforeach">
					<input type="hidden" id="rvehicle_power_unit" class="form-control datepicker" name="rvehicle_power_unit" value="@foreach($vehiclepowerunitfiltro as $vehiclepuf){{$vehiclepuf->number_vehicle}}@endforeach">
					<input type="hidden" id="rvehicle_trailer" class="form-control datepicker" name="rvehicle_trailer" value="@foreach($vehicletrailerfiltro as $vehicletf){{$vehicletf->number_vehicle}}@endforeach">
					<input type="hidden" id="fidvehicle_power_unit" class="form-control datepicker" name="ridvehicle_power_unit" value="@foreach($vehiclepowerunitfiltro as $vehiclepuf){{$vehiclepuf->idvehicle}}@endforeach">
					<input type="hidden" id="fidvehicle_trailer" class="form-control datepicker" name="ridvehicle_trailer" value="@foreach($vehicletrailerfiltro as $vehicletf){{$vehicletf->idvehicle}}@endforeach">
					<input type="hidden" id="rstate_work" class="form-control datepicker" name="rstate_work" value="{{ $state_work}}">
					
					<div class="card mb-4">
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
							<?php
								$desde = date("d-m-Y", strtotime($desde));
								$hasta = date("d-m-Y", strtotime($hasta));
								if($desde == '01-01-1970' or $hasta == '01-01-1970')
								{
									$desde = null;
									$hasta = null;
								}
								$desdeF = date("m-d-Y", strtotime($desde));
								$hastaF = date("m-d-Y", strtotime($hasta));
								
							?>
							<h6><strong>Filters:</strong><font color="Blue"> <strong>From:</strong> '{{ $desdeF}}', <strong>To:</strong> '{{ $hastaF}}', <strong>Admin:</strong> '@foreach($adminfiltro as $adminf){{$adminf->name}}@endforeach', <strong>Client:</strong> '@foreach($clientfiltro as $clientf){{$clientf->name}}@endforeach', <strong>Driver:</strong> '@foreach($driverfiltro as $driverf){{$driverf->name}}@endforeach', <strong>Power Unit:</strong> '@foreach($vehiclepowerunitfiltro as $vehiclepuf){{$vehiclepuf->number_vehicle}}@endforeach', <strong>Trailer:</strong> '@foreach($vehicletrailerfiltro as $vehicletf){{$vehicletf->number_vehicle}}@endforeach', <strong>State:</strong> '{{ $state_work}}'</font></h6>
						</div>
					</div>
					
				{{Form::close()}}
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th><h5><strong><i class="fa fa-sliders-h"></i></strong></h5></th>
							<th><h5><strong>Date / Work ID</strong></h5></th>
							<th><h5><strong>Client</strong></h5></th>
							<th><h5><strong>Driver</strong></h5></th>
							<th><h5><strong>#/Power Unit</strong></h5></th>
							<th><h5><strong>#/Trailer</strong></h5></th>
							<th><h5><strong>Days</strong></h5></th>
							<th><h5><strong>Total Driver</strong></h5></th>
							<th><h5><strong>Total Liabilities</strong></h5></th>
							<th><h5><strong>Total After Reduct</strong></h5></th>
							<th><h5><strong>RateCon Amount</strong></h5></th>
							<th><h5><strong>Status</strong></h5></th>
							<th><h5><strong>Admin</strong></h5></th>
							
						</thead>
						<?php
							$canceledWork = 0;
							$totalDriver = 0;
							$totalLiabilities = 0;
							$totalAfterReduct = 0;
							$totalAssetsGross = 0;
						?>
		                @foreach ($works as $work)
						<tr>
							<td align="left">

								<a href="{{URL::action('WorkController@show',$work->idwork)}}" target="_blank">
									<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="View Work">
										<button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
											<i class="far fa-eye"></i>
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
										<font color="Orange"><strong>Needs approval</strong></font> 
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
									<font color="Orange"><strong>Needs approval</strong></font> 
								@endif
							</small>
							</td>
							@endif
							<td align="center"><h5>
								@if ($work->state_work == "Active")<font color="orange">{{ $work->state_work}} </font> @endif
								@if ($work->state_work == "Finalized")<font color="green">{{ $work->state_work}} </font> @endif
								@if ($work->state_work == "Canceled")<font color="Red">{{ $work->state_work}} </font> @endif
							</h5></td>

							<td align="left"><h5>{{ $admin->name}}</h5></td>
							<?php
								if($work->state_work == "Canceled")
								{
									$canceledWork = $canceledWork + $work->assets_gross;
								}else
								{
									$totalDriver = $totalDriver + $work->total_driver;
									$totalLiabilities = $totalLiabilities + $work->total_liabilities;
									$totalAfterReduct = $totalAfterReduct + $work->total_after_reduct;
									$totalAssetsGross = $totalAssetsGross + ($work->assets_gross);
								}
								
							?>
						</tr>
						@endforeach
						
					</table>
					<div>
						<div class="card mb-4">
							<header class="card-header">
								<h4>
									<strong>Summary</strong>
								</h4>
							</header>
							<div class="card-body">
								<div class="row">
									<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
										<div class="form-group mb-2">
											<label for="compratotal"></label>Total Drivers:</label>
											<span class="form-icon-wrapper">
												<strong><font color="Red">{{ Auth::user()->coin }}{{number_format($totalDriver,2, '.', ',')}}</font></strong>
											</span>
										</div>
									</div>

									<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
										<div class="form-group mb-2">
											<label for="compratotal"></label>Total Liabilities:</label>
											<span class="form-icon-wrapper">
												<strong><font color="Orange">{{ Auth::user()->coin }}{{number_format($totalLiabilities,2, '.', ',')}}</font></strong>
											</span>
										</div>
									</div>

									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
										<div class="form-group mb-2">
											<label for="ventatotal"></label>Total After Reducts:</label>
											<span class="form-icon-wrapper">
												<strong><font color="limegreen">{{ Auth::user()->coin }}{{number_format($totalAfterReduct,2, '.', ',')}}</font></strong>
											</span>
										</div>
									</div>

									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
										<div class="form-group mb-2">
											<label for="diferencia"></label>Total RateCon Amount:</label>
											<span class="form-icon-wrapper">
												<strong><font color="blue">{{ Auth::user()->coin }}{{number_format($totalAssetsGross,2, '.', ',')}}</font></strong>
											</span>
										</div>
									</div>

									<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
										<div class="form-group mb-2">
											<label for="diferencia"></label>Total Canceled Works:</label>
											<span class="form-icon-wrapper">
												<strong><font color="red"><del>{{ Auth::user()->coin }}{{number_format($canceledWork,2, '.', ',')}}</del></font></strong>
											</span>
										</div>
									</div>
									
								</div>


							</div>

							<footer class="card-footer">
								

						
							</footer>
						</div>
					</div>


				</div>
				
				{{$works->render()}}
			</div>
		</div>
	</div>
</div>
@endsection