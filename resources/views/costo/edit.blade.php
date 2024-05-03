<form method="POST" action="{{ route('costos.update', $costo->id) }}">
    @csrf
    @method('PUT')
    <label for="categoria">Categoría:</label>
    <select name="categoria" id="categoria">
        @foreach($categorias as $categoria)
            <option value="{{ $categoria['value'] }}" {{ $costo->categoria == $categoria['value'] ? 'selected' : '' }}>{{ $categoria['value'] }}</option>
        @endforeach
    </select>
    <br>
    <label for="costo">Costo:</label>
    <input type="text" name="costo" id="costo" value="{{ $costo->costo }}">
    <br>
    <button type="submit">Guardar cambios</button>
</form>
