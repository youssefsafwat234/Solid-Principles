<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class MostPopularPosts
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function execute(User $user): Collection
    {
        return $user->posts()->where('view_count', '>', 100)->get();
    }
}
