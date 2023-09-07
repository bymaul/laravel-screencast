<x-app-layout>
    <x-slot name="title">Create new Tags</x-slot>
    <x-slot name='header'>Create new Tags</x-slot>

    <form action="{{ route('tags.create') }}" method="post">
        @include('tags._form', [
            'submit' => 'Create',
        ])</form>
</x-app-layout>
