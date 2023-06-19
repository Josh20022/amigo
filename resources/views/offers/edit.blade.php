@extends('layouts.cmsapp')

@section('content')
<section>
    <h1>Bewerk aanbieding</h1>

    <form method="POST" action="{{ route('offers.update', $offer->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titel</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $offer->titel }}">
        </div>

        <div class="form-group">
            <label for="image_location">Afbeelding</label>
            <input type="file" class="form-control-file" id="image_location" name="image_location">
        </div>

        <div class="form-group">
            <label for="image_location">banner</label>
            <input type="file" class="form-control-file" id="banner" name="banner">
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</section>
@endsection