@extends('layouts.cmsapp')

@section('content')

<div class="container">
    <h2>Bewerk Teamlid</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('dashboard-teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="full_name">Volledige Naam</label>
            <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $team->full_name }}" required>
        </div>

        <div class="form-group">
            <label for="job_title">Functietitel</label>
            <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $team->job_title }}" required>
        </div>

        <div class="form-group">
            <label for="job_description">Functiebeschrijving</label>
            <textarea class="form-control" id="job_description" name="job_description" rows="3" required>{{ $team->job_description }}</textarea>
        </div>

        <div class="form-group">
            <label for="profile_photo">Profielfoto</label>
            <input type="file" class="form-control-file" id="profile_photo" name="profile_photo">
        </div>
    
        <div class="form-group">
            <label for="social_link1">Sociale link 1</label>
            <input type="text" class="form-control" id="social_link1" name="social_link1" value="{{ $team->social_link1 }}">
        </div>

        <div class="form-group">
            <label for="social_link2">Sociale link 2</label>
            <input type="text" class="form-control" id="social_link2" name="social_link2" value="{{ $team->social_link2 }}">
        </div>

        <div class="form-group">
            <label for="social_link3">Sociale link 3</label>
            <input type="text" class="form-control" id="social_link3" name="social_link3" value="{{ $team->social_link3 }}">
        </div>

        <!-- Hier nog meer velden voor profile_photo en social_links -->

        <button type="submit" class="btn btn-primary">Bijwerken</button>
    </form>
</div>

@endsection
