<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable=['title','description','image_path'];

    protected function casts():array{
        return ['status'=>IdeaStatus::class];
    }

    public function user():BelongsTo {
        return $this->BelongsTo(User::class);
    }
}
