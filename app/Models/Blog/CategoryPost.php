<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryPost extends Pivot
{
    protected $fillable = [
        'post_id',
        'category_id',
    ];

    protected $casts = [
        'id' => 'integer',
        'post_id' => 'integer',
        'category_id' => 'integer',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class);
    }
}
