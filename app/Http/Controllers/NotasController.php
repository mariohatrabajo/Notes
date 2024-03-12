<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Nota;
use Illuminate\Support\Facades\Auth;

class NotasController extends Controller
{
    public function guardar(Request $request) {
        // Comprobamos si hay id
        $id = $request->input('id');
        if(isset($id)){

            $nota = Nota::whereId($id)->first();
            // Comprobamos que la nota exista
            if(isset($nota)){
                $titulo = $request->input('titulo');
                $nota->titulo = (isset($titulo))? $titulo : "";
                
                $contenido = $request->input('nota');
                $nota->contenido = (isset($contenido))? $contenido : "";
                
                $nota->save();
            }else {
                $nota = new Nota();
            }

            // return $nota;
            return redirect()->route('abrirNota', $nota->id);
        }else {
            // Creamos una nueva nota
            return $this->crear($request);
        }
    }

    public function abrirNota(string $id) {
        // Obtenemos las notas del usuario
        $notas_autor = Nota::whereUser_id(Auth::id())->get();
        $nota_abierta = Nota::whereId($id)->first();

        return view('paginas.notas', ['notas' => $notas_autor, "nota_abierta" => $nota_abierta]);
    }

    public function crearView(){
        return view('paginas.crearNota');
    }

    /**
     * Crea una nota desde el botón de crear nota
     */
    public function crear(Request $request) {
        $nota = new Nota();
        $nota->titulo = $request->input('titulo');
        
        // Comprobamos si trae un contenido (Se crea desde guardar)
        $contenido = $request->input('nota');
        $nota->contenido = (isset($contenido))? $contenido : "";
        $nota->user_id = Auth::id();
        $nota->save();

        $autor = User::find(Auth::id())->first();
        // return $nota;
        return redirect()->route('abrirNota', $nota->id);
    }

}
