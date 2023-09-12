<x-app-layout>
    <x-slot name='title'>Edit {{ $playlist->name }}'s Video: {{ $video->title }}</x-slot>
    <x-slot name='header'>Edit {{ $playlist->name }}'s Video: {{ $video->title }}</x-slot>

    <form action="{{ route('videos.edit', [$playlist, $video->unique_video_id]) }}" method="POST">
        @method('PUT')
        @include('videos._form', ['submit' => 'Update'])
    </form>
</x-app-layout>
