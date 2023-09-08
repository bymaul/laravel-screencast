<x-app-layout>
    <x-slot name="title">Edit tag: {{ $tag->name }}</x-slot>
    <x-slot name='header'>Edit tag: {{ $tag->name }}</x-slot>

    <form action="{{ route('tags.edit', $tag->slug) }}" method="post">
        @method('PUT')
        @include('tags._form', [
            'submit' => 'Update',
        ])</form>
</x-app-layout>
