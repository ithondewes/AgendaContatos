@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Contato
                </div>
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
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control{{$errors->has('email') ? ' is-invalid':''}}" value="{{ old('email') }}" id="email" name="email" placeholder="email@provedor.com.br">
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento">D. Nascimento</label>
                            <input type="text" class="form-control{{$errors->has('data_nascimento') ? ' is-invalid':''}}" id="data_nascimento" value="{{ old('data_nascimento') }}" name="data_nascimento" placeholder="00/00/0000">
                            <div class="invalid-feedback">{{ $errors->first('data_nascimento') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="grupo_id">Grupo</label>
                            <select class="form-control" name="grupo_id" id="grupo_id">
                                @foreach ($grupos as $grupo)
                                    <option value="{{ $grupo->id }}" }} >
                                        {{ $grupo->grupo }}
                                    </option>
                                @endforeach
                            </select>
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
