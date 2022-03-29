@extends('site.layouts.basico')

@section('titulo', 'Cargo - Edição')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Edite aqui o cargo</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href=" {{ route('cargo.index') }} ">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="cadastro">
                @component('app.cargo._components.form_create_edit', ['cargo' => $cargo])
                @endcomponent
            </div>
        </div>  
    </div>
@endsection