{!! Form::open(array('url'=>'works/work','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    <label for="codigo"><u>Search by Work ID:</u></label>
	<div class="input-group">
		
		<input type="text" class="form-control" name="searchCodigo" placeholder="XXXXXXXXXX" value="">
		<input type="hidden" class="form-control" name="xsearch" value="xcod">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-info">
				<i class="fas fa-search"></i> Search
			</button>
		</span>
	</div>
</div>

{{Form::close()}}


