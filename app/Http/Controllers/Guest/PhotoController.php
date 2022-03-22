<?php

namespace App\Http\Controllers\Guest;

use App\Enums\RatingEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\PhotoRateRequest;
use App\Models\Photo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(Request $request): View
    {
        $photos = Photo::with(['ratings', 'comments'])->latest()->paginate(3);

        return view('guest.pages.photos', compact('photos'));
    }

    public function show(Request $request, Photo $photo): View
    {
        return view('guest.pages.photo', compact('photo'));
    }

    public function rate(PhotoRateRequest $request, Photo $photo): RedirectResponse
    {
        $photo->rate($request);

        return redirect()->back();
    }
}
