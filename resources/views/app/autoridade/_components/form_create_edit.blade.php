@if (isset($autoridade->id))
    <form method="post" enctype="multipart/form-data" action= "{{ route('autoridade.update', ['autoridade' => $autoridade->id]) }}">
        @csrf
        @method('PUT') 
@elseif (isset($autoridade->representando->sim))
    <form method="post" enctype="multipart/form-data" action= "{{ route('protocolo.store') }}">
@csrf 
@else
    <form method="post" enctype="multipart/form-data" action= "{{ route('autoridade.store') }}">
        @csrf
@endif
    
    <label for="">Protocolo Confirmado?</label>
    <input type="checkbox" name="representando" value="sim" class="borda-preta">
    <br>
    @if($errors->has('representando'))
        {{ $errors->first('representando') }}
    @endif

    <input type="text" name="precedencia" value="{{ $autoridade->precedencia ?? old('precedencia') }}" placeholder="Precedência" class="borda-preta">
    <br>
    @if($errors->has('precedencia'))
        {{ $errors->first('precedencia') }}
    @endif

    <select name="cargo_aut" class="borda-preta">
        <option >-- Selecione um Cargo/Função --</option>

        @foreach ($cargos as $cargo)
        <option value="{{ $cargo->cargo }}" {{ (old('cargo_aut')) == $cargo->cargo ? 'selected' : '' }}>{{ $cargo->cargo }}</option>
        @endforeach

    </select>
    {{ $errors->has('cargo_aut') ? $errors->first('cargo_aut') : '' }}
    <br>
    
    <input type="text" name="nome" value="{{ $autoridade->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
    <br>
    @if($errors->has('nome'))
        {{ $errors->first('nome') }}
    @endif

    <input type="file" name="foto" value="{{ $autoridade->foto ?? old('foto') }}" placeholder="Foto" class="borda-preta">
    <br>
    @if($errors->has('foto'))
        {{ $errors->first('foto') }}
    @endif

    <button type="submit" class="borda-preta">
        @if (isset($autoridade->id))
            ATUALIZAR         
        @else
            CADASTRAR
        @endif
    </button>
    </form>