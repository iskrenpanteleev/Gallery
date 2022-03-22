<?php

namespace App\Http\Requests\Guest;

use App\Enums\RatingEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class PhotoReactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !$this->photo->ratings()->where('ip', request()->ip())
            ->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rating' => [
                'required',
                new Enum(RatingEnum::class)
            ],
        ];
    }
}
