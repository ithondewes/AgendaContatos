<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;
use App\Http\Requests\ContatoRequest;
use App\Endereco;
use App\Http\Requests\EnderecoRequest;


class EnderecoController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        return view('enderecos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnderecoRequest $request)
    {

        $endereco = Endereco::create($request->all());
        return redirect('enderecos'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $endereco = Endereco::find($id);
        return view('enderecos.show', ['data' => $endereco]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $endereco = Endereco::find($id);
        return view('enderecos.edit', ['data' => $endereco]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EnderecoRequest $request, $id)
    {
        $endereco = Endereco::find($id);
        $endereco->fill($request->all());
        $endereco->update();
        return redirect('enderecos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Endereco::destroy($id);
        return redirect('enderecos');
    }

}