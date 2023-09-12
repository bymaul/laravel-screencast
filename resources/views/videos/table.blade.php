<x-app-layout>
    <x-slot name='title'>
        {{ $playlist->name }}'s Videos
    </x-slot>
    <x-slot name='header'>
        {{ $playlist->name }}'s Videos
    </x-slot>
    <x-table class="mb-4">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <x-table.th width='10px'>#</x-table.th>
                <x-table.th>Title</x-table.th>
                <x-table.th>Action</x-table.th>
            </tr>
        </thead>
        @foreach ($videos as $video)
            <tr class="bg-white border-b">
                <x-table.td>{{ $videos->count() * ($videos->currentPage() - 1) + $loop->iteration }}</x-table.td>
                <x-table.td>{{ $video->title }}</x-table.td>
                <x-table.td>
                    <div class="flex gap-x-2">
                        <a href="{{ route('videos.edit', [$playlist, $video->unique_video_id]) }}"
                            class="underline uppercase">
                            Edit
                        </a>
                        <div x-data='{deleteModal: false}'>
                            <x-confirm-modal state="deleteModal" x-show="deleteModal"
                                title="Delete {!! $video->title !!} video?">
                                <p>Are you sure you want to delete {{ $video->title }} video?</p>
                                <div class="flex justify-end items-center gap-x-4 mt-8">
                                    <x-secondary-button @click="deleteModal = false">Cancel</x-secondary-button>
                                    <form action="{{ route('videos.destroy', [$playlist, $video->unique_video_id]) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <x-danger-button type="submit">Delete</x-danger-button>
                                    </form>
                                </div>
                            </x-confirm-modal>
                            <button @click="deleteModal = true" class="underline uppercase">Delete</button>
                        </div>
                    </div>
                </x-table.td>
            </tr>
        @endforeach
    </x-table>


    {{ $videos->links() }}
</x-app-layout>
