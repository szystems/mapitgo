<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

use sisVentasWeb\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisVentasWeb\Http\Requests\ReportesFormRequest;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

use Auth;
use sisVentasWeb\User;

class ReportesController extends Controller
{

    public function reporteusuarios(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                }

                $verpdf=trim($rrequest->get('pdf'));
                $zona_horaria = Auth::user()->time_zone;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('m-d-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('m-d-Y H:i:s');
                


                $usuarios=DB::table('users')
                ->where('idempresa','=',$idempresa)
                ->where('user_type','=','ADMIN')
                ->orderBy('principal','desc')
                ->orderBy('name','asc')
                ->get();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.usuarios.reporteusuarios', compact('usuarios','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                     $pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('AdminList'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.usuarios.reporteusuarios', compact('usuarios','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                     $pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('AdminList'.$nompdf.'.pdf');
                }
            }
        
    }

    public function vistausuario(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->coin;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('images/licenses/');
                $verpdf=trim($rrequest->get('pdf'));
                $idusuario=trim($rrequest->get('rid'));
                $nombreusuario=trim($rrequest->get('rnombre'));

                $zona_horaria = Auth::user()->time_zone;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('m-d-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('m-d-Y H:i:s');
                


                $usuario=DB::table('users')
                ->where('id','=',$idusuario)
                ->first();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.usuarios.vista.vistausuario', compact('usuario','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('AdminView'.'-'.$nombreusuario.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.usuarios.vista.vistausuario', compact('usuario','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('AdminView'.'-'.$nombreusuario.'-'.$nompdf.'.pdf');
                }
            }
        
    }

    public function reportedrivers(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                }

                $verpdf=trim($rrequest->get('pdf'));
                $zona_horaria = Auth::user()->time_zone;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('m-d-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('m-d-Y H:i:s');
                


                $usuarios=DB::table('users')
                ->where('idempresa','=',$idempresa)
                ->where('user_type','=','DRIVER')
                ->orderBy('principal','desc')
                ->orderBy('name','asc')
                ->get();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.drivers.reportedrivers', compact('usuarios','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                     $pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('DriverList'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.drivers.reportedrivers', compact('usuarios','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                     $pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('DriverList'.$nompdf.'.pdf');
                }
            }
        
    }

    public function vistadriver(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->coin;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('images/licenses/');
                $verpdf=trim($rrequest->get('pdf'));
                $idusuario=trim($rrequest->get('rid'));
                $nombreusuario=trim($rrequest->get('rnombre'));

                $zona_horaria = Auth::user()->time_zone;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('m-d-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('m-d-Y H:i:s');
                


                $usuario=DB::table('users')
                ->where('id','=',$idusuario)
                ->first();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.drivers.vista.vistadriver', compact('usuario','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('DriverView'.'-'.$nombreusuario.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.drivers.vista.vistadriver', compact('usuario','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('DriverView'.'-'.$nombreusuario.'-'.$nompdf.'.pdf');
                }
            }
        
    }

    public function reporteclients(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                }

                $verpdf=trim($rrequest->get('pdf'));
                $zona_horaria = Auth::user()->time_zone;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('m-d-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('m-d-Y H:i:s');
                


                $usuarios=DB::table('users')
                ->where('idempresa','=',$idempresa)
                ->where('user_type','=','CLIENT')
                ->orderBy('principal','desc')
                ->orderBy('name','asc')
                ->get();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.clients.reporteclients', compact('usuarios','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                     $pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('ClientList'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.clients.reporteclients', compact('usuarios','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                     $pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('ClientList'.$nompdf.'.pdf');
                }
            }
        
    }

    public function vistaClient(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->coin;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('images/licenses/');
                $verpdf=trim($rrequest->get('pdf'));
                $idusuario=trim($rrequest->get('rid'));
                $nombreusuario=trim($rrequest->get('rnombre'));

                $zona_horaria = Auth::user()->time_zone;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('m-d-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('m-d-Y H:i:s');
                


                $usuario=DB::table('users')
                ->where('id','=',$idusuario)
                ->first();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.clients.vista.vistaclient', compact('usuario','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('ClientView'.'-'.$nombreusuario.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.clients.vista.vistaclient', compact('usuario','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('ClientView'.'-'.$nombreusuario.'-'.$nompdf.'.pdf');
                }
            }
        
    }

    public function reportebitacora(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                }

                
                $verpdf=trim($rrequest->get('pdf'));
                $fecha=trim($rrequest->get('rfecha'));
                $usuario=trim($rrequest->get('rusuario'));
                $tipo=trim($rrequest->get('rtipo'));

                $usuarios=DB::table('users')
                ->where('idempresa','=',$idempresa)
                ->get();

                $usufiltro=DB::table('users')
					->select('name')
                	->where('id','=',$usuario)
                    ->get();

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                
                if($fecha != '1970-01-01')
                {
                    $bitacora=DB::table('bitacora as b')
                    ->join('users as u','b.idusuario','=','u.id')
                    ->select('b.idbitacora','b.idempresa','u.name','b.fecha','b.tipo','b.descripcion')
                    ->whereDate('b.fecha',$fecha)
                    ->where('u.id','LIKE','%'.$usuario.'%')
                    ->where('b.idempresa','=',$idempresa)
                    ->where('b.tipo','LIKE','%'.$tipo.'%')
                    ->orderBy('b.fecha','desc')
                    ->groupBy('b.idbitacora','b.idempresa','u.name','b.fecha','b.tipo','b.descripcion')
                    ->paginate(20);
                }
                else
                {
                    $bitacora=DB::table('bitacora as b')
                    ->join('users as u','b.idusuario','=','u.id')
                    ->select('b.idbitacora','b.idempresa','u.name','b.fecha','b.tipo','b.descripcion')
                    ->where('u.id','LIKE','%'.$usuario.'%')
                    ->where('b.idempresa','=',$idempresa)
                    ->where('b.tipo','LIKE','%'.$tipo.'%')
                    ->orderBy('b.fecha','desc')
                    ->groupBy('b.idbitacora','b.idempresa','u.name','b.fecha','b.tipo','b.descripcion')
                    ->paginate(50);
                }  
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.bitacora.reportebitacora', compact('bitacora','usuarios','fecha','tipo','usuario','hoy','usufiltro','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download ('ReporteBitacora'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.bitacora.reportebitacora', compact('bitacora','usuarios','fecha','tipo','usuario','hoy','usufiltro','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->stream ('ReporteBitacora'.$nompdf.'.pdf');
                }
            }
        
    }

    public function vistabitacorareporte(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->moneda;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('imagenes/articulos/');
                $verpdf=trim($rrequest->get('pdf'));
                $idbitacora=trim($rrequest->get('rid'));

                $zona_horaria = Auth::user()->zona_horaria;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('Y-m-d H:i:s');
                
                $bitacora=DB::table('bitacora as b')
                    ->join('users as u','b.idusuario','=','u.id')
                    ->select('b.idbitacora','b.idempresa','u.name','b.fecha','b.tipo','b.descripcion')
                    ->where('b.idbitacora','=',$idbitacora)
                    ->where('b.idempresa','=',$idempresa)
                    ->first();

                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('reports.bitacora.vista.vistabitacorareporte', compact('bitacora','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('Vistabitacorareporte'.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('reports.bitacora.vista.vistabitacorareporte', compact('bitacora','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('Vistabitacorareporte'.'-'.$nompdf.'.pdf');
                }
            }
        
    }

    public function reportvehicles(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                }

                $verpdf=trim($rrequest->get('pdf'));
                $zona_horaria = Auth::user()->time_zone;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('m-d-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('m-d-Y H:i:s');
                


                $vehicles=DB::table('vehicle')
                ->where('state','=','Enabled')
                ->orderBy('number_vehicle','desc')
                ->get();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.vehicles.reportvehicles', compact('vehicles','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                     $pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('VehiclesList'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.vehicles.reportvehicles', compact('vehicles','hoy','nombreusu','empresa','imagen'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                     $pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('VehiclesList'.$nompdf.'.pdf');
                }
            }
        
    }

    public function vehicleview(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->coin;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('images/licenses/');
                $verpdf=trim($rrequest->get('pdf'));
                $idvehicle=trim($rrequest->get('rid'));
                $numberVehicle=trim($rrequest->get('rnombre'));

                $zona_horaria = Auth::user()->time_zone;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('m-d-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('m-d-Y H:i:s');
                


                $vehicle=DB::table('vehicle')
                ->where('idvehicle','=',$idvehicle)
                ->first();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.vehicles.vista.vehicleview', compact('vehicle','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('VehicleView'.'-'.$numberVehicle.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.vehicles.vista.vehicleview', compact('vehicle','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('VehicleView'.'-'.$numberVehicle.'-'.$nompdf.'.pdf');
                }
            }
        }

    public function workview(ReportesFormRequest $rrequest)
    {  
            if ($rrequest)
            {
                
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->coin;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('images/licenses/');
                $verpdf=trim($rrequest->get('pdf'));
                $idwork=trim($rrequest->get('rid'));
                $workid=trim($rrequest->get('rnombre'));

                $zona_horaria = Auth::user()->time_zone;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('m-d-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('m-d-Y H:i:s');
                


                $work=DB::table('work')
                ->where('idwork','=',$idwork)
                ->first();

                $liabilities=DB::table('work_liabilities')
                ->where('idwork','=',$idwork)
                ->get();
                $files=DB::table('work_files')
                ->where('idwork','=',$idwork)
                ->get();
                $locations=DB::table('work_locations')
                ->where('idwork','=',$idwork)
                ->get();
                
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.works.vista.workview', compact('work','liabilities','files','locations','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->download ('WorkView ID: '.'-'.$workid.'-'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.works.vista.workview', compact('work','liabilities','files','locations','hoy','nombreusu','empresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    //$pdf->setPaper('A4', 'landscape');
                    return $pdf->stream ('WorkView ID: '.'-'.$workid.'-'.$nompdf.'.pdf');
                }
            }
        
    }

    public function worksreport(Request $rrequest)
    {  
            if ($rrequest)
            {
                $idempresa = Auth::user()->idempresa;
                $nombreusu = Auth::user()->name;
                $empresa = Auth::user()->empresa;
                $moneda = Auth::user()->coin;
                if (Auth::user()->logo == null)
                {
                    $logo = null;
                    $imagen = null;
                }
                else
                {
                     $logo = Auth::user()->logo;
                     $imagen = public_path('imagenes/logos/'.$logo);
                     
                }
                $path = public_path('images/licenses/');
                $verpdf=trim($rrequest->get('pdf'));
                $idwork=trim($rrequest->get('rid'));
                
                $desde=trim($rrequest->get('rdesde'));
                $hasta=trim($rrequest->get('rhasta'));

                $desde = date("Y-m-d", strtotime($desde));
                $hasta = date("Y-m-d", strtotime($hasta));

                $idadmin=$rrequest->get('idadmin');
                $idclient=$rrequest->get('idclient');
                $iddriver=$rrequest->get('iddriver');
                $idvehicle=$rrequest->get('idvehicle');
                $state_work=$rrequest->get('state');

                $ridadmin=$rrequest->get('ridadmin');
                $ridclient=$rrequest->get('ridclient');
                $riddriver=$rrequest->get('riddriver');
                $ridvehicle=$rrequest->get('ridvehicle');
                $radmin=$rrequest->get('radmin');
                $rclient=$rrequest->get('rclient');
                $rdriver=$rrequest->get('rdriver');
                $rvehicle=$rrequest->get('rvehicle');
                $rstate_work=$rrequest->get('rstate_work');


                $adminfiltro=DB::table('users')
                ->where('id','=',$ridadmin)
                ->first();
                        
                $clientfiltro=DB::table('users')
                ->where('id','=',$ridclient)
                ->first();

                $driverfiltro=DB::table('users')
                ->where('id','=',$riddriver)
                ->first();

                $vehiclefiltro=DB::table('vehicle')
                ->where('idvehicle','=',$ridvehicle)
                ->first();

                $zona_horaria = Auth::user()->time_zone;
                $hoy = Carbon::now($zona_horaria);
                $hoy = $hoy->format('d-m-Y');

                $nompdf = Carbon::now($zona_horaria);
                $nompdf = $nompdf->format('m-d-Y H:i:s');

                
                if($desde != '1970-01-01' or $hasta != '1970-01-01')
                {
                    $desde = date("Y-m-d", strtotime($desde));
                    $hasta = date("Y-m-d", strtotime($hasta));
                    if($iddriver != null and $idvehicle != null)
                    {
                        $works=DB::table('work')
                            ->whereBetween('date', [$desde, $hasta])
                            ->where('idadmin','LIKE','%'.$idadmin.'%')
                            ->where('idclient','LIKE','%'.$idclient.'%')
                            ->where('iddriver','LIKE','%'.$iddriver.'%')
                            ->where('idvehicle','LIKE','%'.$idvehicle.'%')
                            ->where('state_work','LIKE','%'.$state_work.'%')
                            ->orderBy('date','desc')
                            ->get();
                    }elseif($iddriver != null and $idvehicle == null)
                    {
                        $works=DB::table('work')
                            ->whereBetween('date', [$desde, $hasta])
                            ->where('idadmin','LIKE','%'.$idadmin.'%')
                            ->where('idclient','LIKE','%'.$idclient.'%')
                            ->where('iddriver','LIKE','%'.$iddriver.'%')
                            ->where('state_work','LIKE','%'.$state_work.'%')
                            ->orderBy('date','desc')
                            ->get();
                    }elseif($iddriver == null and $idvehicle != null)
                    {
                        $works=DB::table('work')
                            ->whereBetween('date', [$desde, $hasta])
                            ->where('idadmin','LIKE','%'.$idadmin.'%')
                            ->where('idclient','LIKE','%'.$idclient.'%')
                            ->where('idvehicle','LIKE','%'.$idvehicle.'%')
                            ->where('state_work','LIKE','%'.$state_work.'%')
                            ->orderBy('date','desc')
                            ->get();
                        
                    }elseif($iddriver == null and $idvehicle == null)
                    {
                        $works=DB::table('work')
                            ->whereBetween('date', [$desde, $hasta])
                            ->where('idadmin','LIKE','%'.$idadmin.'%')
                            ->where('idclient','LIKE','%'.$idclient.'%')
                            ->where('state_work','LIKE','%'.$state_work.'%')
                            ->orderBy('date','desc')
                            ->get();
                    }
                        
                } else
                {
                        
                    $works=DB::table('work')
                        ->orderBy('date','desc')
                        ->get();
                }
                if ( $verpdf == "Descargar" )
                {
                    $view = \View::make('pdf.works.report.workreport', compact('works','desde','hasta','hoy','adminfiltro','clientfiltro','driverfiltro','vehiclefiltro','state_work','nombreusu','empresa','idempresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->download ('WorksReport'.$nompdf.'.pdf');
                }
                if ( $verpdf == "Navegador" )
                {
                    $view = \View::make('pdf.works.report.workreport', compact('works','desde','hasta','hoy','adminfiltro','clientfiltro','driverfiltro','vehiclefiltro','state_work','nombreusu','empresa','idempresa','imagen','moneda','path'))->render();
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($view);
                    return $pdf->stream ('WorkReports'.$nompdf.'.pdf');
                }
            }
        
    }

}
