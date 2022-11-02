<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comentarios;
use Illuminate\Support\Facades\Auth;
use DB;
class AulaController extends Controller
{
    public function comentar(Request $request) {
       //Precisamos colocar o metodo Auth::user()->id em alunos_id
        
        $query = [
            'descricao' => $request->comentario,
            'aulas_id' => $request->aula_id,
            'aluno_id' => Auth::user()->id,
        ];

        $comentarios = Comentarios::create($query);


        return response()->json($comentarios);
    }
}
