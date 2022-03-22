<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PhotoGalleryController extends Controller
{
    public function index(Request $request): View
    {
        $photos = Photo::with(['ratings', 'comments'])->latest()->get();

        return view('admin.pages.gallery', compact('photos'));
    }

    public function destroy(Request $request, Photo $photo): RedirectResponse
    {
        $photo->delete();

        return redirect()->back();
    }
}
