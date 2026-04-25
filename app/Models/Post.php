<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    #[Scope]
    protected function mostPopular(Builder $query): Builder
    {
        return $query->where('view_count', '>', 100);
    }
}
