<?php

namespace App\Models;

use App\Enums\RatingEnum;
use App\Http\Requests\Admin\PhotoUploadRequest;
use App\Http\Requests\Guest\PhotoRateRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Photo extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public function getUrlAttribute()
    {
        return $this->getFirstMediaUrl('photos');
    }

    public function getIsRatedAttribute(): bool
    {
        return $this->ratings()->where('ip', request()->ip())
            ->exists();
    }

    public function getLikesAttribute(): int
    {
        return $this->ratings()->where('type', RatingEnum::LIKE)
            ->count();
    }

    public function getDislikesAttribute(): int
    {
        return $this->ratings()->where('type', RatingEnum::DISLIKE)
            ->count();
    }

    public static function upload(PhotoUploadRequest $request): self
    {
        $model = new self;
        $model->user()->associate(auth()->user());
        $model->save();

        $model->addMediaFromRequest('photo')
            ->toMediaCollection('photos');

        return $model;
    }

    public function rate(PhotoRateRequest $request): Rating
    {
        return $this->ratings()->create([
            'type'  => $request->rating,
            'ip'    => $request->ip()
        ]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }
}
