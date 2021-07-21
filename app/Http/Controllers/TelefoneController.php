<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Telefone;
use App\Http\Requests\TelefoneRequest;


class TelefoneController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        return view('telefones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TelefoneRequest $request)
    {

        $telefone = Telefone::create($request->all());
        return redirect('telefones'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $telefone = Telefone::find($id);
        return view('telefones.show', ['data' => $telefone]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $telefone = Telefone::find($id);
        return view('telefones.edit', ['data' => $telefone]);
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
        $telefone = Telefone::find($id);
        $telefone->fill($request->all());
        $telefone->update();
        return redirect('telefones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Telefone::destroy($id);
        return redirect('telefones');
    }

}