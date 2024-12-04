<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
    ];

    protected $hidden = ['pivot', 'updated_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function history(): HasMany
    {
        return $this->hasMany(CommentHistory::class)->latest();
    }

    public function lastEdited()
    {
        return $this->hasOne(CommentHistory::class)->latestOfMany();
    }
}
