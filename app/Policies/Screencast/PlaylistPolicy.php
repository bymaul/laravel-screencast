<?php

namespace App\Policies\Screencast;

use App\Models\Screencast\Playlist;
use App\Models\User;

class PlaylistPolicy
{
    public function update(User $user, Playlist $playlist): bool
    {
        return $user->id === $playlist->user_id;
    }
    public function delete(User $user, Playlist $playlist): bool
    {
        return $user->id === $playlist->user_id;
    }
}
