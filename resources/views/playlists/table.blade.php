<x-app-layout>
    <x-slot name='title'>
        Your Playlist
    </x-slot>
    <x-slot name='header'>
        Your Playlist
    </x-slot>
    <x-table class="mb-4">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <x-table.th>#</x-table.th>
                <x-table.th>Name</x-table.th>
                <x-table.th>Tags</x-table.th>
                <x-table.th>Published</x-table.th>
                <x-table.th>Action</x-table.th>
            </tr>
        </thead>
        @foreach ($playlists as $playlist)
            <tr class="bg-white border-b">
                <x-table.td>{{ $playlists->count() * ($playlists->currentPage() - 1) + $loop->iteration }}</x-table.td>
                <x-table.td>{{ $playlist->name }}</x-table.td>
                <x-table.td>
                    <div class="flex items-center gap-x-2">
                        @foreach ($playlist->tags as $tag)
                            <span class="px-2 py-1 text-xs text-white bg-blue-500 rounded-md">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </x-table.td>
                <x-table.td>{{ $playlist->created_at->format('d F, Y') }}</x-table.td>
                <x-table.td>
                    <div class="flex items-center gap-x-2">
                        <a href="{{ route('playlists.edit', $playlist->slug) }}"
                            class="underline uppercase text-blue-500">Edit</a>
                        <div x-data='{deleteModal: false}'>
                            <x-confirm-modal state="deleteModal" x-show="deleteModal" title="Delete the Playlist?">
                                <p>Are you sure you want to delete the playlist?</p>
                                <div class="flex justify-end items-center gap-x-4 mt-8">
                                    <x-secondary-button @click="deleteModal = false">Cancel</x-secondary-button>
                                    <form action="{{ route('playlists.destroy', $playlist->slug) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <x-danger-button type="submit">Delete</x-danger-button>
                                    </form>
                                </div>
                            </x-confirm-modal>
                            <button @click="deleteModal = true" class="underline uppercase text-red-500">Delete</button>
                        </div>
                    </div>
                </x-table.td>
            </tr>
        @endforeach
    </x-table>


    {{ $playlists->links() }}
</x-app-layout>
