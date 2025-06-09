<x-app-layout>
    <x-slot name="header">
        <h3 class="text-center font-semibold text-gray-800 dark:text-gray-200 ">
            {{ __('Manutenção de Fornecedores') }}
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
        <br>

        <form action="{{ url('suppliers/new') }}" method="POST">
            @csrf
            <div>
                <x-input-label for="name_reason" :value="__('Nome / Razão')" />
                <x-text-input class="w-full" type="text" name="name_reason" />
            </div>
            
            <div>
                <x-input-label for="cpf_cnpj" :value="__('CPF / CNPJ')" />
                <x-text-input class="w-full" type="number" name="cpf_cnpj" />
            </div>

            <div>
            <x-input-label for="type_enum" :value="__('Tipo ENUM')" />
            <select name="type_enum" id="type_enum" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:text-white">
                <option value="F">Física</option>
                <option value="J">Jurídica</option>
            </select>
        </div>


            <div>
                <x-input-label for="phone" :value="__('Telefone')" />
                <x-text-input class="w-full" type="text" name="phone" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ url('/suppliers') }}">
                    <x-secondary-button>Voltar</x-secondary-button>
                </a>

                <x-primary-button class="ms-4" type="submit">
                    {{ __('Salvar') }}
                </x-primary-button>
            </div>

        </form>
    </div>
</x-app-layout>