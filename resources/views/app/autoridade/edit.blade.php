@extends('site.layouts.basico')

@section('titulo', 'Autoridade - Edição')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Edite os dados da Autoridade</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href=" # ">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="cadastro">
                @component('app.autoridade._components.form_create_edit', ['autoridade' => $autoridade, 'autoridades' =>$autoridades, 'cargos' => $cargos])
                @endcomponent
            </div>
        </div>  
    </div>
@endsection