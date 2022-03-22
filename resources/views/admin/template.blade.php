@extends('bootstrap', ['title' => 'Admin Dashboard'])

@section('navigation')
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('admin.photo.index') }}" class="nav-link px-2 {{ request()->routeIs('admin.photo.index') ? 'text-secondary' : 'text-white' }}">Gallery</a></li>
                    <li><a href="{{ route('admin.upload.index') }}" class="nav-link px-2 {{ request()->routeIs('admin.upload.index') ? 'text-secondary' : 'text-white' }}">Upload</a></li>
                </ul>
                <ul class="nav justify-content-end mb-md-0">
                    <li><a href="{{ route('photos.index') }}" class="btn btn-warning text-uppercase">Back to guest</a></li>
                </ul>
            </div>
        </div>
    </header>
@endsection