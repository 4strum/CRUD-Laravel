<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;


class UserController extends Controller
{
    public function index(){
        //recuperar os registros do banco de dados
        $users = User::orderByDesc('id')->get();

        
        //carregar a view
        return view('user.index', ['users' => $users]);
    }

    public function show(User $user){

        return view('user.show',['user' => $user]);

    }

    public function create(){
        //carregar a view
        return view('user.create');
    }
    public function store(UserRequest $request){
        
        //validar o formulario
        $request->validated();
        //cadastra o usuario
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->senha
        ]);
        // redirecionar o usuario, enviar mensagem de sucesso
        return redirect()->route('user.index')->with('success', 'Usuario cadastrado com sucesso');

    }

}