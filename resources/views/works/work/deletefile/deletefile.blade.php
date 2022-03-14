<!-- Basic Modals -->
		<div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modal-eliminar-file{{$file->idfile}}">
			{{Form::Open(array('action'=>array('FileController@destroy',$file->idfile),'method'=>'delete'))}}
        
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Delete File</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						
						Confirm if you are sure to eliminate this file?
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-eraser"></i> Confirm</button>
					</div>
				</div>
			</div>
            {{Form::close()}}
            
		</div>
<!-- End Basic Modals -->