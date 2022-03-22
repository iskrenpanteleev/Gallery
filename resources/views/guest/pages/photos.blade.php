@extends('guest.template')

@section('content')
    <section class="m-5">
        <div class="row">
            @foreach ($photos as $item)
                <div class="col-4">
                    <div class="card">
                        <a href="{{ route('photos.show', ['photo' => $item->id]) }}">
                            <img class="card-img-top" src="{{ $item->url }}" alt="Photo">
                        </a>
                        <div class="card-body">
                            <div class="d-flex justify-content-center gap-1">
                                <form action="{{ route('photos.react', ['photo' => $item->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rating" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Like</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rating" id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">Dislike</label>
                                    </div>
                                    <button type="submit" {{ $item->is_rated ? 'disabled' : '' }} class="btn btn-sm btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="mt-3">
                {!! $photos->links() !!}
            </div>
        </div>
    </section>
@endsection