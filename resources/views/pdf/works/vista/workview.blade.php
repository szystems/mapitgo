<html html>
	<head>
  		<title>Work Report</title>
		<style>
		  	h1, h2, h3, h4, h5, h6 {
				  font-family: arial, sans-serif;
			  }
			table {
					font-family: arial, sans-serif;
					border-collapse: collapse;
					width: 95%;
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
			<strong><u>Work View</u></strong>
		</h4>
		<h6>
			<strong>Date:</strong><font color="gray"> <strong>{{ $hoy}} </strong></font>
			<br><strong>Company:</strong><font color="gray"> <strong>{{ $empresa}} </strong></font>
			<br><strong>User:</strong><font color="gray"> <strong>{{ $nombreusu}} <strong></font>
			
		</h6>
		<div style="text-align:center;">
			<table>
				<tr>		
					<th colspan="2"><h3 align="center">Work ID: {{ $work->workid}}</h3></th>
				</tr>
				<?php
					$date = date("m-d-Y", strtotime($work->date));
				?>
				<?php
					$adminw=DB::table('users')
					->where('id','=',$work->idadmin)
					->first();

					$clientw=DB::table('users')
					->where('id','=',$work->idclient)
					->first();

					$driverw=DB::table('users')
					->where('id','=',$work->iddriver)
					->first();

					$vehiclePUw=DB::table('vehicle')
                    ->where('idvehicle','=',$work->idvehicle_power_unit)
                    ->first();

                    $vehicleTw=DB::table('vehicle')
                    ->where('idvehicle','=',$work->idvehicle_trailer)
                    ->first();
														
				?>
				<tr>
					<td><h4 align="right"><b>Date:</b></h4></td>
					<td><h4 align="left"><font color="gray">{{ $date}}</font></h4></td>
				</tr>
				<tr>
					<td><h4 align="right"><strong>Work Status:</strong></h4></td>
					<td><h4 align="left"><font color="gray">{{ $work->state_work}}</font></h4></td>
				</tr>
				<tr>
				<td><h4 align="right"><strong>Accept Quote:</strong></h4></td>
					<td><h4 align="left"><font color="gray">{{ $work->accept_quote}}</font></h4></td>
				</tr>
				<tr>
					<td><h4 align="right"><strong>Client / Email / Phone:</strong></h4></td>
					<td><h4 align="left"><font color="gray">@if (isset($clientw)) {{$clientw->name}}, {{$clientw->email}}, {{$clientw->phone}} @else <p>Not defined</p>@endif</font></h4></td>
				</tr>
				<tr>
					<td><h4 align="right"><strong>Driver / Email / Phone:</strong></h4></td>
					<td><h4 align="left"><font color="gray">@if (isset($driverw)) {{$driverw->name}}, {{$driverw->email}}, {{$driverw->phone}} @else <p>Not defined</p>@endif</font></h4></td>
				</tr>
				<tr>
					<td><h4 align="right"><strong>Power Unit# / #Plate / Make / Model / Year / Type:</strong></h4></td>
					<td><h4 align="left"><font color="gray">@if (@isset($vehiclePUw)) {{$vehiclePUw->number_vehicle}} / {{$vehiclePUw->no_plate}} / {{$vehiclePUw->make}} / {{$vehiclePUw->model}} / {{$vehiclePUw->year}} / {{$vehiclePUw->trailer_or_unit_type}} @else <p>Not defined</p>@endif</font></h4></td>
				</tr>
				<tr>
					<td><h4 align="right"><strong>Trailer# / #Plate / Make / Model / Year / Type:</strong></h4></td>
					<td><h4 align="left"><font color="gray">@if (@isset($vehicleTw)) {{$vehicleTw->number_vehicle}} / {{$vehicleTw->no_plate}} / {{$vehicleTw->make}} / {{$vehicleTw->model}} / {{$vehicleTw->year}} / {{$vehicleTw->trailer_or_unit_type}} / @if($vehicleTw->trailer_or_unit_type == "53’ Reefer") <strong> Reefer Unit #=</stront> {{$work->reefer_unit_number}} @endif @else <p>Not defined</p>@endif</font></h4></td>
				</tr>
				@if(Auth::user()->user_type == "ADMIN")
				<tr>
					<td><h4 align="right"><strong>Day Rate/Hour Rate = Total:</strong></h4></td>
					<td><h4 align="left"><font color="gray">{{$work->days}} * {{ Auth::user()->coin }}{{number_format($work->salaryxday,2, '.', ',')}} = {{ Auth::user()->coin }}{{number_format($work->total_driver,2, '.', ',')}}</font></h4></td>
				</tr>
				<tr>
					<td><h4 align="right"><strong>Total liabilities:</strong></h4></td>
					<td><h4 align="left"><font color="gray">{{ Auth::user()->coin }}{{number_format($work->total_liabilities,2, '.', ',')}}</font></h4></td>
				</tr>
				<tr>
					<td><h4 align="right"><strong>Total After Reduct:</strong></h4></td>
					<td><h4 align="left"><font color="gray">{{ Auth::user()->coin }}{{number_format($work->total_after_reduct,2, '.', ',')}}</font></h4></td>
				</tr>
				<tr>
					<td><h4 align="right"><strong>RateCon Amount:</strong></h4></td>
					<td><h4 align="left"><font color="gray">{{ Auth::user()->coin }}{{number_format($work->assets_gross,2, '.', ',')}}</font></h4></td>
				</tr>
				@endif
			</table>
			<h4 align="center">
				<strong><u>Work Locations</u></strong>
			</h4>
			<table>          
				<tr>                                  
					<th>Date/Time</th>
					<th>Title</th>
					<th>Description</th>
					<th>Latitude</th>
					<th>Longitude</th>        
				</tr>
				@foreach ($locations as $location)
					<tr>
						<?php
							$datetime = $hoy = date("m-d-Y H:i:s", strtotime($location->datetime));
						?>
						<td><h4 align="center">{{$datetime}}</h4></td>
						<td><h4 align="center">{{$location->title}}</h4></td>
						<td><h4 align="left">{{$location->description}}</h4></td>
						<td><h4 align="right">{{$location->latitude}}</h4></td>
						<td><h4 align="right">{{$location->longitude}}</h4></td>
					</tr>
				@endforeach
			</table>
			@if(Auth::user()->user_type == "ADMIN")
			<h4 align="center">
				<strong><u>Work Liabilities</u></strong>
			</h4>
			<table>          
				<tr>                                  
					<th>Date/Time</th>
					<th>Type</th>
					<th>Name</th>
					<th>Description</th>
					<th>Total</th>        
				</tr>
				<?php
					$total_liabilities = 0;
				?>
				@foreach ($liabilities as $liability)
					<tr>
						<?php
							$total_liabilities = $total_liabilities + $liability->total;

							$datetime = $hoy = date("m-d-Y H:i:s", strtotime($liability->datetime));
						?>
						<td><h4 align="center">{{$datetime}}</h4></td>
						<td><h4 align="center">{{$liability->type}}</h4></td>
						<td><h4 align="center">{{$liability->name}}</h4></td>
						<td><h4 align="left">{{$liability->description}}</h4></td>
						<td><h4 align="right">{{ Auth::user()->coin }}{{number_format($liability->total,2, '.', ',')}}</h4></td>
					</tr>
				@endforeach
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td><h3 align="right">Liabilities Total:</h3></td>
						<td><h3 align="right">{{ Auth::user()->coin }}{{number_format($total_liabilities,2, '.', ',')}}</h3></td>
					</tr>
			</table>
			<h4 align="center">
				<strong><u>Work Files</u></strong>
			</h4>                          
			<table>          
				<tr>
					<th>Date/Time</th>
					<th>Name</th>
					<th>Description</th>
					<th>File</th>        
				</tr>
												
				@foreach ($files as $file)
					<tr>
						<?php
							$datetimefile = $hoy = date("m-d-Y H:i:s", strtotime($file->datetime));
						?>
						<td><h4 align="center">{{$datetimefile}}</h4></td>
						<td><h4 align="center">{{$file->name}}</h4></td>
						<td><h4 align="left">{{$file->description}}</h4></td>
						<td><h4 align="center"><a href="{{asset('work/files/'.$file->file)}}" target="_blank">Download <i class="fas fa-download"></i></a></h4></td>
					</tr>
				@endforeach
			</table>
			@endif
		</div>
		
		<br>
		<h6>Report generated by: <a href="https://szystems.com/" target="_blank">Szystems Version 1.0</a> &copy; 2022 <a class="link-muted" href="https://szystems.com/" target="_blank">Szystems</a>. All rights reserved.</h6>
	</body>
</html>