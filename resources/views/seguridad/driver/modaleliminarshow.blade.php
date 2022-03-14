

<!-- Basic Modals -->
		<div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modaleliminarshow-delete-{{$usuario->id}}">
			{{Form::Open(array('action'=>array('DriverController@destroy',$usuario->id),'method'=>'delete'))}}
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Delete Driver</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Confirm if you want to Delete the user
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-ban"></i> close</button>
						<button type="submit" class="btn btn-danger"><i class="fas fa-eraser"></i> Confirm</button>
					</div>
				</div>
			</div>
			{{Form::Close()}}
		</div>
		<!-- End Basic Modals -->