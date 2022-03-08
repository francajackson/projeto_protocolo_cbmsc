@extends('site.layouts.basico')

@section('titulo','Cargos')

@section('conteudo')
    <div class="topo">

        <div class="logo">
            <a href="{{ route('site.index') }}"><img src="{{ asset('img/logo.png') }}"></a>
            <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('site.index') }}">Home</a></li>
                <li><a href="{{ route('app.autoridades') }}">Autoridades</a></li>
                <li><a href="{{ route('app.cargos') }}">Cargos</a></li>
            </ul>
        </div>
    </div>

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                <form>
                    <input type="text" placeholder="Nome" class="borda-preta">
                    <br>
                    <input type="text" placeholder="Telefone" class="borda-preta">
                    <br>
                    <input type="text" placeholder="E-mail" class="borda-preta">
                    <br>
                    <select class="borda-preta">
                        <option value="">Qual o motivo do contato?</option>
                        <option value="">Dúvida</option>
                        <option value="">Elogio</option>
                        <option value="">Reclamação</option>
                    </select>
                    <br>
                    <textarea class="borda-preta">Preencha aqui a sua mensagem</textarea>
                    <br>
                    <button type="submit" class="borda-preta">ENVIAR</button>
                </form>
            </div>
        </div>  
    </div>
@endsection