<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\User;
use App\Contato;
use App\Http\Requests\ContatoRequest;
use App\Telefone;
use App\Http\Requests\TelefoneRequest;
use App\Endereco;
use App\Http\Requests\EnderecoRequest;
use App\Grupo;
use App\Mail\NovoContatoMail;


class ContatoController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Contato $contato)
    {
    $this->request = $request;
    $this->repository = $contato;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $contatos = Contato::where('user_id', $user_id)->paginate();
        return view('contato.index', ['contatos' => $contatos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('contato.create', ['grupos' => Grupo::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContatoRequest $request)
    {
        $dados = $request->all();
        $dados['user_id'] = auth()->user()->id;

        $contato = Contato::create($dados);

        $destinario = auth()->user()->email; //e-mail do usuário logado (autenticado)
        Mail::to($destinario)->send(new NovoContatoMail($contato));
        return redirect('contatos'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = auth()->user()->id;
        $contato = Contato::find($id);
        if($contato->user_id == $user_id) {
            return view('contato.show', ['data' => $contato]);
        }

        return view('acesso-negado');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = auth()->user()->id;
        $contato = Contato::find($id);
        if($contato->user_id == $user_id) {
            return view('contato.edit', ['data' => $contato, 'grupos' => Grupo::all()]);
        }

        return view('acesso-negado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContatoRequest $request, $id)
    {
        $user_id = auth()->user()->id;
        $contato = Contato::find($id);
        if($contato->user_id == $user_id) {
            $contato->update($request->all());
            return view('contato.show', ['data' => $contato]);
        }

        return view('acesso-negado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = auth()->user()->id;
        $contato = Contato::find($id);
        if($contato->user_id == $user_id) {
            $contato->destroy();
            return view('contato.index', ['contatos' => $contatos]);
        }

        return view('acesso-negado');
    }

    /**
     * Search Contatos
     */
    public function search(Request $request)
    {
        $contatos = $this->repository->search($request->filter);
        $contatos = Contato::latest()->paginate();
        return view('contato.index', ['contatos' => $contatos]);
    }

    public function detalhes($id)
    {   
        return view('contato.detalhe');
    }

}
