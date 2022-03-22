<?php

namespace App\Models;

use App\Enums\RatingEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'ip'];

    protected $casts = [
        'type' => RatingEnum::class
    ];

    public function photo(): BelongsTo
    {
        return $this->belongsTo(Photo::class);
    }
}
