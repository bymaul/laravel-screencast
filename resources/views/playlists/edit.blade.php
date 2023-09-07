<x-app-layout>
    <x-slot name='title'>Edit Playlist: {{ $playlist->name }}</x-slot>
    <x-slot name='header'>Edit Playlist: {{ $playlist->name }}</x-slot>

    <img src="{{ $playlist->picture }}" alt="{{ $playlist->name }}" class="mb-4 rounded-lg shadow-lg w-64">

    <form action="{{ route('playlists.edit', $playlist->slug) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('playlists._form', ['submit' => 'Update'])
    </form>
</x-app-layout>
