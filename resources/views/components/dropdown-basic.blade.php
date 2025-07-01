@props(['itens' => []])


<select class="select w-full">
    <option disabled selected>Selecione uma Lista de clientes</option>

    @foreach ($itens as $item)
        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
    @endforeach
</select>
