<!-- Basic Modals -->
		<div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modal-editar-liability{{$liability->idliability}}">
			{!!Form::model($liability,['method'=>'PATCH','route'=>['liability.update',$liability->idliability]])!!}
            {{Form::token()}}
        
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Liability</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
								<div class="form-group">
									<div class="input-group">
											<input type="hidden" name="idwork" class="form-control" id="idwork" value="{{$liability->idwork}}">
											<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <label for="type"><strong><font color="orange">*</font>Type:</strong></label>
                                                <div class="form-group">
                                                    <select name="type" class="form-control">
                                                        <option selected value="{{$liability->type}}">{{$liability->type}}</option>
                                                        <option value="Insurance">Insurance</option>
                                                        <option value="Truck Lease/Payment">Truck Lease/Payment</option>
                                                        <option value="Fuel">Fuel</option>
                                                        <option value="Maintenance">Maintenance</option>
                                                        <option value="Accesorial Charges">Accesorial Charges</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <label for="name"><strong><font color="orange">*</font>Name:</strong></label>
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control" value="{{$liability->name}}">
                                                </div>
                                            </div>
											
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <label for="description"><strong>Description:</strong></label>
                                                <div class="form-group">
                                                <span class="form-icon-wrapper">
                                                    <textarea id="description" type="text" class="form-control" name="description"  rows="4" cols="50">{{$liability->description}}</textarea>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <label for="total"><strong><font color="orange">*</font>Total:</strong></label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">{{ Auth::user()->coin }}</span>
                                                        </div>
                                                        <input type="text" name="total" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{number_format($liability->total,2, '.', ',')}}" onkeypress="return validardecimal(event,this.value)">
                                                    </div>
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



<!-- End Basic Modals -->