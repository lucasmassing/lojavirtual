<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
    <a href="{{ url('/products/new') }}">Adicionar</a>
    <a href="{{ url('/') }}">Voltar</a>
    <h3>Lista de produtos</h3>
    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif

    <form action="{{ url('/products') }}" method="get">
        <input placeholder="Pesquisar pelo nome" name="search" type="text" value="{{ request('search') }}"/>
        <button type="submit">Pesquisar</button>
    </form>

    <ul>
        @foreach ( $products as $product )
            <li>
                {{ $product['name']}} / {{$product->type->name }} <a href="{{ url('products/update', ['id' => $product->id]) }}">Editar</a>
                <a href="{{ url('products/delete', ['id' => $product->id]) }}">Excluir</a> 
            </li>
        @endforeach            
    </ul>
</body>
</html>
