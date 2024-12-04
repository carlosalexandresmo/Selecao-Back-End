<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'content',
        'edited_at'
    ];

    protected $casts = [
        'comment_id' => 'integer',
    ];

    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }
}
