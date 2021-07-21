@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Detalhes do Contato</div>
                <form action="{{ url('enderecos') }}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        @method('PUT')

                        @csrf
                        
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" required class="form-control{{$errors->has('endereco') ? ' is-invalid':''}}" value="{{ old('endereco') }}" id="endereco" name="endereco"/>
                            <div class="invalid-feedback">{{ $errors->first('endereco') }}</div>
                                <form method="get" action=".">
                                    <label for="cep">Cep</label>
                                    <input type="text" required class="form-control{{$errors->has('cep') ? ' is-invalid':''}}" value="{{ old('cep') }}" id="cep" name="cep" size="10" maxlength="9"
                                        onblur="pesquisacep(this.value);" />
                                    <div class="invalid-feedback">{{ $errors->first('cep') }}</div>    
                                    <label for="rua">Rua</label>
                                    <input type="text" required class="form-control{{$errors->has('rua') ? ' is-invalid':''}}" value="{{ old('rua') }}" id="rua" name="rua">
                                    <div class="invalid-feedback">{{ $errors->first('rua') }}</div>
                                    <label for="numero">Número</label>
                                    <input type="text" required class="form-control{{$errors->has('numero') ? ' is-invalid':''}}" value="{{ old('numero') }}" id="numero" name="numero">
                                    <div class="invalid-feedback">{{ $errors->first('numero') }}</div>
                                    <label for="complemento">Complemento</label>
                                    <input type="text" required class="form-control{{$errors->has('complemento') ? ' is-invalid':''}}" value="{{ old('complemento') }}" id="complemento" name="complemento">
                                    <div class="invalid-feedback">{{ $errors->first('complemento') }}</div>
                                    <label for="bairro">Bairro</label>
                                    <input type="text" required class="form-control{{$errors->has('bairro') ? ' is-invalid':''}}" value="{{ old('bairro') }}" id="bairro" name="bairro">
                                    <div class="invalid-feedback">{{ $errors->first('bairro') }}</div>
                                    <label for="cidade">Cidade</label>
                                    <input type="text" required class="form-control{{$errors->has('cidade') ? ' is-invalid':''}}" value="{{ old('cidade') }}" id="cidade" name="cidade">
                                    <div class="invalid-feedback">{{ $errors->first('cidade') }}</div>
                                    <label for="estado">Estado</label>
                                    <input type="text" required class="form-control{{$errors->has('uf') ? ' is-invalid':''}}" value="{{ old('uf') }}" id="uf" name="uf">
                                    <div class="invalid-feedback">{{ $errors->first('uf') }}</div>
                                </form>
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