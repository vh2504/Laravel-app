<?php

namespace App\Observers;

use App\Models\Item;
use Illuminate\Support\Facades\File;

class ItemObserver
{
    /**
     * Handle the User "deleting" event.
     *
     * @param Item $item
     * @return void
     */
    public function deleting(Item  $item)
    {
        File::delete(storage_path("/app/public/{$item->picture}"));

        $item->tags()->detach();
    }

    /**
     * Handle the User "updating" event.
     *
     * @param Item $item
     * @return void
     */
    public function updating(Item $item)
    {
        $oldPicture = (string)$item->getOriginal('picture', '');
        if ($oldPicture && $item->picture != $oldPicture) {
            File::delete(storage_path("/app/public/{$oldPicture}"));
        }
    }
}
