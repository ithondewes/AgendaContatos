@extends('layouts.app')

@section('stylecss')
<style>
.form-control-static {
    font-weight: bold;
}
.img-avatar {
    max-width: 100%;
    border: 1px solid #c0c0c0;
    border-radius: 5px;
    margin-bottom: 15px;
}
</style>
@endsection

@section('javascript')
<script type="text/javascript">
function validate_delete() {
    return confirm('Excluir o registro atual? Essa ação não pode ser desfeita.');
}
</script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Contato</div>
                <form action="{{ url('contatos/'.$data->id) }}" method="post" onsubmit="return validate_delete()">
                    <div class="card-body">
                        @method('DELETE')

                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{ $data->avatar_image }}" class="img-avatar">
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="saudacao" class="control-label">Dados de Identificação</label>
                                    <p class="form-control-static">{{ $data->saudacao }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="nome">Nome completo</label>
                                    <p class="form-control-static">{{ $data->nome }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <p class="form-control-static">{{ $data->email }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="data_nascimento">D. Nascimento</label>
                                    <p class="form-control-static">{{ $data->data_nascimento }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="nota">Nota</label>
                                    <p class="form-control-static">{{ $data->nota }}</p>
                                </div>    
                                <div class="form-group">
                                    <label for="grupo_id">Grupo</label>
                                    <p class="form-control-static">{{ $data->grupo_id }}</p>
                                </div>                          
                        </div><!-- /.row -->
                    </div>
                    <div class="card-footer text-right">
                        <a href="#" onclick="history.back()" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                        <a href="{{ url('contatos/edit/'.$data->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ url('contatos/detalhes/'.$data->id) }}" class="btn btn-primary">Detelhes do Contato</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
