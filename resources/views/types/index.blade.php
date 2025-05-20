<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tipos</title>
</head>
<body>
    <a href="{{ url('/types/new') }}">Adicionar</a>
    <a href="{{ url('/') }}">Voltar</a>
    <h3>Lista de tipos</h3>
    <ul>
        @foreach ( $types as $type )
            <li>
                {{ $type['name'] }} <a href="{{ url('types/update', ['id' => $type->id]) }}">Editar</a>
                <a href="{{ url('types/delete', ['id' => $type->id]) }}">Excluir</a> 
            </li>
        @endforeach            
    </ul>
</body>
</html>