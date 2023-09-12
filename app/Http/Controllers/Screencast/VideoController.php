<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Screencast\Playlist;
use App\Models\Screencast\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    public function table(Playlist $playlist)
    {
        $this->authorize('update', $playlist);

        $videos = $playlist->videos()->orderBy('episode')->paginate(10);

        return view('videos.table', compact('playlist', 'videos'));
    }

    public function create(Playlist $playlist)
    {
        $this->authorize('update', $playlist);

        return view('videos.create', [
            'playlist' => $playlist,
            'video' => new Video(),
        ]);
    }

    public function store(Playlist $playlist, VideoRequest $request)
    {
        $this->authorize('update', $playlist);

        $attr = $request->validated();

        $attr['slug'] = Str::slug($attr['title']);
        $attr['intro'] = $request->has('intro');
        $playlist->videos()->create($attr);

        return back();
    }

    public function edit(Playlist $playlist, Video $video)
    {
        $this->authorize('update', $playlist);

        return view('videos.edit', compact('playlist', 'video'));
    }

    public function update(Playlist $playlist, Video $video, VideoRequest $request)
    {
        $this->authorize('update', $playlist);

        $attr = $request->validated();

        $attr['slug'] = Str::slug($attr['title']);
        $attr['intro'] = $request->has('intro');
        $video->update($attr);

        return to_route('videos.table', $playlist);
    }

    public function delete(Playlist $playlist, Video $video)
    {
        $this->authorize('update', $playlist);

        $video->delete();

        return to_route('videos.table', $playlist);
    }
}
