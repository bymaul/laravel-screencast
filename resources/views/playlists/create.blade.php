<x-app-layout>
    <x-slot name='title'>Create new Playlist</x-slot>
    <x-slot name='header'>Create new Playlist</x-slot>
    <form action="{{ route('playlists.create') }}" method="POST" enctype="multipart/form-data">
        @include('playlists._form', ['submit' => 'Create'])
    </form>
</x-app-layout>
