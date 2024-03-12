<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Nota;
use Illuminate\Support\Facades\Auth;

class PaginaController extends Controller
{
    public function dashboard() {
        // Obtenemos las notas del usuario
        $autor = User::find(Auth::id())->first();

        // return view('dashboard', ['notas' => $autor->notas]);
        return redirect()->route('notas');
    }

    public function notas() {
        $notas_autor = Nota::whereUser_id(Auth::id())->get();
        $nota = new Nota();
        return view('paginas.notas', ['notas' => $notas_autor, 'nota_abierta' => $nota]);
    }
}
