@extends('admin.template')

@section('content')
    <section class="m-5">
        <div class="row">
            @foreach ($photos as $item)
                <div class="col-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ $item->url }}" alt="Photo">
                        <div class="card-body">
                            <p class="card-text">Posted at {{ $item->user->created_at->format('d F, Y') }} by {{ $item->user->username }}</p>
                            <form action="{{ route('admin.gallery.destroy', ['photo' => $item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection