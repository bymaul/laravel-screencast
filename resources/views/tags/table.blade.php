<x-app-layout>
    <x-slot name="title">Your Tags</x-slot>
    <x-slot name='header'>Your Tags</x-slot>

    <x-table class="mb-4">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <x-table.th>#</x-table.th>
                <x-table.th>Name</x-table.th>
                <x-table.th>Playlist</x-table.th>
                @can('delete tags')
                    <x-table.th>Action</x-table.th>
                @endcan
            </tr>
        </thead>
        @foreach ($tags as $tag)
            <tr class="bg-white border-b">
                <x-table.td>{{ $tags->count() * ($tags->currentPage() - 1) + $loop->iteration }}</x-table.td>
                <x-table.td>{{ $tag->name }}</x-table.td>
                <x-table.td>{{ $tag->playlists_count }}</x-table.td>
                @can('delete tags')
                    <x-table.td>
                        <div class="flex items-center gap-x-2">
                            <a href="{{ route('tags.edit', $tag->slug) }}" class="underline uppercase text-blue-500">Edit</a>

                            <div x-data='{deleteModal: false}'>
                                <x-confirm-modal state="deleteModal" x-show="deleteModal" title="Delete the Tag?">
                                    <p>Are you sure you want to delete the tag?</p>
                                    <div class="flex justify-end items-center gap-x-4 mt-8">
                                        <x-secondary-button @click="deleteModal = false">Cancel</x-secondary-button>
                                        <form action="{{ route('tags.destroy', $tag->slug) }}" method="post">
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
                @endcan
            </tr>
        @endforeach
    </x-table>


    {{ $tags->links() }}
</x-app-layout>
