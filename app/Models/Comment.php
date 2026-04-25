<?php

namespace App\Models;

use App\Traits\LikeTrait;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use LikeTrait;

    protected $fillable = [
        'post_id',
        'content',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
