@extends('layouts.cmsapp')

@section('content')

<h1>Bewerk Offer Category: {{$offer->title}}</h1>

<form action="{{ route('offerCategories.update', ['offer' => $offer->id, 'offerCategory' => $offerCategory->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Titel</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $offerCategory->titel }}" required>
    </div>

    <div class="form-group">
        <label for="image">Afbeelding</label>
        <img src="{{ asset('storage/' . $offerCategory->image_location) }}" alt="" width="200">
        <input type="file" class="form-control-file" id="image_location" name="image_location" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Bewerken</button>
</form>

@endsection