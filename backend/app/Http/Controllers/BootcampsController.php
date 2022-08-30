<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;

class BootcampsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "Aqui se va mostrar proximamente todos los Bootcamp";
        return response()->json(["success" => true,
                                        "data" => Bootcamp::all()
                                ] , 200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo "Aqui se crea un Bootcamp";
        //Verificar que llegó aquí el payload
       $b = Bootcamp::create ([
            "name" =>$request->name,
            "description" =>$request->description,
            "website" =>$request->website,
            "phone" => $request->phone,
            "user_id" => $request->user_id
        ]);
        return response()->json(["success" => true,
                                "data" => $b  ] , 201 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     return response()->json(["success" => true,
                                "data" => Bootcamp::find($id)
                                ] , 200 );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //1. Seleccionar el bootcamp por id 
        $bootcamp = Bootcamp::find ($id);
        //2.Actualizarlo
        $bootcamp->update(
            $request->all()
        );
        //3.Hacer el response respectivo 
        return response()->json(["success" => true, 
                    "data" => $bootcamp] , 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //echo "Aqui se va a elimnar el Bootcamp cuyo id es: $id";
        //1.Seleccionas el bootcamp
        $bootcamp = Bootcamp::find($id); 
        //2.Eliminar ese bootcamp 
        $bootcamp->delete();
        return response()->json(["success" => true , 
                        "message" => "Bootcamp eliminado",
                        "data" => $bootcamp->id ] , 200);
    }
}
