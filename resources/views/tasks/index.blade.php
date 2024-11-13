@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Detyrat e Mia</h1>
        <a href="{{ route('tasks.create') }}" class="px-6 py-3 bg-blue-600 text-black rounded-lg shadow-md hover:bg-blue-700 transition duration-300">Krijo Detyre</a>
    </div>

    <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach($tasks as $task)
            <div class="bg-white rounded-lg shadow-lg p-4 flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $task->title }}</h2>
                </div>

                <div class="inline-flex space-x-2">
                    <a href="{{ route('tasks.show', $task) }}" class="px-4 py-2 bg-green-500 text-black rounded-md hover:bg-green-600 transition duration-300">View</a>

                    <a href="{{ route('tasks.edit', $task) }}" class="px-4 py-2 bg-yellow-500 text-black rounded-md hover:bg-yellow-600 transition duration-300">Edit</a>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-black rounded-md hover:bg-red-600 transition duration-300" onclick="return confirm('A jeni i sigurt që dëshironi ta fshini këtë detyrë?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}", '', {
                positionClass: 'toast-top-right'
            });
        </script>
    @endif
@endsection
