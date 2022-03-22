@extends('bootstrap', ['title' => 'Photo Gallery'])

@section('navigation')
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('photos.index') }}" class="nav-link px-2 {{ request()->routeIs('photos.index') ? 'text-secondary' : 'text-white' }}">Gallery</a></li>
                </ul>
                <ul class="nav justify-content-end mb-md-0">
                    <li><a href="{{ route('admin.login.index') }}" class="btn btn-warning text-uppercase">Admin</a></li>
                </ul>
            </div>
        </div>
    </header>
@endsection