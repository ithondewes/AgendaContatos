<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;
use App\Http\Requests\ContatoRequest;
use App\Telefone;
use App\Http\Requests\TelefoneRequest;



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
        $contatos = Contato::latest()->paginate();
        return view('contato.index', ['contatos' => $contatos,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContatoRequest $request)
    {

        $contato = Contato::create($request->all());
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
        $contato = Contato::find($id);
        $contatoEnderecos = $contato->enderecos();
        $contatoTelefone = $contato->telefones();
        return view('contato.show', ['data' => $contato, 'telefones' => $contatoTelefone, 'enderecos' => $contatoEnderecos ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contato = Contato::find($id);
        return view('contato.edit', ['data' => $contato]);
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
        $contato = Contato::find($id);
        $contato->fill($request->all());
        $contato->update();
        return redirect('contatos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contato::destroy($id);
        return redirect('contatos');
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
}
