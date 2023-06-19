@extends('layouts.cmsapp')

@section('content')
    <div class="container">
        <h2>Act bewerken</h2>

        <form action="{{ route('acts.update', ['offer' => $offer->id, 'offerCategory' => $offerCategory->id, 'act' => $act->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $act->title }}" required>
            </div>

            <div class="form-group">
                <label for="short_desc">Korte beschrijving</label>
                <input type="text" class="form-control" id="short_desc" name="short_desc" value="{{ $act->short_desc }}" required>
            </div>

            <div class="form-group">
                <label for="description">Beschrijving</label>
                <textarea class="form-control" id="description" name="description" rows="5" required>{{ $act->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="act_type">Act type</label>
                <input type="text" class="form-control" id="act_type" name="act_type" value="{{ $act->act_type }}" required>
            </div>

            <div class="form-group">
                <label for="time_span">Tijdsduur</label>
                <input type="text" class="form-control" id="time_span" name="time_span" value="{{ $act->time_span }}" required>
            </div>

            <div class="form-group">
                <label for="youtube_iframe">YouTube Iframe</label>
                <input type="text" class="form-control" id="youtube_iframe" name="youtube_iframe" value="{{ $act->youtube_iframe }}" required>
            </div>

            <div class="form-group">
                <label for="video_tumblr">Video Tumblr</label>
                <input type="file" class="form-control-file" id="video_tumblr" name="video_tumblr" accept="image/*">
                <small class="form-text text-muted">Alleen uploaden als u de huidige afbeelding wilt vervangen.</small>
            </div>

            <button type="submit" class="btn btn-primary">Bijwerken</button>
        </form>
    </div>
@endsection