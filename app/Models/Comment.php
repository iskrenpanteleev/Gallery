<?php

namespace App\Models;

use App\Http\Requests\Guest\CreateCommentRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['photo_id', 'content'];

    public static function createFromPhoto(CreateCommentRequest $request): Comment
    {
        return static::create($validated = $request->validated());
    }

    public function photo(): BelongsTo
    {
        return $this->belongsTo(Photo::class);
    }
}
