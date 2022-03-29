@extends('site.layouts.basico')

@section('titulo', 'Cadastro')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Visualizar autoridade</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href=" {{ route('autoridade.index') }} ">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div class="cadastro">
                <table border="1" style="text-align: left">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $autoridade->id }}</td>
                    </tr>
                    <tr>
                        <td>Precendência:</td>
                        <td>{{ $autoridade->precedencia }}</td>
                    </tr>
                    <tr>
                        <td>Cargo:</td>
                        <td>{{ $autoridade->cargo }}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $autoridade->nome }}</td>
                    </tr>
                    <tr>
                        <td>Foto:</td>
                        <td>
                            @if ($autoridade->foto)
                            <img src="{{ url("storage/{$autoridade->foto}") }}" alt="{{ $autoridade->nome }}">    
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>  
    </div>
@endsection