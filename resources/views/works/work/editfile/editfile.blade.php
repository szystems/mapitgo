<!-- Basic Modals -->
		<div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modal-editar-file{{$file->idfile}}">
			{!!Form::model($file,['method'=>'PATCH','route'=>['file.update',$file->idfile],'files'=>'true'])!!}
            {{Form::token()}}
        
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit File</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
								<div class="form-group">
									<div class="input-group">
											<input type="hidden" name="idwork" class="form-control" id="idwork" value="{{$file->idwork}}">
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <label for="name"><strong><font color="orange">*</font>Name:</strong></label>
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control" value="{{$file->name}}">
                                                </div>
                                            </div>
											
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <label for="description"><strong>Description:</strong></label>
                                                <div class="form-group">
                                                <span class="form-icon-wrapper">
                                                    <textarea id="description" type="text" class="form-control" name="description"  rows="4" cols="50">{{$file->description}}</textarea>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-image"></i>File</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file" name="file">
                                                    <label class="custom-file-label" for="file">Choose file</label>
                                                    <p>{{$file->file}}</p>
                                                </div>
                                            </div>
									</div>
								</div>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
                        <button type="submit" class="btn btn-info"><i class="far fa-save"></i> Save</button>
					</div>
				</div>
			</div>
            {{Form::close()}}
            
		</div>
<script>
      $('#file').on('change',function(){
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
      })
</script>


<!-- End Basic Modals -->