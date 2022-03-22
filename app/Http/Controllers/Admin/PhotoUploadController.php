<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PhotoUploadRequest;
use App\Models\Photo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PhotoUploadController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.pages.upload');
    }

    public function store(PhotoUploadRequest $request): RedirectResponse
    {
        $model = Photo::upload($request);

        return redirect()->back()
            ->with('success', 'Photo was uploaded successfully.');
    }
}
