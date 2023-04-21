<?php

namespace App\Http\Controllers\Personal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Session;
use Carbon\Carbon;
use Hash;

/*modelos */
use App\Models\Personal\Agente;
use App\Models\Personal\Persona;
use App\Models\Personal\PerLicencias;
use App\Models\Intranet\Usuario;
use App\Models\Admin\Log;

class PersonalController extends Controller
{
    public function index()
    {
        $agentes = Agente::all();
        return($agentes);

    }

    public function f80(Request $request)
    {
        /* $passIntranet = hash('md5', '18031971');
        $usuario =Usuario::where('clave', '=', $passIntranet)->get();
        return($usuario); */


        /* definicion de varibles iniciales */
        $persona = [];
        $agente = [];
        $licencias = [];
        $data = [];
        $lectura ='';
        $mes =  now()->format('m');
        $hoy = now()->format('Y-m-d');
        $contador = 0;
        $dni = "";
        $display = 'display:none;';


        if(isset($request->dni))
        {
            $personas = Persona::where('NroDoc', '=',$request->dni)->get();
            $dni=$request->dni;
            $display = 'display:inline;';
            //return($personas);

            if(count($personas)<=0) {

                //mensaje
                Session::flash('message','Número de Documento no Encontrado en Base de Dato');

            }else{
                //$year = now()->format('Y');
                $year = '2022';
                foreach($personas as $item) {
                    $persona = ['idPersona'=>$item->idPersona, 'NroDoc'=>$item->NroDoc, 'Apellido'=>$item->Apellido, 'Nombre'=>$item->Nombre];
                }
                $agente = Agente::where('idPersona', '=',$persona['idPersona'])
                        ->whereIn('idEstado', ['2','6','13','14','15','16','17','100'])
                        ->get();

                $anual=DB::connection('personaldb')->table('per_licencias')->select('FechaDesde', 'FechaHasta')
                                                        ->where('idAgente', '=', $agente[0]->idAgente)
                                                        ->where('idArticulo', '=', '58')
                                                        ->whereYear('FechaDesde', '=', $year)
                                                        ->groupBy('FechaDesde', 'FechaHasta')
                                                        ->orderBy('FechaDesde', 'DESC')
                                                        ->get();
                //controlo la cantidad mensual
                foreach ($anual as $value) {
                    $fecha = \Carbon\Carbon::parse($value->FechaDesde);
                    $mesDesde = $fecha->format("m");

                    if( $mesDesde  == $mes ){

                        $contador = $contador + 1;
                    }
                }
                //return($contador);

                $data = json_decode($anual);
                $lectura = "readonly='readonly'";
                $display = 'display:none;';

            }
        }

        return view('personal.f80', compact('persona', 'agente', 'data','lectura', 'hoy', 'contador','dni', 'display'));

    }
}
