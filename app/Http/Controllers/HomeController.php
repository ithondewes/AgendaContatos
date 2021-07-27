<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contato;
use App\Http\Requests\ContatoRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $contatos = Contato::where('user_id', $user_id)->paginate();
        return view('contato.index', ['contatos' => $contatos,]);
    }
}
