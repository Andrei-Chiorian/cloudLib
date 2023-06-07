<?php

namespace App\Http\Controllers;

use App\Models\Padre;
use App\Models\Padre_1;
use App\Models\Persona;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rules\Exists;

class PersonaController extends Controller
{
   
   public function showAfiliado(Request $request)
   {
           
      $persona = Persona::where('Cod_Personas', $request->cod)->get();

      //Verificamos que el array no viene vacio y si no viene le asignamos el primer objeto del array
      if(count($persona)){
         $persona = $persona[0];
         //dd($persona);
         //al tener la persona buscamos sus padres
         $padre = Padre::where('Cod_Padres', $persona->CPad_Personas)->get();
         $madre = Padre_1::where('Cod_Padres', $persona->CMad_Personas)->get();

         //lo mismo que con la persona
         if(count($padre)){
            $padre = $padre[0];
         }
         if(count($madre)){
            $madre = $madre[0];
         }
        //dd($padre);
         //Comprobamos que variables se han creado para redirigir a la funcion index con una o mas variables 
         if(isset($padre->Cod_Padres)){
            if (isset($madre->Cod_Padres)) {
                          
               return view('general.generalShow',['persona'=>$persona, 'padre' => $padre, 'madre' => $madre]);
            }
            //return redirect('/afiliados/general/{persona}')->with(['persona'=> $persona, 'padre' => $padre]);
            return view('general.generalShow',['persona'=>$persona, 'padre' => $padre]);
         }           
         //return redirect('/afiliados/general/{persona}')->with(['persona'=> $persona]);
         return view('general.generalShow',['persona'=>$persona,]);      
      }     
   }

   public function create()
   {
      return view('general.generalShow');
   }

   public function general()
   {
      $personas = Persona::all();

      return view('general.general')->with(['personas'=>$personas]);
   }




//BUSCAR AFILIADO
   public function find(Request $request)
   {  
      $nom = Str::slug($request->nom);
      
      return redirect()->route('show', ['cod'=> $request->cod, 'nom'=>$nom]);
      
     
   }




//BORRAR AFILIADO
   public function destroy(Request $request)
   {
      
      $persona = Persona::where('Cod_Personas', $request->cod_persona);
      
      if(count($persona->get())) 
      {
         $persona->delete();
         return back()->with('mensaje','Afiliado eliminado correctamente');
      }      
   }




   //CREAR AFILIADO
   public function store(Request $request)
   {
      
     //Validamos por separado cada entidad padre madre persona  
     $request->validate(         
      [
         'codigo' => 'nullable',
         'apellidos'=>'required',
         'nombre'=>'required|max:30',
         'fnaci'=>'required',
         'NFot_Personas'=>'nullable',
         'dni'=>['required','alpha_num:ascii',Rule::unique('personas','Dni_Personas')],
         'domicilio'=>'required',
         'cpostal'=>'required|numeric',
         'poblacion'=>'required',
         'provincia'=>'required',
         'telf'=>'required|digits:9',
         'telf2'=>'nullable|digits:9',
         'email'=>'nullable|email|max:150', //'Emai_Personas'=>'nullable|email:rfc,dns|max:150',            
         'falta'=>'required',
         'grupoFam'=>'nullable',
         'desc'=>'nullable',
         'fdesc'=>'nullable',
         'mdesc'=>'nullable',
         'lopd'=>'nullable',           
      ]         
      );
      //dd('persona validada');
      if ($request->nomPadre||$request->dniPadre) 
      {
         $request->validate(         
            [   
               'codPadre' => 'nullable',
               'nomPadre'=>'required',
               'dniPadre'=>['required','alpha_num:ascii'],//Rule::unique('padres','Dni_Padres')->ignore($request->codPadre,'Cod_Padres')],
               'domiPadre'=>'required',
               'cposPadre'=>'nullable',
               'poblPadre'=>'required',
               'provPadre'=>'required',
               'telfPadre'=>'required',
               'telf2Padre'=>'nullable',
               'emailPadre'=>'nullable',
               'variosPadre'=>'nullable',
               'predPadre'=>'nullable',             
            ]         
         );
      }

      //dd('padre validado');

      if ($request->nomMadre||$request->dniMadre)
      {
         $request->validate(         
            [           
               'codMadre' => 'nullable',
               'nomMadre'=>'required',
               'dniMadre'=>['required','alpha_num:ascii'],//Rule::unique('padre_1s','Dni_Padres')->ignore($request->codMadre,'Cod_Padres')],
               'domiMadre'=>'required',
               'cposMadre'=>'nullable',
               'poblMadre'=>'required',
               'provMadre'=>'required',
               'telfMadre'=>'nullable',
               'telf2Madre'=>'nullable',
               'emailMadre'=>'nullable',
               'variosMadre'=>'nullable',
               'predMadre'=>'nullable',            
            ]         
         );
      }

      //dd('madre validada');

      //Verificamos si viene algun dni de padre o madre para saber si operar o no con ellos
      if ($request->dniPadre) {
         //Buscamos si ya existe ese padre en tal caso se lo asignamos a la persona en caso contrario creamos uno
         $padre = Padre::where('Dni_Padres',$request->dniPadre)->get();
         if (count($padre) == 0) {
            Padre::create([
                     
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
            $padre = Padre::where('Dni_Padres',$request->dniPadre)->get();
            if(count($padre)){
               $padre = $padre[0];
            }
         }else{

            $padre = $padre[0];
         }
      }
      //dd('padre encontrado  '.$padre);
      if ($request->dniMadre) {
         //Buscamos si ya existe esa madre en tal caso se lo asignamos a la persona en caso contrario creamos una
         $madre = Padre_1::where('Dni_Padres',$request->dniMadre)->get();
         if (count($madre) == 0) {
            Padre_1::create([
                     
               'Nomb_Padres'   =>  $request->nomMadre,
               'Dni_Padres'    =>  $request->dniMadre,
               'Domi_Padres'   =>  $request->domiMadre,
               'CPos_Padres'   =>  $request->cposMadre,
               'Pobl_Padres'   =>  $request->poblMadre,
               'Prov_Padres'   =>  $request->provMadre,
               'Tfn1_Padres'   =>  $request->telfMadre,
               'Tfn2_Padres'   =>  $request->telf2Madre,
               'Emai_Padres'   =>  $request->emailMadre,
               'Varios_Padres' =>  $request->variosMadre,
               'Pred_Padres'   =>  $request->predMadre           
               
            ]);
            
            $madre = Padre_1::where('Dni_Padres',$request->dniMadre)->get();
            if(count($madre)){
               $madre = $madre[0];
            }
         }else{            
            $madre = $madre[0];            
         }
      }
      
      if (isset($padre->Cod_Padres)) {
         $padreInsert = $padre->Cod_Padres;
      }else{
         $padreInsert = null;
      }

      if (isset($madre->Cod_Padres)) {
         $madreInsert = $madre->Cod_Padres;
      }else{
         $madreInsert = null;
      }
      
      // Verificamos que el update se realiza sobre una persona comprobando el campo codigo del request en caso contrario no realizamos nada
      
      Persona::create([
         //'Hue1_Personas' =>  $request->Hue1_Personas,
         //'Obse_Personas' =>  $request->Obse_Personas,
         'Apel_Personas' =>  $request->apellidos,
         'Nomb_Personas' =>  $request->nombre,
         'FNac_Personas' =>  $request->fnaci,
         'NFot_Personas' =>  $request->NFot_Personas,
         'Dni_Personas'  =>  $request->dni,
         'Domi_Personas' =>  $request->domicilio,
         'CPos_Personas' =>  $request->cpostal,
         'Pobl_Personas' =>  $request->poblacion,
         'Prov_Personas' =>  $request->provincia,
         'Tfn1_Personas' =>  $request->telf,
         'Tfn2_Personas' =>  $request->telf2,
         'Emai_Personas' =>  $request->email,
         'CPad_Personas' =>  $padreInsert,
         'CMad_Personas' =>  $madreInsert,
         'FAlt_Personas' =>  $request->falta,
         //'CGru_Personas' =>  $request->grupoFam,
         'Desc_Personas' =>  $request->desc,
         'FDes_Personas' =>  $request->fdesc,
         'MBaj_Personas' =>  $request->mdesc,
         'Lopd_Personas' =>  $request->lopd  
      ]);

      $persona = Persona::where('Dni_Personas', $request->dni)->get();
      $nom = $request->nombre . '-' . $request->apellidos;
      return redirect()->route('show',['cod'=>$persona[0]->Cod_Personas, 'nom'=>$nom]);    
   }



   //ACTUALIZAR AFILIADO
   public function update(Request $request)
   {  
      //Validamos por separado cada entidad padre madre persona  
      $request->validate(         
         [
            'codigo' => 'nullable',
            'apellidos'=>'required',
            'nombre'=>'required|max:30',
            'fnaci'=>'required',
            'NFot_Personas'=>'nullable',
            'dni'=>['required','alpha_num:ascii',Rule::unique('personas','Dni_Personas')->ignore($request->codigo,'Cod_Personas')],
            'domicilio'=>'required',
            'cpostal'=>'required|numeric',
            'poblacion'=>'required',
            'provincia'=>'required',
            'telf'=>'required|digits:9',
            'telf2'=>'nullable|digits:9',
            'email'=>'nullable|email|max:150', //'Emai_Personas'=>'nullable|email:rfc,dns|max:150',            
            'falta'=>'required',
            'grupoFam'=>'nullable',
            'desc'=>'nullable',
            'fdesc'=>'nullable',
            'mdesc'=>'nullable',
            'lopd'=>'nullable',           
         ]         
      );
      
      if ($request->nomPadre||$request->dniPadre) 
      {
         $request->validate(         
            [   
               'codPadre' => 'nullable',
               'nomPadre'=>'required',
               'dniPadre'=>['required','alpha_num:ascii'],//Rule::unique('padres','Dni_Padres')->ignore($request->codPadre,'Cod_Padres')],
               'domiPadre'=>'required',
               'cposPadre'=>'nullable',
               'poblPadre'=>'required',
               'provPadre'=>'required',
               'telfPadre'=>'required',
               'telf2Padre'=>'nullable',
               'emailPadre'=>'nullable',
               'variosPadre'=>'nullable',
               'predPadre'=>'nullable',               
            ]         
         );
      }
      if ($request->nomMadre||$request->dniMadre)
      {
         $request->validate(         
            [           
               'codMadre' => 'nullable',
               'nomMadre'=>'required',
               'dniMadre'=>['required','alpha_num:ascii'],//Rule::unique('padre_1s','Dni_Padres')->ignore($request->codMadre,'Cod_Padres')],
               'domiMadre'=>'required',
               'cposMadre'=>'nullable',
               'poblMadre'=>'required',
               'provMadre'=>'required',
               'telfMadre'=>'nullable',
               'telf2Madre'=>'nullable',
               'emailMadre'=>'nullable',
               'variosMadre'=>'nullable',
               'predMadre'=>'nullable',           
            ]         
         );
      }
      

      //Verificamos si viene algun nombre de padre o madre si viene verificamos si existe el codPadre o codMadre para saber si hacemos un update o en caso de que solo venga el nombre lo creamos
      if ($request->nomPadre) {
         if ($request->codPadre) {
            Padre::where('Cod_Padres' , $request->codPadre)->update([
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
         }else{
            Padre::create([
                    
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
      }

      if ($request->nomMadre) {
         if ($request->codMadre) {
            Padre_1::where('Cod_Padres' , $request->codMadre)->update([
               'Nomb_Padres'   =>  $request->nomMadre,
               'Dni_Padres'    =>  $request->dniMadre,
               'Domi_Padres'   =>  $request->domiMadre,
               'CPos_Padres'   =>  $request->cposMadre,
               'Pobl_Padres'   =>  $request->poblMadre,
               'Prov_Padres'   =>  $request->provMadre,
               'Tfn1_Padres'   =>  $request->telfMadre,
               'Tfn2_Padres'   =>  $request->telf2Madre,
               'Emai_Padres'   =>  $request->emailMadre,
               'Varios_Padres' =>  $request->variosMadre,
               'Pred_Padres'   =>  $request->predMadre  
            ]);
         }else{
           Padre_1::create([
                    
               'Nomb_Padres'   =>  $request->nomMadre,
               'Dni_Padres'    =>  $request->dniMadre,
               'Domi_Padres'   =>  $request->domiMadre,
               'CPos_Padres'   =>  $request->cposMadre,
               'Pobl_Padres'   =>  $request->poblMadre,
               'Prov_Padres'   =>  $request->provMadre,
               'Tfn1_Padres'   =>  $request->telfMadre,
               'Tfn2_Padres'   =>  $request->telf2Madre,
               'Emai_Padres'   =>  $request->emailMadre,
               'Varios_Padres' =>  $request->variosMadre,
               'Pred_Padres'   =>  $request->predMadre           
             
            ]);
         }
      }

      //Encaso de que hayamos creado un padre/madre nuevo creamos un objeto del mismo mendiante una consulta verificando si la request traia un padre o madre mendiate el dni si lo trae hacemos la consulta despues al venir en un array de objetos verificamos si el array esta vacio y si no lo esta asiganmos la variable padre al primer objeto del array
      if ($request->dniPadre) {
         $padre = Padre::where('Dni_Padres', $request->dniPadre)->get();
         if (count($padre)) {
            $padre = $padre[0];
         }
      }

      if ($request->dniMadre) {
         $madre = Padre_1::where('Dni_Padres', $request->dniMadre)->get();
         if (count($madre)) {
            $madre = $madre[0];
         }
      }

      //Verificamos si el objeto padre se recupero correctramente en tal caso creamos la variable padreInsert y madreInsert para usarla en el update de persona para asignar el nuevo padre al campo CPad_Personas o CMad_Personas si no se ha creado es que la persona no tiene padres introducidos con lo cual lo establecemos en null 
      if (isset($padre)) {
         $padreInsert = $padre->Cod_Padres;
      }else{
         $padreInsert = null;
      }

      if (isset($madre)) {
         $madreInsert = $madre->Cod_Padres;
      }else{
         $madreInsert = null;
      }
      
      // Verificamos que el update se realiza sobre una persona comprobando el campo codigo del request en caso contrario no realizamos nada
      if ($request->codigo) {
         Persona::where('Cod_Personas' , $request->codigo)->update([
            //'Hue1_Personas' =>  $request->Hue1_Personas,
            //'Obse_Personas' =>  $request->Obse_Personas,
            'Apel_Personas' =>  $request->apellidos,
            'Nomb_Personas' =>  $request->nombre,
            'FNac_Personas' =>  $request->fnaci,
            'NFot_Personas' =>  $request->NFot_Personas,
            'Dni_Personas'  =>  $request->dni,
            'Domi_Personas' =>  $request->domicilio,
            'CPos_Personas' =>  $request->cpostal,
            'Pobl_Personas' =>  $request->poblacion,
            'Prov_Personas' =>  $request->provincia,
            'Tfn1_Personas' =>  $request->telf,
            'Tfn2_Personas' =>  $request->telf2,
            'Emai_Personas' =>  $request->email,
            'CPad_Personas' =>  $padreInsert,
            'CMad_Personas' =>  $madreInsert,
            'FAlt_Personas' =>  $request->falta,
            //'CGru_Personas' =>  $request->grupoFam,
            'Desc_Personas' =>  $request->desc,
            'FDes_Personas' =>  $request->fdesc,
            'MBaj_Personas' =>  $request->mdesc,
            'Lopd_Personas' =>  $request->lopd  
         ]);

         //Al igual que con los padres verificamos que array no venga vacio y asginamos la variable persona al primer objeto del array
         $persona = Persona::where('Cod_Personas', $request->codigo)->get();
         $persona = $persona[0];
      }            

      //Comprobamos que variables se han creado para redirigir a la funcion index con una o mas variables 
      // if(isset($padre->Cod_Padres)){
      //    if (isset($madre->Cod_Padres)) {
      //       return redirect('show.persona')->with(['persona'=> $persona, 'padre' => $padre, 'madre' =>$madre]);
      //    }
      //    return redirect('show.persona')->with(['persona'=> $persona, 'padre' => $padre]);
      // }    

      // if ($request->codigo) {
      //    return redirect('show.persona')->with('persona', $persona);
      // }
      $nom = $request->nombre . '-' . $request->apellidos;
      return redirect()->route('show',['cod'=>$request->codigo, 'nom'=>$nom]);
   }



   // public function showToken()
   // {   
   //    return csrf_token();
   // }
}
