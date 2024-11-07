<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Post extends Model
{
    use HasFactory, Commentable;


    protected $fillable = [
        'post_title',
        'post_image',
        'post_caption',
        'tags',
        'post_content',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bookmarkedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'bookmark');
    }
}