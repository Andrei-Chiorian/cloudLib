<?php

namespace App\Http\Controllers;

use App\Models\Padre_1;
use Illuminate\Http\Request;

class Padre_1Controller extends Controller
{
    public function findAll(){
        $padre_1 = Padre_1::all();
 
        return $padre_1;
     }
 
 
     public function findById(Request $request){
       //dd($request->id);
       $padre_1 = Padre_1::where('Cod_Padres', $request->Cod_Padres)->get();
       
         return $padre_1;
      }
 
 
      public function findByDNI(Request $request){
       
       $padre_1 = Padre_1::where('DNI_Padres', $request->dni)->get();
       
         return $padre_1;
      }
 
      public function destroy(Request $request){
       
       $padre_1 = Padre_1::where('Cod_Padres', $request->Cod_Padres);
       $padre_1->delete();
 
       return 'Padre Eliminado';
       
      }
 
      public function store(Request $request){
       
        Padre_1::create([
                    
            'Nomb_Padres'   =>  $request->Nomb_Padres,
            'Dni_Padres'    =>  $request->Dni_Padres,
            'Domi_Padres'   =>  $request->Domi_Padres,
            'CPos_Padres'   =>  $request->CPos_Padres,
            'Pobl_Padres'   =>  $request->Pobl_Padres,
            'Prov_Padres'   =>  $request->Prov_Padres,
            'Tfn1_Padres'   =>  $request->Tfn1_Padres,
            'Tfn2_Padres'   =>  $request->Tfn2_Padres,
            'Emai_Padres'   =>  $request->Emai_Padres,
            'Varios_Padres' =>  $request->Varios_Padres,
            'Pred_Padres'   =>  $request->Pred_Padres         
          
      ]);
       
         return 'Padre Creado';
      }
 
      public function update(Request $request){      
 
          Padre_1::where('Cod_Padres' , $request->Cod_Padres)->update([
            
            'Nomb_Padres'   =>  $request->Nomb_Padres,
            'Dni_Padres'    =>  $request->Dni_Padres,
            'Domi_Padres'   =>  $request->Domi_Padres,
            'CPos_Padres'   =>  $request->CPos_Padres,
            'Pobl_Padres'   =>  $request->Pobl_Padres,
            'Prov_Padres'   =>  $request->Prov_Padres,
            'Tfn1_Padres'   =>   $request->Tfn1_Padres,
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
