<?php

namespace App\Http\Controllers\Screencast;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Screencast\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function table()
    {
        $tags = Tag::withCount('playlists')->latest()->paginate(10);

        return view('tags.table', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create', [
            'tag' => new Tag(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return to_route('tags.table');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->playlists()->detach();
        $tag->delete();

        return to_route('tags.table');
    }
}
