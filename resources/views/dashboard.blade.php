<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard de Produtos') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Filtro por tipo --}}
            <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
                <select name="type_id" onchange="this.form.submit()" class="rounded-md border-gray-300 dark:bg-gray-800 dark:text-white">
                    <option value="">Todos os Tipos</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $selectedType == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </form>

            {{-- Lista de produtos --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($products as $product)
                    <div class="bg-white dark:bg-gray-800 rounded shadow p-4">
                        <img src="{{ asset('storage/images/' . $product->image_path) }}" alt="Imagem do produto" width="150">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $product->name }}</h3>
                        <p class="text-gray-700 dark:text-gray-300">{{ $product->description }}</p>
                        <span class="text-sm text-gray-600 dark:text-gray-400">Tipo: {{ $product->type->name ?? 'N/A' }}</span>
                    </div>
                @empty
                    <p class="text-gray-600 dark:text-gray-300">Nenhum produto encontrado.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
