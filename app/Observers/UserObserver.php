<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\File;

class UserObserver
{
    /**
     * Handle the User "updating" event.
     *
     * @param  \App\Models\User $user
     * @return void
     */
    public function updating(User $user)
    {
        $oldPicture = (string)$user->getOriginal('picture', '');
        if ($oldPicture && $user->picture != $oldPicture) {
            File::delete(storage_path("/app/public/{$oldPicture}"));
        }
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User $user
     * @return void
     */
    public function deleted(User $user)
    {
        if ($user->picture) {
            File::delete(storage_path("/app/public/{$user->picture}"));
        }
    }
}
