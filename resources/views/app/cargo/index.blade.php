@extends('site.layouts.basico')

@section('titulo', 'Cargos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Lista de cargos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href=" {{ route('cargo.create') }} ">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="cadastro">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Precedência</th>
                            <th>Cargo</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cargos as $cargo)
                            <tr>
                                <td>{{ $cargo->precedencia }}</td>
                                <td>{{ $cargo->cargo }}</td>
                                <td><a href="{{ route('cargo.show', ['cargo' => $cargo->id]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{$cargo->id}}" method="post" action=" {{ route('cargo.destroy', ['cargo' => $cargo->id]) }} ">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$cargo->id}}').submit()">Excluir</a>
                                    </form>
                                <td><a href="{{ route('cargo.edit', ['cargo' => $cargo->id]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{ $cargos->appends($request)->links() }}
                <p>Exibindo {{ $cargos->count() }} cargos de {{ $cargos->total() }} cadastrados.</p>
            </div>
        </div>  
    </div>
@endsection