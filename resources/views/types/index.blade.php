<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Manutenção de tipos') }}
        </h3>
    </x-slot>

    <div class="py-4 px-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Ações principais --}}
            <div class="flex justify-between items-center">
                <a href="{{ url('/dashboard') }}">
                    <x-secondary-button>Voltar</x-secondary-button>
                </a>

                <a href="{{ url('/types/new') }}">
                    <x-primary-button>Adicionar</x-primary-button>
                </a>
            </div>

            {{-- Mensagem de sucesso --}}
            @if ($message = Session::get('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-white border border-green-600 rounded-lg bg-green-600 dark:bg-green-500 dark:border-green-400">
                <svg class="w-5 h-5 me-2 text-white dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="font-medium">{{ $message }}</span>
            </div>
            @endif

            {{-- Mensagem de erro --}}
            @if ($message = Session::get('error'))
            <div class="p-4 mb-4 text-sm rounded-md bg-red-100 text-red-800 dark:bg-red-900 dark:text-white border border-red-300 dark:border-red-700">
                {{ $message }}
            </div>
            @endif

            {{-- Tabela de tipos --}}
            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="border-b border-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Nome
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($types as $type)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                {{ $type->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100 space-x-2">
                                <a href="{{ url('types/update', ['id' => $type->id]) }}">
                                    <x-primary-button class="bg-indigo-600 hover:bg-indigo-700">Editar</x-primary-button>
                                </a>
                                <form action="{{ url('types/delete', ['id' => $type->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este tipo?')" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button>Excluir</x-danger-button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">
                                Nenhum tipo cadastrado.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>