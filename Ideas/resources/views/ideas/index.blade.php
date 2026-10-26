<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Lista de Ideas</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Formulario nueva idea -->
        <div class="p-6 bg-white shadow sm:rounded-lg">
            <h3 class="text-lg font-bold mb-4">Publicar una nueva idea</h3>
            <form action="{{ route('ideas.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <input type="text" name="title" placeholder="Título de la idea" class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <textarea name="description" placeholder="Describe tu idea..." class="w-full border-gray-300 rounded-md shadow-sm" rows="3" required></textarea>
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md font-semibold">Guardar Idea</button>
            </form>
        </div>

        <!-- Lista de ideas -->
        <div class="space-y-4">
            @foreach($ideas as $idea)
                <div class="p-6 bg-white shadow sm:rounded-lg flex justify-between items-center">
                    <div>
                        <a href="{{ route('ideas.show', $idea) }}" class="text-xl font-bold text-blue-600 hover:underline">
                            {{ $idea->title }}
                        </a>
                        <p class="text-sm text-gray-500">Por {{ $idea->user->name }} • {{ $idea->created_at->diffForHumans() }}</p>
                        <p class="mt-2 text-gray-700">{{ $idea->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>