{!! Form::open(array('url'=>'works/vehicle','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		
		<select name="searchText" class="form-control selectpicker"  data-live-search="true">
			<option value="">All (Search by: Vehicle # / No.Plate / Other ID / Type )</option>
			@foreach ($vehiclesSearch as $vehicle)
                <option value="{{$vehicle->idvehicle}}">{{$vehicle->number_vehicle}} / {{$vehicle->no_plate}} / {{$vehicle->other_id}} / {{$vehicle-> type}}-{{$vehicle->trailer_or_unit_type}}  </option>
            @endforeach
		</select>
		<span class="input-group-btn">
			<button type="submit" class="btn btn-info">
				<i class="fas fa-search"></i> Search
			</button>
		</span>
	</div>
</div>

{{Form::close()}}
