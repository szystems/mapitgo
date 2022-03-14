<html html>
	<head>
  		<title>User Report</title>
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
		<center>
			<img align="center" src="{{ $imagen}}" alt="" height="100">
		</center>
		<h4 align="center">
			<strong><u>Drivers List</u></strong>
		</h4>
		<h6>
			<strong>Date:</strong><font color="Blue"> <strong>'{{ $hoy}}' </strong></font>
			<br><strong>Company:</strong><font color="Blue"> <strong>'{{ $empresa}}' </strong></font>
			<br><strong>Report created by:</strong><font color="Blue"> <strong>'{{ $nombreusu}}' <strong></font>
			
		</h6>
		<table>
			<tr>		
				<th>Principal</th>
				<th>Name</th>
				<th>Start Date</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Email</th>
			</tr>
			@foreach ($usuarios as $usu)
			<tr>
				<td><h4 align="center">{{ $usu->principal}}</h4></td>
				<td><h4 align="center">{{ $usu->name}}</h4></td>
				<?php
                    $birthday = date("m-d-Y", strtotime($usu->birthday));

                    $birth = new DateTime($usu->birthday);
                    $today = new DateTime();
                    $years = $today->diff($birth);
                    $age = $years->y;
                ?>
				<td><h4 align="center">{{ $birthday}} ({{$age}} Years)</h4></td>
				<td><h4 align="center">{{ $usu->address}}</h4></td>
				<td><h4 align="center">{{ $usu->phone}}</h4></td>
				<td><h4 align="center">{{ $usu->email}}</h4></td>
			</tr>
			@endforeach
		</table>
		<br>
		<h6>Report generated by: <a href="https://szystems.com/" target="_blank">Szystems Version 1.0</a> &copy; 2022 <a class="link-muted" href="https://szystems.com/" target="_blank">Szystems</a>. All rights reserved.</h6>
	</body>
</html>