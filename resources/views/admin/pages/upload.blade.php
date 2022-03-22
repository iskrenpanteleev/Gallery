@extends('admin.template')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-5">
                    <form method="POST" action="{{ route('admin.upload.store') }}" class="form-data" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="file" name="photo" class="form-control-file" id="photo" accept="image/*">
                            <span class="text-danger">{{ $errors->first('photo') }}</span>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark w-100">Upload</button>
                        </div>
                    </form>
                    <span class="text-success">{{ session()->get('success') }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection