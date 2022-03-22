<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Photo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request): RedirectResponse
    {
        Comment::createFromPhoto($request);

        return redirect()->back();
    }
}
