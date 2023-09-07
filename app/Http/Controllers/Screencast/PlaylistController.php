<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaylistRequest;
use App\Models\Screencast\Playlist;
use App\Models\Screencast\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
    public function create()
    {
        return view(
            'playlists.create',
            [
                'playlist' => new Playlist(),
                'tags' => Tag::get(),
            ]
        );
    }

    public function store(PlaylistRequest $request)
    {
        $playlist = Auth::user()->playlists()->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name . '-' . Str::random(5)),
            'description' => $request->description,
            'price' => $request->price,
            'thumbnail' => $request->file('thumbnail')->store('images/playlists'),
        ]);

        $playlist->tags()->sync(request('tags'));

        return back();
    }

    public function table()
    {
        $playlists = Auth::user()->playlists()->latest()->paginate(10);

        return view('playlists.table', compact('playlists'));
    }

    public function edit(Playlist $playlist)
    {
        $this->authorize('update', $playlist);

        return view('playlists.edit', [
            'playlist' => $playlist,
            'tags' => Tag::get(),
        ]);
    }

    public function update(PlaylistRequest $request, Playlist $playlist)
    {
        if ($request->thumbnail) {
            Storage::delete($playlist->thumbnail);
            $thumbnail = $request->file('thumbnail')->store('images/playlists');
        } else {
            $thumbnail = $playlist->thumbnail;
        }

        $playlist->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'thumbnail' => $thumbnail,
        ]);

        $playlist->tags()->sync(request('tags'));

        return to_route('playlists.table');
    }

    public function destroy(Playlist $playlist)
    {
        $this->authorize('delete', $playlist);

        Storage::delete($playlist->thumbnail);
        $playlist->tags()->detach();
        $playlist->delete();

        return to_route('playlists.table');
    }
}
