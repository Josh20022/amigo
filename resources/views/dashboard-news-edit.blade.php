@extends('layouts.cmsapp')
@section('content')
<!--welcomepage form-->
<section>
    <div class="container">
    <h1>Bewerk nieuwsbericht</h1>

    <h1>Nieuwsbericht bewerken</h1>

    <form method="POST" action="{{ route('dashboard-news.update', $news->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titel</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
        </div>

        <div class="form-group">
            <label for="description">Beschrijving</label>
            <textarea class="form-control" id="description" name="description">{{ $news->description }}</textarea>
        </div>

        {{-- <div class="form-group">
            <label for="image">Afbeelding</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div> --}}

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
    </div>
</section>
@endsection