<html html>
	<head>
  		<title>Works Report</title>
		  <style>
		  	h1, h2, h3, h4, h5, h6 {
				  font-family: arial, sans-serif;
			  }
			table {
					font-family: arial, sans-serif;
					border-collapse: collapse;
					width: 100%;
					font-size: 10px;
					border: 1px solid #000;
				}

			th, td {
					width: 25%;
					text-align: left;
					vertical-align: top;
					border: 1px solid #000;
					border-collapse: collapse;
					padding: 0.3em;
					caption-side: bottom;
					height: 20px;
			}

			th {
				background-color: #595555;
				color: white;
				font-size: 10px;
				width: 100%;
			}
			img{
			}
			
		  </style>
	</head>
	<body>
		@if ($imagen != null)
			<center>
				<img align="center" src="{{ $imagen}}" alt="" height="100">
			</center>
		@endif
		<h4 align="center">
			<strong><u>Works Report</u></strong>
		</h4>
		<h6><strong>Company:</strong><font color="Blue"> <strong>'{{ $empresa}}' </strong></font><br><strong>Report created by:</strong><font color="Blue"> <strong>'{{ $nombreusu}}' <strong></font>
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
		<h6><strong>Filters:</strong><font color="Blue"> <strong>From:</strong> '{{ $desdeF}}', <strong>To:</strong> '{{ $hastaF}}', <strong>Admin:</strong>@isset($adminfiltro) {{$adminfiltro->name}} @endisset, <strong>Client:</strong>@isset($clientfiltro) {{$clientfiltro->name}} @endisset, <strong>Driver:</strong>@isset($driverfiltro) {{$driverfiltro->name}} @endisset, <strong>Power Unit:</strong>@isset($vehiclepowerunitfiltro) {{$vehiclepowerunitfiltro->number_vehicle}} @endisset, <strong>Trailer:</strong>@isset($vehicletrailerfiltro) {{$vehicletrailerfiltro->number_vehicle}} @endisset, <strong>State:</strong> {{ $state_work}}</font></h6>
		
		
		
		<table>
			<tr>
							
				<th>Date / Work ID</th>         
				<th>Client</th>
				<th>Driver</th>
				<th>Power Unit#</th>
				<th>Trailer#</th>
				<th>Days</th>
				<th>Total Driver</th>
				<th>Total Liabilities</th>
				<th>Total After Reduct</th>
				<th>RateCon Amount</th>
				<th>Status</th>
				<th>Admin</th>
							
			</tr>
			<?php
			    $canceledWork = 0;
				$totalDriver = 0;
				$totalLiabilities = 0;
				$totalAfterReduct = 0;
				$totalAssetsGross = 0;
			?>
						
		    @foreach ($works as $work)
			<tr>
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
				<td class="celda"><h4 align="center">{{ $fecha}} {{ $work->workid}}</h4></td>
				<td><h4 align="left">@if (@isset($client)) {{ $client->name}} @else <p>Not defined</p>@endif</h4></td>
				<td><h4 align="left">@if (@isset($driver)) {{ $driver->name}}  @else <p>Not defined</p>@endif</h4></td>
				<td><h4 align="left">@isset($vehiclePU) {{ $vehiclePU->number_vehicle}} / {{$vehiclePU->trailer_or_unit_type}} @endisset</h4></td>
				<td><h4 align="left">@isset($vehicleT) {{ $vehicleT->number_vehicle}} / {{$vehicleT->trailer_or_unit_type}} / @if($vehicleT->trailer_or_unit_type == "53’ Reefer") {{$work->reefer_unit_number}} @endif @endisset</h4></td>
				<td><h4 align="center">{{$work->days}}</h4></td>
				<td><h4 align="right">{{ Auth::user()->coin }}{{number_format($work->total_driver,2, '.', ',')}}</h4></td>
				<td><h4 align="right">{{ Auth::user()->coin }}{{number_format($work->total_liabilities,2, '.', ',')}}</h4></td>
				<td><h4 align="right">{{ Auth::user()->coin }}{{number_format($work->total_after_reduct,2, '.', ',')}}</h4></td>
				@if($work->state_work == "Canceled")
				<td>
					<h4 align="right"><del>{{ Auth::user()->coin }}{{number_format($work->assets_gross,2, '.', ',')}}</del></h4>
					<small>
						@if($work->accept_quote == "Approved") 
							<font color="limegreen"><strong>{{$work->accept_quote}}</strong></font> 
						@else 
							<font color="Orange"><strong>Needs approval</strong></font> 
						@endif
					</small>
				</td>
				@else
				<td>
					<h4 align="right">{{ Auth::user()->coin }}{{number_format($work->assets_gross,2, '.', ',')}}</h4>
					<small>
						@if($work->accept_quote == "Approved") 
							<font color="limegreen"><strong>{{$work->accept_quote}}</strong></font> 
						@else 
							<font color="Orange"><strong>Needs approval</strong></font> 
						@endif
					</small>
				</td>
				@endif
				
				<td><h4 align="center">
					@if ($work->state_work == "Active")<font color="orange">{{ $work->state_work}} </font> @endif
					@if ($work->state_work == "Finalized")<font color="green">{{ $work->state_work}} </font> @endif
					@if ($work->state_work == "Canceled")<font color="Red">{{ $work->state_work}} </font> @endif
				</h4></td>
				<td><h4 align="left">{{ $admin->name}}</h4></td>
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
		<br>
		<h4 align="center">
			<strong><u>Resumen</u></strong>
		</h4>
		<table>
			<tr>
				<th><h4 align="center">Total Driver</h4></th>
				<th><h4 align="center">Total Liabilities</h4></th>
				<th><h4 align="center">Total After Reducts</h4></th>
				<th><h4 align="center">Total RateCon Amount</h4></th>
				<th><h4 align="center">Total Canceled Works</h4></th>
			</tr>
			<tr>
				<td><h1 align="center"><strong><font color="red">{{ Auth::user()->coin }}{{number_format($totalDriver,2, '.', ',')}}</font></strong></h1></td>
				<td><h1 align="center"><strong><font color="orange">{{ Auth::user()->coin }}{{number_format($totalLiabilities,2, '.', ',')}}</font></strong></h1></td>
				<td><h1 align="center"><strong><font color="limegreen">{{ Auth::user()->coin }}{{number_format($totalAfterReduct,2, '.', ',')}}</font></strong></h1></td>
				<td><h1 align="center"><strong><font color="blue">{{ Auth::user()->coin }}{{number_format($totalAssetsGross,2, '.', ',')}}</font></strong></h1></td>
				<td><h1 align="center"><strong><font color="red"><del>{{ Auth::user()->coin }}{{number_format($canceledWork,2, '.', ',')}}</del></font></strong></h1></td>
			</tr>
						
		</table>
		
		<h6>Report generated by: <a href="https://szystems.com/" target="_blank">Szystems</a> &copy; 2022. All rigths reserved.</h6>
	</body>
</html>