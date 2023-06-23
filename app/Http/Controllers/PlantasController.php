<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PlantasController extends Controller
{
    public function index(){
        //consulta a la base de datos
        $datos=DB::select(' select * from plantas');
        return view('welcome')->with('datos',  $datos);
    }
    //
    public function test(){
        $datos=DB::select(' select * from plantas');
        return $datos;
    }
    //Get
    public function store(Request $request)
    {
        try {
            $sql=DB::insert(' insert into plantas(ID, Nombre, NombreCientifico, Orden, Clase, Familia, Division) values(?,?,?,?,?,?,?)',[
            $request->textid,
            $request->textNombre,
            $request->textCientifico,
            $request->textOrden,
            $request->textClase,
            $request->textFamilia,
            $request->textDivision,
        ]);
            } catch (\Throwable $th) {
                $sql = 0;
            }
            return $request;
    }
    //Post 
    public function create(Request $request){
            try {
            $sql=DB::insert(' insert into plantas(ID, Nombre, NombreCientifico, Orden, Clase, Familia, Division) values(?,?,?,?,?,?,?)',[
            $request->textid,
            $request->textNombre,
            $request->textCientifico,
            $request->textOrden,
            $request->textClase,
            $request->textFamilia,
            $request->textDivision,
        ]);
            } catch (\Throwable $th) {
                $sql = 0;
            }
        if ($sql){
            return back()->with("Exito","Planta registrada exitosamente");
        } else{
            return back()->with("Lo lamento","No se pudo registrar");
        }
    }
    //Put
    public function setPlanta(Request $request, string $ID){
        try {
            $sql=DB::update(' update plantas set Nombre=?, NombreCientifico=?, Orden=?, Clase=?, Familia=?, Division=? where ID=?', [
                $request->textNombre,
                $request->textCientifico,
                $request->textOrden,
                $request->textClase,
                $request->textDivision,
                $request->textFamilia,
                
            $ID
            ]);
        } catch (\Throwable $th) {
            $sql =0;
        }
    }
    //Put
    public function update(Request $request){
        try {
            $sql=DB::update(' update plantas set Nombre=?, NombreCientifico=?, Orden=?, Clase=?, Familia=?, Division=? where ID=?', [
                $request->textNombre,
                $request->textCientifico,
                $request->textOrden,
                $request->textClase,
                $request->textFamilia,
                $request->textDivision,
                $request->textid,

            ]);
            if ($sql == 0){
                $sql = 1;
            } 
        } catch (\Throwable $th) {
            $sql =0;
        }
        if ($sql == true){
            return back()->with("Exito","Planta editado exitosamente");
        } else{
            return back()->with("Lo lamento","No se pudo editar");
        }
    }
    public function delete($ID){
        try {
            $sql = DB::delete(" delete from plantas where ID=$ID ");
            } catch (\Throwable $th) {
                $sql = 0;
            }
        if ($sql == true || "eliminar"){
            return back()->with("Exito","Planta eliminada exitosamente");
        } else{
            return back()->with("Lo lamento","No se pudo eliminar");
        }
    }

    //Delete
    public function destroy (string $ID){
        try {
            $sql = DB::delete(" delete from plantas where ID=$ID ");
            } catch (\Throwable $th) {
                $sql = 0;
            }
            return 'eliminado con exito';
    }
}
