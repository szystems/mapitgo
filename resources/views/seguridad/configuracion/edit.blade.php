@extends ('layouts.admin')
@section ('contenido')


<div class="col-md-6 mb-4">
      <div class="card">
            <header class="card-header">
                  <h2 class="h3 card-header-title"><strong>Edit Settings: </strong></h2>
            </header>

            <div class="card-body">
                  <h5 class="h4 card-title">Edit configuration data and then save:</h5>
                  <h6><font color="orange"> Required Fields *</font></h6>
                  @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                  @endif

                  {!!Form::model($configuracion,['method'=>'PATCH','route'=>['configuracion.update',$configuracion->id],'files'=>true,'enctype'=>'multipart/form-data'])!!}

                  {{Form::token()}}
                  <div class="form-group{{ $errors->has('empresa') ? ' has-error' : '' }}">
                        <label for="empresa"><font color="orange">*</font>Company Name</label>
                        <input id="empresa" type="text" class="form-control" name="empresa" value="{{$configuracion->empresa}}" >
                        @if ($errors->has('empresa'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('empresa') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  
                  <div class="form-group{{ $errors->has('time_zone') ? ' has-error' : '' }}">
                        <label for="time_zone"><font color="orange">*</font>Time Zone</label>
                        <select id="time_zone" type="text" class="form-control" name="time_zone" value="{{$configuracion->time_zone}}">
                            <option selected="selected" value="{{$configuracion->time_zone}}">{{$configuracion->time_zone}}</option>
                            <option value="America/Guatemala">America/Guatemala</option>
                            <option value="PST8PDT">PST8PDT</option>
                            <option value="America/Los_Angeles">America/Los_Angeles</option>
                            <option value="America/Mexico_City">America/Mexico_City</option>
                                    
                        </select>
                        @if ($errors->has('time_zone'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('time_zone') }}
                                    </strong>
                              </span>
                        @endif
                  </div>

                  <div class="form-group{{ $errors->has('coin') ? ' has-error' : '' }}">
                        <label for="coin"><font color="orange">*</font>Coin</label>
                        <select id="coin" type="text" class="form-control" name="coin" value="{{$configuracion->coin}}">
                            <option selected="selected" value="{{$configuracion->coin}}">{{$configuracion->coin}}</option>
                            <option value="Q.">GUA Q.</option>
                            <option value="$.">US $</option>
                            <option value="$.">MXN $</option>
                                    
                        </select>
                        @if ($errors->has('coin'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('coin') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  

                  <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                        <label for="logo">Image: </label>
                        <input type="file" name="logo" >
                        @if (($configuracion->logo)!="")
                          <img src="{{asset('imagenes/logos/'.$configuracion->logo)}}"  width="400">
                        @endif

                         @if ($errors->has('logo'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('logo') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  
            </div>

            <footer class="card-footer">
                  <div class="form-group">
                        <button class="btn btn-danger" type="reset"><i class="fas fa-ban"></i> Reset</button>
                        <button class="btn btn-info" type="submit"><i class="far fa-save"></i> Save</button>
                  </div>

                  {!!Form::close()!!}
            </footer>
      </div>
</div>

@push ('scripts')
    <script>
        

        function validardecimal(e,txt) 
        {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true;
            if (tecla==46 && txt.indexOf('.') != -1) return false;
            patron = /[\d\.]/;
            te = String.fromCharCode(tecla);
            return patron.test(te); 
        }  

        function validarentero(e,txt) 
        {
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla==8)
            {
                return true;
            }
        
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final); 
        }
    </script>
@endpush
@endsection