@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Contato</div>
                <form action="{{ url('contatos/'.$data->id) }}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        @method('PUT')

                        @csrf

                        <div class="form-group">
                            <label for="saudacao">Dados de Identificação</label>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome completo</label>
                            <input type="text" required class="form-control{{$errors->has('nome') ? ' is-invalid':''}}" value="{{ old('nome') }}" id="nome" name="nome">
                            <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="nome">Telefone(s)</label><br />
                            <a class="btn btn-primary" href="javascript:void(0)" id="addInput">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            Adicionar Campo
                            </a>
                            <br/>
                        <div id="dynamicDiv">
                                <p>
                                <input type="text" required class="form-control{{$errors->has('telefone') ? ' is-invalid':''}}" value="{{ old('telefone') }}" id="telefone" name="telefone"/>
                            <a class="btn btn-danger" href="javascript:void(0)" id="remInput">
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                Remover Campo
                            </a>
		                        </p>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control{{$errors->has('email') ? ' is-invalid':''}}" value="{{ old('email') }}" id="email" name="email" placeholder="email@provedor.com.br">
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento">D. Nascimento</label>
                            <input type="text" class="form-control{{$errors->has('data_nascimento') ? ' is-invalid':''}}" id="data_nascimento" value="{{ old('data_nascimento') }}" name="data_nascimento" placeholder="00/00/0000">
                            <div class="invalid-feedback">{{ $errors->first('data_nascimento') }}</div>
                        </div>
                        <div class="group">
                            <label for="nome">Endereco(s)</label><br />
                            <a class="btn btn-primary" href="javascript:void(0)" id="addInput2">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            Adicionar Campo
                            </a>
                            <br/>
                        <div id="dynamicDiv2">
                                <p>
                            <input type="text" required class="form-control{{$errors->has('endereco') ? ' is-invalid':''}}" value="" id="endereco" name="endereco"/>
                            <form method="get" action=".">
                                <label for="cep">Cep</label>
                                <input type="text" required class="form-control{{$errors->has('cep') ? ' is-invalid':''}}" value="" id="cep" name="cep" size="10" maxlength="9"
                                    onblur="pesquisacep(this.value);" />
                                <div class="invalid-feedback">{{ $errors->first('cep') }}</div>    
                                <label for="rua">Rua</label>
                                <input type="text" required class="form-control{{$errors->has('rua') ? ' is-invalid':''}}" value="" id="rua" name="rua">
                                <div class="invalid-feedback">{{ $errors->first('rua') }}</div>
                                <label for="numero">Número</label>
                                <input type="text" required class="form-control{{$errors->has('numero') ? ' is-invalid':''}}" value="" id="numero" name="numero">
                                <div class="invalid-feedback">{{ $errors->first('numero') }}</div>
                                <label for="complemento">Complemento</label>
                                <input type="text" required class="form-control{{$errors->has('complemento') ? ' is-invalid':''}}" value="" id="complemento" name="complemento">
                                <div class="invalid-feedback">{{ $errors->first('complemento') }}</div>
                                <label for="bairro">Bairro</label>
                                <input type="text" required class="form-control{{$errors->has('bairro') ? ' is-invalid':''}}" value="" id="bairro" name="bairro">
                                <div class="invalid-feedback">{{ $errors->first('bairro') }}</div>
                                <label for="cidade">Cidade</label>
                                <input type="text" required class="form-control{{$errors->has('cidade') ? ' is-invalid':''}}" value="" id="cidade" name="cidade">
                                <div class="invalid-feedback">{{ $errors->first('cidade') }}</div>
                                <label for="estado">Estado</label>
                                <input type="text" required class="form-control{{$errors->has('uf') ? ' is-invalid':''}}" value="" id="uf" name="uf">
                                <div class="invalid-feedback">{{ $errors->first('uf') }}</div>
                        </form>
                        <a class="btn btn-danger" href="javascript:void(0)" id="remInput2">
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                Remover Campo
                            </a>
		                        </p>
                        </div>
                        <div class="form-group">
                            <label for="avatar">Imagem</label>
                            <input type="file" class="form-control-file{{$errors->has('avatar') ? ' is-invalid':''}}" id="avatar" name="avatar" accept=".jpg, .jpeg, .png .gif">
                            <div class="invalid-feedback" style="display:inherit">{{ $errors->first('avatar') }}</div>
                            <!-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/file -->
                        </div>
                        <div class="form-group">
                            <label for="nota">Nota</label>
                            <textarea class="form-control" id="nota" name="nota" rows="5">{{ old('nota') }}</textarea>
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

@endsection
