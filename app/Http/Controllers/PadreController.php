<?php

namespace App\Http\Controllers;

use App\Models\Padre;
use Illuminate\Http\Request;

class PadreController extends Controller
{
    public function findAll(){
        $padre = Padre::all();
 
        return $padre;
     }
 
 
     public function findById(Request $request){
       //dd($request->id);
       $padre = Padre::where('Cod_Padres', $request->Cod_Padres)->get();
       
         return $padre;
      }
 
 
      public function findByDNI(Request $request){
       
       $padre = Padre::where('DNI_Padres', $request->dni)->get();
       
         return $padre;
      }
 
      public function destroy(Request $request){
       
       $padre = Padre::where('Cod_Padres', $request->Cod_Padres);
       $padre->delete();
 
       return 'Padre Eliminado';
       
      }
 
      public function store(Request $request){
       
        Padre::create([
                    
            'Nomb_Padres'   =>  $request->Nomb_Padres,
            'Dni_Padres'    =>  $request->Dni_Padres,
            'Domi_Padres'   =>  $request->Domi_Padres,
            'CPos_Padres'   =>  $request->CPos_Padres,
            'Pobl_Padres'   =>  $request->Pobl_Padres,
            'Prov_Padres'   =>  $request->Prov_Padres,
            'Tfn1_Padres'   =>  $request->Tfn1_Padress,
            'Tfn2_Padres'   =>  $request->Tfn2_Padres,
            'Emai_Padres'   =>  $request->Emai_Padres,
            'Varios_Padres' =>  $request->Varios_Padres,
            'Pred_Padres'   =>  $request->Pred_Padres         
          
      ]);
       
         return 'Padre Creado';
      }
 
      public function update(Request $request){      
 
          Padre::where('Cod_Padres' , $request->Cod_Padres)->update([
            
            'Nomb_Padres'   =>  $request->Nomb_Padres,
            'Dni_Padres'    =>  $request->Dni_Padres,
            'Domi_Padres'   =>  $request->Domi_Padres,
            'CPos_Padres'   =>  $request->CPos_Padres,
            'Pobl_Padres'   =>  $request->Pobl_Padres,
            'Prov_Padres'   =>  $request->Prov_Padres,
            'Tfn1_Padres'   =>  $request->Tfn1_Padress,
            'Tfn2_Padres'   =>  $request->Tfn2_Padres,
            'Emai_Padres'   =>  $request->Emai_Padres,
            'Varios_Padres' =>  $request->Varios_Padres,
            'Pred_Padres'   =>  $request->Pred_Padres    
          ]);
       
          return 'Padre Actualizado';
      }
 
 
      public function showToken(){
       //echo csrf_token(); 
 
       return csrf_token();
    }
}
