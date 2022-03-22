@extends('guest.template')

@section('content')
    <section class="m-5">
        <div class="d-flex justify-content-center">
            <div class="col-6">
                <div class="card">
                    <img class="card-img-top" src="{{ $photo->url }}" alt="Photo">
                    <div class="card-body">
                        <div class="text-center gap-1">
                            <span class="badge rounded-pill bg-success">{{ $photo->likes }} Likes</span>
                            <span class="badge rounded-pill bg-danger">{{ $photo->dislikes }} Dislikes</span>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($photo->comments as $item)
                                <li class="list-group-item">{{ $item->content }} | {{ $item->created_at->format('d F, Y H:i') }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="card px-3 py-3 mt-2">
                    <form method="POST" action="{{ route('comments.store') }}" class="form-data">
                        <input type="hidden" name="photo_id" value="{{ $photo->id }}">
                        @csrf
                        <div class="mb-3">
                            <label for="comment" class="form-label">Leave a comment</label>
                            <textarea name="content" class="form-control" id="comment"></textarea>
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection