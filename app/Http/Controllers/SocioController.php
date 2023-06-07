<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Cargo;
use App\Models\Socio;
use App\Models\Persona;
use Illuminate\Http\Request;

class SocioController extends Controller
{
    public function show(Request $request)
    {
        $socio = Socio::where('Cod_Socios', $request->cod)->get();
        if(count($socio)){           
            $socio = $socio[0];
        }

        $cargos = Cargo::all();
        $personas = Persona::all();
        $clubs = Club::all();

        if(isset($socio->Cod_Socios)){                                    
        return view('socio.socioShow',['socio'=>$socio, 'cargos'=>$cargos]);            
        }
        
        return view('socio.socioShow',['cargos'=>$cargos, 'personas'=>$personas, 'clubs'=>$clubs]);

    }




    public function create()
   {
      return view('socio.socioShow');
   }




    public function socios(Request $request)
    {
        $socios = Socio::all();
        if(isset($request->mensaje)){        
            return view('socio.socio')->with(['socios'=>$socios, 'mensaje'=>$request->mensaje]);
        }
        return view('socio.socio')->with(['socios'=>$socios]);
    }



    public function find(Request $request)
    {
        return redirect()->route('socio.show', ['cod'=> $request->cod]);    
    }



    public function store(Request $request)
    {        
        $request->validate(         
            [
               'codSoc' => 'nullable',
               'codPer'=>'required',
               'codClu'=>'required',
               'fAlta'=>'required',
               'carg'=>'nullable',
               'cCuo'=>'nullable',
               'soFu'=>'nullable',
               'fBaj'=>'nullable',
               'moti'=>'nullable'                      
            ]         
        );

        Socio::create([
            'CPer_Socios' => $request->codPer,            
            'CClu_Socios' => $request->codClu,
            'CCuo_Socios' => $request->cCuo,
            'SoFu_Socios' => $request->soFu,
            'FAlt_Socios' => $request->fAlta,
            'Carg_Socios' => $request->carg,
            'FBaj_Socios' => $request->fBaj,
            'Moti_Socios' => $request->moti 
        ]);

        $socio = Socio::all()->last();

        return redirect()->route('socio.show',['cod'=>$socio->Cod_Socios]);

    }



    public function update(Request $request)
    {
        $request->validate(         
            [
               'codSoc' => 'nullable',
               'codPer'=>'required',
               'codClu'=>'required',
               'fAlta'=>'required',
               'carg'=>'required',
               'cCuo'=>'required',
               'soFu'=>'required',
               'fBaj'=>'nullable',
               'moti'=>'nullable'                      
            ]         
        );

        Socio::where('Cod_Socios' , $request->codPadre)->update([
            'Nomb_Padres'   =>  $request->nomPadre,
            'Dni_Padres'    =>  $request->dniPadre,
            'Domi_Padres'   =>  $request->domiPadre,
            'CPos_Padres'   =>  $request->cposPadre,
            'Pobl_Padres'   =>  $request->poblPadre,
            'Prov_Padres'   =>  $request->provPadre,
            'Tfn1_Padres'   =>  $request->telfPadre,
            'Tfn2_Padres'   =>  $request->telf2Padre,
            'Emai_Padres'   =>  $request->emailPadre,
            'Varios_Padres' =>  $request->variosPadre,
            'Pred_Padres'   =>  $request->predPadre  
         ]);

    }



    public function destroy(Request $request)
    {
        $socio = Socio::where('Cod_Socios', $request->cod);
        
        if(count($socio->get())) 
        {            
            $socio->delete();            
            return redirect()->route('socios', ['mensaje'=>'Socio eliminado correctamente']);
        }
        return back();   
    }
}
