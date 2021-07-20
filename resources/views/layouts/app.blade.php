<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Importando Script Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    @yield('stylecss')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contatos') }}">Contatos <span class="sr-only">(current)</span></a>
                        </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <script>

			$(function () {
			    var scntDiv = $('#dynamicDiv');

			    $(document).on('click', '#addInput', function () {
			        $('<p>'+
		        		'<input type="text" required class="form-control{{$errors->has('telefone') ? ' is-invalid':''}}" value="{{ old('telefone') }}" id="telefone" name="telefone"/>'+
		        		'<a class="btn btn-danger" href="javascript:void(0)" id="remInput">'+
							'<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> '+
							'Remover Campo'+
		        		'</a>'+
					'</p>').appendTo(scntDiv);
			        return false;
			    });

			    $(document).on('click', '#remInput', function () {
		            $(this).parents('p').remove();
			        return false;
			    });
			});
		
        </script>

        <script>

        $(function () {
            var scntDiv2 = $('#dynamicDiv2');

            $(document).on('click', '#addInput2', function () {
                $( '<p>'+
                            '<input type="text" required class="form-control{{$errors->has('endereco') ? ' is-invalid':''}}" value="" id="endereco" name="endereco"/>'+
                            '<form method="get" action=".">'+
                                '<label for="cep">Cep</label>'+
                                '<input type="text" required class="form-control{{$errors->has('cep') ? ' is-invalid':''}}" value="" id="cep" name="cep" size="10" maxlength="9"'+
                                    'onblur="pesquisacep(this.value);" />'+
                                '<div class="invalid-feedback">{{ $errors->first('cep') }}</div>' +  
                                '<label for="rua">Rua</label>'+
                                '<input type="text" required class="form-control{{$errors->has('rua') ? ' is-invalid':''}}" value="" id="rua" name="rua">'+
                                '<div class="invalid-feedback">{{ $errors->first('rua') }}</div>'+
                                '<label for="numero">Número</label>'+
                                '<input type="text" required class="form-control{{$errors->has('numero') ? ' is-invalid':''}}" value="" id="numero" name="numero">'+
                                '<div class="invalid-feedback">{{ $errors->first('numero') }}</div>'+
                                '<label for="complemento">Complemento</label>'+
                                '<input type="text" required class="form-control{{$errors->has('complemento') ? ' is-invalid':''}}" value="" id="complemento" name="complemento">'+
                                '<div class="invalid-feedback">{{ $errors->first('complemento') }}</div>'+
                                '<label for="bairro">Bairro</label>'+
                                '<input type="text" required class="form-control{{$errors->has('bairro') ? ' is-invalid':''}}" value="" id="bairro" name="bairro">'+
                                '<div class="invalid-feedback">{{ $errors->first('bairro') }}</div>'+
                                '<label for="cidade">Cidade</label>'+
                                '<input type="text" required class="form-control{{$errors->has('cidade') ? ' is-invalid':''}}" value="" id="cidade" name="cidade">'+
                                '<div class="invalid-feedback">{{ $errors->first('cidade') }}</div>'+
                                '<label for="estado">Estado</label>'+
                                '<input type="text" required class="form-control{{$errors->has('uf') ? ' is-invalid':''}}" value="" id="uf" name="uf">'+
                                '<div class="invalid-feedback">{{ $errors->first('uf') }}</div>'+
                        '</form>'+
                        '<a class="btn btn-danger" href="javascript:void(0)" id="remInput2">'+
                                '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>'+
                                'Remover Campo'+
                            '</a>'+
		                        '</p>').appendTo(scntDiv2);
                return false;
            });

            $(document).on('click', '#remInput2', function () {
                $(this).parents('p').remove();
                return false;
            });
        });

        </script>

        

       <!-- Adicionando Javascript - ViaCep -->
       <script>
    
            function limpa_formulário_cep() {
                    //Limpa valores do formulário de cep.
                    document.getElementById('rua').value=("");
                    document.getElementById('bairro').value=("");
                    document.getElementById('cidade').value=("");
                    document.getElementById('uf').value=("");
            }

            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('rua').value=(conteudo.logradouro);
                    document.getElementById('bairro').value=(conteudo.bairro);
                    document.getElementById('cidade').value=(conteudo.localidade);
                    document.getElementById('uf').value=(conteudo.uf);
                } //end if.
                else {
                    //CEP não Encontrado.
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            }
                
            function pesquisacep(valor) {

                //Nova variável "cep" somente com dígitos.
                var cep = valor.replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        document.getElementById('rua').value="...";
                        document.getElementById('bairro').value="...";
                        document.getElementById('cidade').value="...";
                        document.getElementById('uf').value="...";

                        //Cria um elemento javascript.
                        var script = document.createElement('script');

                        //Sincroniza com o callback.
                        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                        //Insere script no documento e carrega o conteúdo.
                        document.body.appendChild(script);

                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            };

    </script>

    @yield('javascript')
</body>
</html>
