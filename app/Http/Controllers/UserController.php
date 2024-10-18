<?php

namespace App\Http\Controllers;


class UserController extends Controller
{
    public function index(){
        //carregar a view
        return view('user.index');
    }
}
