@extends('layouts.cmsapp')
@section('content')
<!--welcomepage form-->
<section class="Welcomepageform">
    <div class="container">
<h3>Voeg een nieuws bericht toe!</h3><br>
    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="title">Titel</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
          <label for="description">Beschrijving</label>
          <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="form-group">
          <label for="image">Afbeelding</label>
          <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
    </div>
</section>
<section>
    <div class="container">
    <h1>Nieuwsberichten</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th>Titel</th>
                <th>Beschrijving</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <a href="{{ route('dashboard-news.edit', $item->id) }}" class="btn btn-primary">Bewerken</a>
                        <form action="{{ route('dashboard-news.destroy', $item->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je dit nieuwsbericht wilt verwijderen?')">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</section>
@endsection