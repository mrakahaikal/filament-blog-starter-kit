<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    protected $fillable = [
        'email',
        'subscribed',
    ];

    protected $casts = [
        'id' => 'integer',
        'active' => 'boolean',
    ];

    public function scopeSubscribed()
    {
        return $this->where('subscribed', true);
    }

}
