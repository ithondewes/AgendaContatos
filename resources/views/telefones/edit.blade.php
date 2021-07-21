@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Detalhes do Contato</div>
                <form action="{{ url('telefones') }}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        @method('PUT')

                        @csrf

                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" required class="form-control{{$errors->has('telefone') ? ' is-invalid':''}}" value="{{ old('telefone') }}" id="telefone" name="telefone">
                            <div class="invalid-feedback">{{ $errors->first('telefone') }}</div>
                        </div>
                        <div class="card-footer text-right">
                        <a href="#" onclick="history.back()" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>