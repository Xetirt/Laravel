<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\IdeaStatus;

class Idea extends Model
{
    protected $fillable = ['title', 'description', 'image_path', 'status', 'user_id'];

    protected function casts(): array
    {
        return [
            'status' => IdeaStatus::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}