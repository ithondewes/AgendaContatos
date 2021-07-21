@extends('layouts.app')

@section('stylecss')
<style>
.form-control-static {
    font-weight: bold;
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
                        <div class="card-body p-4">
                            <div class="table-responsive border-8">
                                <table class="table table-hover" style="margin-bottom: inherit">
                                    <tbody>
                                        @foreach ($telefones as $telefone)
                                        <tr>
                                           
                                            <td class="d-none d-md-table-cell"><a class='a-line' href="{{ url('telefones/'.$telefone->id) }}">{{ $telefone->telefone }}</a></td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                        <a href="#" onclick="history.back()" class="btn btn-secondary">Voltar</a>
                        <a href="{{ url('telefones/add') }}" class="btn btn-primary">Novo</a>
                        <a href="{{ url('telefones/edit/'.$data->id) }}" class="btn btn-primary">Editar</a>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection