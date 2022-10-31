<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Aula;
use App\Modulo;
use App\User;
use Illuminate\Http\Request;
use DB;

class CursoController extends Controller
{
    public function index() {
        $cursos = Curso::paginate(4);
        return view('cursos', compact('cursos'));

    }

    public function pesquisar_curso(Request $request) {
        $nome = trim($request->nome);
        $cursos = Curso::where('nome', 'like', "%${nome}%")->paginate(4);
        return view('cursos', compact('cursos'));
    }

    public function show_cursos($id) { 
        $curso = Curso::where('id', '=', $id)->get();
        $aula = Aula::where('modulos_id', '=', '1')
                ->where('cursos.id', '=', $id)
                ->join('modulos', 'modulos.id', '=', 'aulas.modulos_id')
                ->join('cursos', 'cursos.id', '=', 'modulos.cursos_id')
                ->select('aulas.*')
                ->orderBy('id', 'ASC')
                ->limit(1)
                ->first(); 
        return view('curso', compact('curso', 'aula'));
    }
    public function cadastro(){
        $professores = $this->_professores();
        return view('cad_cursos', compact('professores'));
    }
    private function _professores() {
        return User::where('grupo','=', 'professor-admin')
        ->orwhere('grupo','=', 'professor')
        ->get();
    }   
    public function salvar_curso(Request $request) {
         Curso::create($request->all());
         $professores = $this->_professores();
         return view('cad_cursos', compact('professores'));
    }
    private function _cursos() {
        return Curso::get();
    }
    
    private function _modulos() {
        return Modulo::get();
    }

    public function cadastro_modulos(){
        $cursos = $this->_cursos();
        return view('cad_modulos', compact('cursos'));
    }
    public function salvar_modulo(Request $request) {
        Modulo::create($request->all());
        return redirect('/cadastro/modulos')->with('success', 'Seu modulo foi criado com sucesso.');
   }
    public function cadastro_aulas(){
        $modulos = $this->_modulos();
        return view('cad_aulas', compact('modulos'));
    }
    public function salvar_aula(Request $request) {
        Aula::create($request->all());
        return redirect('/cadastro/aulas')->with('success', 'Sua aula foi criada com sucesso.');
    }

}

