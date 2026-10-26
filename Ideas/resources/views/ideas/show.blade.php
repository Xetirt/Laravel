<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $idea->title }}</h2>
    </x-slot>

    <div class="py-12 max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-6 bg-white shadow sm:rounded-lg">
            <p class="text-sm text-gray-500">Creado por {{ $idea->user->name }}</p>
            <p class="mt-4 text-gray-800 text-lg">{{ $idea->description }}</p>

            @if(Auth::id() === $idea->user_id)
                <div class="mt-6 flex gap-4">
                    <a href="{{ route('ideas.edit', $idea) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Editar</a>
                    <form action="{{ route('ideas.destroy', $idea) }}" method="POST" onsubmit="return confirm('¿Seguro?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">Eliminar</button>
                    </form>
                </div>
            @endif
        </div>

        <!-- Sección de comentarios -->
        <div class="p-6 bg-white shadow sm:rounded-lg space-y-4">
            <h3 class="text-lg font-bold">Comentarios</h3>

            <form action="{{ route('comments.store', $idea) }}" method="POST" class="space-y-2">
                @csrf
                <textarea name="content" placeholder="Añade un comentario..." class="w-full border-gray-300 rounded-md" required></textarea>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-semibold">Comentar</button>
            </form>

            <div class="space-y-3 mt-4">
                @foreach($idea->comments as $comment)
                    <div class="p-3 bg-gray-50 rounded border">
                        <p class="text-xs font-bold text-gray-600">{{ $comment->user->name }}</p>
                        <p class="text-sm text-gray-800 mt-1">{{ $comment->content }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>