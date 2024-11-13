@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Task Details') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold">{{ $task->title }}</h3>
                        <p class="text-sm text-gray-500">Created on {{ $task->created_at->format('M d, Y') }}</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="font-semibold text-lg text-gray-700">Description:</h4>
                        <p class="text-gray-800">{{ $task->description }}</p>
                    </div>

                    <div class="mb-4">
                        <h4 class="font-semibold text-lg text-gray-700">Priority:</h4>
                        <p>
                            @if ($task->priority == 1)
                                <span class="text-red-500 font-semibold">High</span>
                            @elseif ($task->priority == 2)
                                <span class="text-yellow-500 font-semibold">Medium</span>
                            @else
                                <span class="text-green-500 font-semibold">Low</span>
                            @endif
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="font-semibold text-lg text-gray-700">Status:</h4>
                        <p>
                            @if ($task->status)
                                <span class="text-green-600 font-semibold">Completed</span>
                            @else
                                <span class="text-red-600 font-semibold">Not Completed</span>
                            @endif
                        </p>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="px-4 py-2 bg-blue-500 text-black rounded-md hover:bg-blue-600">Edit Task</a>
                        <a href="{{ route('tasks.index') }}" class="ml-4 px-4 py-2 bg-gray-500 text-black rounded-md hover:bg-gray-600">Back to Tasks</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
