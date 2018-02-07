<?php

namespace libronet\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use libronet\Usuarios; 

class Controlleruser extends Controller
{
    //

public function index(){

return view('usuarios');

}


public function fncingreso(Request $request){

    $input = request()->all();

    $nombre = $request->USUARIOS_NOMBRE;
    $email = $request->USUARIOS_EMAIL;
    $password = $request->USUARIOS_PASSWORD;
    

    $id = DB::table('Usuarios')->insertGetId(
        [
            'USUARIOS_NOMBRE' => $nombre,
            'USUARIOS_EMAIL' => $email,
            'USUARIOS_PASSWORD' => $password ,
        ]
    );
      
    return response()->json(['success'=>'Got Simple Ajax Request.']);
    
}

public function fncdelete(Request $request){

  // $input = request()->all();

  $id = $request->USUARIOS_ID;
  $nombre = $request->USUARIOS_NOMBRE;
  $email = $request->USUARIOS_EMAIL; 
   
  $deletedRows = usuarios::where('USUARIOS_ID', $id )->delete();

    
  return response()->json(['success'=>'Got Simple Ajax Request.']);
    
}

public function fncupdate(Request $request){

   // $input = request()->all();

    $id = $request->USUARIOS_ID;
    $nombre = $request->USUARIOS_NOMBRE;
    $email = $request->USUARIOS_EMAIL;
    $password = $request->USUARIOS_PASSWORD;
     

    $id =  DB::table('Usuarios')
        ->where('USUARIOS_ID', $id )  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array(
            'USUARIOS_NOMBRE' => $nombre,
            'USUARIOS_EMAIL' => $email,
            'USUARIOS_PASSWORD' => $password        
        ));  // update the record in the DB. 

   

      
    return response()->json(['success'=>'Got Simple Ajax Request.']);
    
}

public function fnclistar(){

    $datos = usuarios::all(); 
 
    return response()->json($datos->toArray());
    
}


}
