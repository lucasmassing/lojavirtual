<x-app-layout>
    <x-slot name="header">
        <h3 class="text-center font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Manutenção de Tipos') }}
        </h3>
    </x-slot>
    <br>

    <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-md shadow">
        
        {{-- Exibição de erros de validação --}}
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <x-input-error :messages="$error" class="mt-2" />
                @endforeach
            </ul>
        @endif
        <br>

        {{-- Formulário de criação de tipo --}}
        <form action="{{ url('types/new') }}" method="POST">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Nome do Tipo')" />
                <x-text-input class="w-full" type="text" name="name" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ url('/types') }}">
                    <x-secondary-button>Voltar</x-secondary-button>
                </a>

                <x-primary-button class="ms-4" type="submit">
                    {{ __('Salvar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
