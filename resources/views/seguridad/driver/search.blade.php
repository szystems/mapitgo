{!! Form::open(array('url'=>'seguridad/driver','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Search by name..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-info">
				<i class="fas fa-search"></i> Search
			</button>
		</span>
	</div>
</div>

{{Form::close()}}
