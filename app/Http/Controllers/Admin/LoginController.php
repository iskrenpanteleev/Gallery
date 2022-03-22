<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('admin.gallery.index');
        }

        return view('admin.pages.login');
    }

    public function auth(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($credentials = $request->validated())) {
            session()->regenerate();
            return redirect()->route('admin.gallery.index');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}
