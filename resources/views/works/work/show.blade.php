@extends ('layouts.admin')
@section ('contenido')
<script>

</script>

<div class="col-md-12 mb-12">
      @if (count($errors)>0)
            <div class="alert alert-danger">
                  <ul>
                        @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                        @endforeach
                  </ul>
            </div>
      @endif
      <!--Mensaje de abono correcto-->
      <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                  @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                  @endif
                  {{session()->forget('alert-' . $msg)}}
            @endforeach
      </div> <!-- fin .flash-message -->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                  <a class="nav-link active" id="work-tab" data-toggle="tab" href="#work" role="tab" aria-controls="work" aria-selected="true">Work Details</a>
            </li>
      </ul>
      <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="work" role="tabpanel" aria-labelledby="work-tab">
                  <!--Informacion general de Grado-->
                  <div class="card">
                        <header class="card-header">
                              <h2 class="h3 card-header-title"><strong>Work ID: {{$work->workid}}</h2></strong>
                        </header>

                        <div class="card-body">

                            {{Form::open(array('action' => 'ReportesController@workview','method' => 'POST','role' => 'form', 'target' => '_blank'))}}

                            {{Form::token()}}		
                                <div class="card mb-4">
                                    
                                    <header class="card-header d-md-flex align-items-center">
                                        <h4><strong>Print Work Details </strong></h4>
                                        <input type="hidden" id="rid" class="form-control datepicker" name="rid" value="{{$work->idwork}}">
                                        <input type="hidden" id="rworkid" class="form-control datepicker" name="rworkid" value="{{$work->workid}}">
                                    </header>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                                <div class="form-group mb-2">
                                                    <select name="pdf" class="form-control" value="">
                                                            <option value="Descargar" selected>Download</option>
                                                            <option value="Navegador">View in Browser</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                                <div class="form-group mb-2">
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-file-pdf"></i> PDF
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                              
                                    </footer>


                                </div>
                                
                            {{Form::close()}}

                            <input type="hidden" name="updateventa" class="form-control" id="updateventa" value="abonar">
                                @if(Auth::user()->user_type == "ADMIN")
                                <a href="" data-target="#modaleliminarshow-delete-{{$work->idwork}}" data-toggle="modal">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Cancel Work">
                                        <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button"><i class="far fa-minus-square"></i> Cancel Work</button>
                                    </span>
                                </a>
                                @endif
                                <a href="{{URL::action('WorkController@edit',$work->idwork)}}">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Edit Work">
                                          <button class="btn btn-sm btn-warning" style="pointer-events: none;" type="button">
                                                <i class="far fa-edit"></i> Edit Work
                                          </button>
                                    </span>
                              	</a> 
                                
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <div class="form-group">
                                            <?php
                                                $fecha = date("m-d-Y", strtotime($work->date));
                                            ?>
                                            <label for="date"><strong>Date</strong></label>
                                            <p>{{$fecha}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <div class="form-group">
                                            <?php
                                                $fecha = date("m-d-Y", strtotime($work->date));
                                            ?>
                                            <label for="date"><strong>Work ID</strong></label>
                                            <p>{{$work->workid}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="state_work"><strong>Work Status</strong></label>
                                            @if($work->state_work == "Canceled")
                                            <p><font color="red">{{$work->state_work}}</font></p>
                                            @elseif($work->state_work == "Finalized")
                                            <p><font color="limegreen">{{$work->state_work}}</font></p>
                                            @elseif($work->state_work == "Active")
                                            <p><font color="orange">{{$work->state_work}}</font></p>
                                            @elseif($work->state_work == "Pending")
                                            <p><font color="brown">{{$work->state_work}}</font></p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="state_work"><strong>Accept Quote</strong></label>
                                            @if($work->accept_quote == "Approved")
                                                <p><font color="limegreen">{{$work->accept_quote}}</font></p>
                                            @else
                                                @if(Auth::user()->user_type == "ADMIN")
                                                <a href="{{URL::action('WorkController@edit',$work->idwork)}}">
                                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Edit Work">
                                                        <button class="btn btn-sm btn-warning" style="pointer-events: none;" type="button">
                                                                <i class="far fa-edit"></i> Not approved yet
                                                        </button>
                                                    </span>
                                                </a>
                                                @else
                                                    <p><font color="orange">Not approved yet</font></p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
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
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="client"><strong>Client / Phone / Email</strong></label>
                                            <p>{{$clientw->name}} / {{$clientw->phone}} / {{$clientw->email}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="driver"><strong>Driver / Phone / Email</strong></label>
                                            <p>@if (isset($driverw)) {{$driverw->name}} / {{$driverw->phone}} / {{$driverw->email}} @else <p>Not defined</p>@endif</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Power Unit# / #Plate / Make / Model / Year / Type</strong></label>
                                            <p>@if (@isset($vehiclePUw)) {{$vehiclePUw->number_vehicle}} / {{$vehiclePUw->no_plate}} / {{$vehiclePUw->make}} / {{$vehiclePUw->model}} / {{$vehiclePUw->year}} / {{$vehiclePUw->trailer_or_unit_type}} @else <p>Not defined</p>@endif</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Trailer# / #Plate / Make / Model / Year / Type</strong></label>
                                            <p>@if (@isset($vehicleTw)) {{$vehicleTw->number_vehicle}} / {{$vehicleTw->no_plate}} / {{$vehicleTw->make}} / {{$vehicleTw->model}} / {{$vehicleTw->year}} / {{$vehicleTw->trailer_or_unit_type}} / @if($vehicleTw->trailer_or_unit_type == "53’ Reefer") <b> Reefer Unit #=</b> {{$work->reefer_unit_number}} @endif @else <p>Not defined</p>@endif</p>
                                        </div>
                                    </div>
                                    @if(Auth::user()->user_type == "ADMIN")
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="salaryxday"><strong>Day Rate/Hour Rate</strong></label>
                                            <p>{{$work->days}} * {{ Auth::user()->coin }}{{number_format($work->salaryxday,2, '.', ',')}} = {{ Auth::user()->coin }}{{number_format($work->total_driver,2, '.', ',')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="total_liabilities"><strong>Total liabilities</strong></label>
                                            <p>{{ Auth::user()->coin }}{{number_format($work->total_liabilities,2, '.', ',')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="total_after_reduct"><strong>Total After Reduct</strong></label>
                                            <p>{{ Auth::user()->coin }}{{number_format($work->total_after_reduct,2, '.', ',')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="assets_gross"><strong>RateCon Amount</strong></label>
                                            <p>{{ Auth::user()->coin }}{{number_format($work->assets_gross,2, '.', ',')}}</p>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><h2><strong><u>Pick Up</u></strong></h2></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Contact</strong></label>
                                            <p>{{$work->pickup_contact}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Phone</strong></label>
                                            <p>{{$work->pickup_phone}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Address</strong></label>
                                            <p>{{$work->pickup_address}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><h2><strong><u>Delivery</u></strong></h2></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Contact</strong></label>
                                            <p>{{$work->delivery_contact}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Phone</strong></label>
                                            <p>{{$work->delivery_phone}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Address</strong></label>
                                            <p>{{$work->delivery_address}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><strong>Work Description</strong></label>
                                            <span class="form-icon-wrapper">
                                                <textarea readonly id="description" type="text" class="form-control" name="description"  rows="4" cols="50">{{$work->description}}</textarea>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><h2><strong><u>Locations</u></strong></h2></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <!--api google maps-->
                                        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
                                        <script defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC9qYT90AVrfMfbaCR_PUK35h9d9-tcbJw&callback=initMapView&libraries=&v=weekly' async></script>
                                        <!--api google maps end-->
                                        <?php
                                            $numLocations = $locations->count();
                                        ?>
                                        <div id='map1' style='width: 100%; height: 300px;'></div>
                                        
                                        <style type="text/css">
                                            /* Set the size of the div element that contains the map */
                                            #map {
                                                height: 100%;
                                                /* The height is 400 pixels */
                                                width: 100%;
                                                /* The width is the width of the web page */
                                            }
                                        </style>
                                        <script>
                                        
                                            // Initialize and add the map
                                            

                                            function initMapView() {
                                                map = new google.maps.Map(document.getElementById("map1"), {
                                                    @if($work->pickup_location_latitude != null or $work->pickup_location_longitude != null)
                                                        center: { lat: {{$work->pickup_location_latitude}} , lng: {{$work->pickup_location_longitude}} },
                                                        zoom:3,
                                                    @else
                                                        center: { lat: 40.411293902828156 , lng: -101.88586174854017 },
                                                        zoom:4,
                                                    @endif
                                                    
                                                });

                                                    var iconPickup = {
                                                        url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png", // url
                                                        scaledSize: new google.maps.Size(50, 50), // scaled size
                                                    };
                                                    var iconDelivery = {
                                                        url: "http://maps.google.com/mapfiles/ms/icons/green-dot.png", // url
                                                        scaledSize: new google.maps.Size(50, 50), // scaled size
                                                    };
                                                    @if($work->pickup_location_latitude != null or $work->pickup_location_longitude != null)
                                                        marker = new google.maps.Marker({
                                                            position: { lat: {{$work->pickup_location_latitude}} , lng: {{$work->pickup_location_longitude}} },
                                                            map,
                                                            title: "Pickup: {{$work->pickup_contact}}, {{$work->pickup_address}}, {{$work->pickup_phone}}",
                                                            icon: iconPickup
                                                        });
                                                    @endif
                                                    @if($work->delivery_location_latitude != null or $work->delivery_location_longitude != null)
                                                        marker = new google.maps.Marker({
                                                            position: { lat: {{$work->delivery_location_latitude}} , lng: {{$work->delivery_location_longitude}} },
                                                            map,
                                                            title: "Delivery: {{$work->delivery_contact}}, {{$work->delivery_address}}, {{$work->delivery_phone}}",
                                                            icon: iconDelivery
                                                        });
                                                    @endif
                                                @if($numLocations != 0)
                                
                                                    @foreach($locations as $location)
                                                        <?php
                                                            $datetimelocation = $hoy = date("m-d-Y H:i:s", strtotime($location->datetime));
                                                        ?>
                                                        marker = new google.maps.Marker({
                                                            icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
                                                            position: { lat: {{$location->latitude}} , lng: {{$location->longitude}} },
                                                            map,
                                                            title: " {{$location->title}}: {{$location->description}}, {{$datetimelocation}} PST8PDT"
                                                        });
                                                    @endforeach
                                                @endif
                                               

                                            }

                                            
                                        </script> 
                                    </div>
                                    @if(Auth::user()->user_type == "ADMIN")
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><h2><strong><u>Liabilities</u></strong></h2></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-condensed table-hover">          
                                                <thead>
                                                    
                                                    <th><h5><strong>Date/Time</strong></h5></th>
                                                    <th><h5><strong>Type</strong></h5></th>
                                                    <th><h5><strong>Name</strong></h5></th>
                                                    <th><h5><strong>Description</strong></h5></th>
                                                    <th><h5><strong>Total</strong></h5></th>        
                                                </thead>
                                                <?php
                                                    $total_liabilities = 0;
                                                ?>
                                                @foreach ($liabilities as $liability)
                                                    <tr>
                                                        <?php
                                                            $total_liabilities = $total_liabilities + $liability->total;

                                                            $datetime = $hoy = date("m-d-Y H:i:s", strtotime($liability->datetime));
                                                        ?>
                                                        <td align="left"><h5>{{$datetime}}</h5></td>
                                                        <td align="left"><h5>{{$liability->type}}</h5></td>
                                                        <td align="left"><h5>{{$liability->name}}</h5></td>
                                                        <td align="left"><h5>{{$liability->description}}</h5></td>
                                                        <td align="Right"><h5>{{ Auth::user()->coin }}{{number_format($liability->total,2, '.', ',')}}</h5></td>
                                                    </tr>
                                                @endforeach
                                                    <tfoot>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th ><h3 align="Right"><strong>Liabilities Total:</strong></h3></th>
                                                        <th ><h3 align="right"><strong>{{ Auth::user()->coin }}{{number_format($total_liabilities,2, '.', ',')}}</strong></h3></th>
                                                    </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label><h2><strong><u>Files</u></strong></h2></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-condensed table-hover">          
                                                <thead>
                                                    <th><h5><strong>Date/Time</strong></h5></th>
                                                    <th><h5><strong>Name</strong></h5></th>
                                                    <th><h5><strong>Description</strong></h5></th>
                                                    <th><h5><strong>File</strong></h5></th>        
                                                </thead>
                                            
                                                @foreach ($files as $file)
                                                    <tr>
                                                        <?php

                                                            $datetimefile = $hoy = date("m-d-Y H:i:s", strtotime($file->datetime));
                                                        ?>
                                                        <td align="left"><h5>{{$datetimefile}}</h5></td>
                                                        <td align="left"><h5>{{$file->name}}</h5></td>
                                                        <td align="left"><h5>{{$file->description}}</h5></td>
                                                        <td align="center"><h5><a href="{{asset('work/files/'.$file->file)}}" target="_blank">Download <i class="fas fa-download"></i></a></h5></td>
                                                    </tr>
                                                @endforeach
                                                    <tfoot>
                                                    </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    @endif

                                    
                                </div>
                            </div>
                            @include('works.work.modaleliminarshow')
                            
                        </div>

                        <footer class="card-footer">
                              
                        </footer>
                  </div>
            </div>
            
      </div>
</div>
<script>
      $('#file').on('change',function(){
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
      })
</script>
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