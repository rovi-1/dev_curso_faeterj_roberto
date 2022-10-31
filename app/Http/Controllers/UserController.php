<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }   
    public function auth(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);
        //echo password_hash($request->password, PASSWORD_DEFAULT);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return view('home');
        }else{
            dd('n logou');
        }
    }  
    public function cadastro_user(){
        return view('cad_users');
    }
    public function salvar_user(Request $request) {
        User::create([
            'name' => $request->name, 
            'email' => $request->email, 
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf, 
            'rg' => $request->rg, 
            'orgao' => $request->orgao,
            'data_expedicao' => $request->data_expedicao, 
            'cep' => $request->cep, 
            'logradouro' => $request->logradouro,
            'numero' => $request->numero, 
            'bairro' => $request->bairro, 
            'cidade' => $request->cidade,
            'uf' => $request->uf, 
            'grupo' => $request->grupo 
        ]);
        return redirect('/cadastro/user')->with('success', 'Sua conta foi criada com sucesso.');
    }
}
