<div class="w-1/5 bg-gray-800 min-h-screen px-4 py-6">
    <div class="mb-8">
        <header class="font-medium px-2 text-gray-400 uppercase text-xs">
            Main
        </header>
        <a href="{{ route('dashboard') }}" class="block text-gray-200 p-2">Dashboard</a>
    </div>
    @can('create playlists')
        <div class="mb-8">
            <header class="font-medium px-2 text-gray-400 uppercase text-xs">
                Playlists
            </header>
            <a href="{{ route('playlists.create') }}" class="block text-gray-200 p-2">Create</a>
            <a href="{{ route('playlists.table') }}" class="block text-gray-200 p-2">Table</a>
        </div>
    @endcan
    @can('create tags')
        <div class="mb-8">
            <header class="font-medium px-2 text-gray-400 uppercase text-xs">
                Tags
            </header>
            <a href="{{ route('tags.create') }}" class="block text-gray-200 p-2">Create</a>
            <a href="{{ route('tags.table') }}" class="block text-gray-200 p-2">Table</a>
        </div>
    @endcan
    @can('show users')
        <div class="mb-8">
            <header class="font-medium px-2 text-gray-400 uppercase text-xs">
                Users
            </header>
            <a href="#" class="block text-gray-200 p-2">Table</a>
        </div>
    @endcan
    <div class="mb-8">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="route('logout')" class="block text-gray-200 p-2"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                {{ __('Log Out') }}
            </a>
        </form>
    </div>
</div>
