@extends('layouts.cmsapp')
@section('content')
<!-- Team member toevoegen -->
<section class="AboutPageForm">
    <div class="container">
        <h3>Pas de Aboutpage tekst aan!</h3><br>
        <form action="{{ route('aboutpage_structure.update', $aboutpageStructures->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="form-group">
              <label for="title">Titel</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ $aboutpageStructures->title->text }}" required>
            </div>
    
            <div class="form-group">
              <label for="description1">Beschrijving 1</label>
              <textarea class="form-control" id="description1" name="description1" rows="3" required>{{ $aboutpageStructures->description1->text }}</textarea>
            </div>
    
            <div class="form-group">
              <label for="description2">Beschrijving 2</label>
              <textarea class="form-control" id="description2" name="description2" rows="3" required>{{ $aboutpageStructures->description2->text }}</textarea>
            </div>
    
            <div class="form-group">
              <label for="team_title">Team Titel</label>
              <input type="text" class="form-control" id="team_title" name="team_title" value="{{ $aboutpageStructures->teamTitle->text }}" required>
            </div>
    
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</section>
<section class="TeamPageForm">
    <div class="container">
        <h3>Voeg een teamlid toe!</h3><br>
        <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="full_name">Volledige Naam</label>
              <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>

            <div class="form-group">
              <label for="job_title">Functietitel</label>
              <input type="text" class="form-control" id="job_title" name="job_title" required>
            </div>

            <div class="form-group">
              <label for="job_description">Functiebeschrijving</label>
              <textarea class="form-control" id="job_description" name="job_description" rows="3" required></textarea>
            </div>

            <!-- Hier nog meer velden voor profile_photo en social_links -->

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</section>

<!-- Overzicht van teamleden -->
<section>
    <div class="container">
    <h1>Teamleden</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Functietitel</th>
                <th>Functiebeschrijving</th>
                <!-- Eventueel andere kolommen toevoegen voor profile_photo en social_links -->
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teamMembers as $member)
                <tr>
                    <td>{{ $member->full_name }}</td>
                    <td>{{ $member->job_title }}</td>
                    <td>{{ $member->job_description }}</td>
                    <!-- Eventueel andere kolommen toevoegen voor profile_photo en social_links -->
                    <td>
                        <a href="{{ route('dashboard-teams.edit', $member->id) }}" class="btn btn-primary">Bewerken</a>
                        <form action="{{ route('dashboard-teams.destroy', $member->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je dit teamlid wilt verwijderen?')">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</section>
@endsection