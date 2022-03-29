@extends('site.layouts.basico')

@section('titulo', 'Autoridades')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Autoridades</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('autoridade.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="cadastro">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Precendência</th>
                            <th>Cargo</th>
                            <th>Nome</th>
                            <th>Foto</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($autoridades as $autoridade)
                            <tr>
                                <td>{{ $autoridade->precedencia }}</td>
                                <td>{{ $autoridade->cargo_aut }}</td>
                                <td>{{ $autoridade->nome }}</td>
                                <td>
                                    @if ($autoridade->foto)
                                        <img src="{{ url("storage/{$autoridade->foto}") }}" alt="{{ $autoridade->nome }}">    
                                    @endif
                                </td>
                                <td><a href="{{ route('autoridade.show', ['autoridade' => $autoridade->id ])}}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{ $autoridade->id }}" method="post" action="{{ route('autoridade.destroy', ['autoridade' => $autoridade->id ])}}">
                                        @method('DELETE')
                                        @csrf
                                        <!--<button type="submit">Excluir</button>-->
                                        <a href="#" onclick="document.getElementById('form_{{ $autoridade->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('autoridade.edit', ['autoridade' => $autoridade->id ])}}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{ $autoridades->appends($request)->links() }}
                <p>Exibindo {{ $autoridades->count() }} autoridades de {{ $autoridades->total() }} pesquisadas.</p>
            </div>
        </div>  
    </div>
@endsection