@extends('bootstrap', ['title' => 'Login'])

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-5">
                    <form method="POST" action="{{ route('admin.login.auth') }}" class="form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username">
                            <span class="text-danger">{{ $errors->first('username') }}</span>
                          </div>
                          <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                          </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark w-100">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection