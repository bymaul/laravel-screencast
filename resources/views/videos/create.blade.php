<x-app-layout>
    <x-slot name='title'>Add video: {{ $playlist->name }}</x-slot>
    <x-slot name='header'>Add video: {{ $playlist->name }}</x-slot>

    <form action="{{ route('videos.create', $playlist->slug) }}" method="post">
        @include('videos._form', [
            'submit' => 'Create',
        ])
    </form>
</x-app-layout>
