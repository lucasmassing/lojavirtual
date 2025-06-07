<x-app-layout>
    <form action="{{ url('types/new') }}" method="POST">
        @csrf
        <label>Nome:</label><br>
        <input name="name" type="text" /><br>
        <input type="submit" value="Salvar" />
    </form>
</x-app-layout>