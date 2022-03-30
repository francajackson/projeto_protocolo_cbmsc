@if (isset($autoridade->id))
    <form method="post" enctype="multipart/form-data" action= "{{ route('protocolo.update', ['autoridade' => $autoridade->id]) }}">
        @csrf
        @method('PUT')
    
@else
    <form method="post" enctype="multipart/form-data" action= "{{ route('protocolo.store') }}">
        @csrf
@endif

    <label for="">Protocolo Confirmado?</label>
    <input type="checkbox" name="protocolo" value="s" class="borda-preta">
    <br>
    @if($errors->has('protocolo'))
        {{ $errors->first('protocolo') }}
    @endif

    <input type="text" name="precedencia" value="{{ $autoridade->precedencia ?? old('precedencia') }}" placeholder="Precedência" class="borda-preta">
    <br>
    @if($errors->has('precedencia'))
        {{ $errors->first('precedencia') }}
    @endif

    <select name="cargo" class="borda-preta">
        <option >-- Selecione um Cargo/Função --</option>

        @foreach ($cargos as $cargo)
        <option value="{{ $cargo->cargo }}" {{ ($cargo->cargo ?? old('cargo')) == $cargo->cargo ? 'selected' : '' }}>{{ $cargo->cargo }}</option>
        @endforeach

    </select>
    {{ $errors->has('cargo') ? $errors->first('cargo') : '' }}
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

    <label for="">Representando?</label>
    <input type="checkbox" name="representando" value="s" class="borda-preta">
    <br>
    @if($errors->has('representando'))
        {{ $errors->first('representando') }}
    @endif

    <input type="text" name="precedencia_principal" value="{{ $autoridade->precedencia ?? old('precedencia_principal') }}" placeholder="Precedência" class="borda-preta">
    <br>
    @if($errors->has('precedencia_principal'))
        {{ $errors->first('precedencia_principal') }}
    @endif

    <select name="cargo_principal" class="borda-preta">
        <option >-- Selecione um Cargo/Função --</option>

        @foreach ($autoridades as $autoridade)
        <option value="{{ $autoridade->cargo }}" {{ ($autoridade->cargo ?? old('cargo')) == $autoridade->cargo ? 'selected' : '' }}>{{ $autoridade->cargo }}</option>
        @endforeach

    </select>
    {{ $errors->has('cargo_principal') ? $errors->first('cargo_principal') : '' }}
    <br>
    
    <input type="text" name="nome_principal" value="{{ $autoridade->nome_principal ?? old('nome_principal') }}" placeholder="Nome Autoridade Representada" class="borda-preta">
    <br>
    @if($errors->has('nome_principal'))
        {{ $errors->first('nome_principal') }}
    @endif

    <button type="submit" class="borda-preta">
        @if (isset($autoridade->id))
            ATUALIZAR         
        @else
            CADASTRAR
        @endif
    </button>
    </form>