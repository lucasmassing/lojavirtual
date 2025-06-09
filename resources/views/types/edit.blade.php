<x-app-layout>
    <x-slot name="header">
        <h3 class="text-center font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Editar Tipo') }}
        </h3>
    </x-slot>
    <br>

    <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-md shadow">

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <x-input-error :messages="$error" class="mt-2" />
                @endforeach
            </ul>
        @endif

        <form action="{{ url('types/update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $type['id'] }}">

            <div class="mt-4">
                <x-input-label for="name" :value="__('Nome')" />
                <x-text-input class="w-full" type="text" name="name" :value="$type['name']" />
            </div>

            <div class="flex items-center justify-end mt-6">
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
