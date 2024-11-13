@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Task') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('tasks.update', $task) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 font-medium">Title</label>
                            <input type="text" name="title" id="title" class="w-full p-2 border border-gray-300 rounded-md" required value="{{ old('title', $task->title) }}">
                            @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-medium">Description</label>
                            <textarea name="description" id="description" rows="4" class="w-full p-2 border border-gray-300 rounded-md">{{ old('description', $task->description) }}</textarea>
                            @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Priority -->
                        <div class="mb-4">
                            <label for="priority" class="block text-gray-700 font-medium">Priority</label>
                            <select name="priority" id="priority" class="w-full p-2 border border-gray-300 rounded-md">
                                <option value="1" {{ old('priority', $task->priority) == 1 ? 'selected' : '' }}>High</option>
                                <option value="2" {{ old('priority', $task->priority) == 2 ? 'selected' : '' }}>Medium</option>
                                <option value="3" {{ old('priority', $task->priority) == 3 ? 'selected' : '' }}>Low</option>
                            </select>
                            @error('priority')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 font-medium">Status</label>
                            <select name="status" id="status" class="w-full p-2 border border-gray-300 rounded-md">
                                <option value="1" {{ old('status', $task->status) == 1 ? 'selected' : '' }}>Completed</option>
                                <option value="0" {{ old('status', $task->status) == 0 ? 'selected' : '' }}>Not Completed</option>
                            </select>
                            @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-black rounded-md hover:bg-blue-600">Update Task</button>
                            <a href="{{ route('tasks.index') }}" class="ml-4 px-4 py-2 bg-gray-500 text-black rounded-md hover:bg-gray-600">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
