@extends('site.layouts.basico')

@section('titulo', 'Visualizar')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Visualizar Cargo</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href=" {{ route('cargo.index') }} ">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div class="cadastro">
                <table border="1" style="text-align: left">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $cargo->id }}</td>
                    </tr>
                    <tr>
                        <td>Precendência:</td>
                        <td>{{ $cargo->precedencia }}</td>
                    </tr>
                    <tr>
                        <td>Cargo:</td>
                        <td>{{ $cargo->cargo }}</td>
                    </tr>
                </table>
            </div>
        </div>  
    </div>
@endsection