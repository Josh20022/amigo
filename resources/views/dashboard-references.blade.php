@extends('layouts.cmsapp')
@section('content')
<!--welcomepage form-->
<section>
    <div class="container">
    <form action="{{ route('references.store.try') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Reference:</h3>
        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
    
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" class="form-control-file" id="logo" name="logo">
        </div>
    
        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" class="form-control" id="url" name="url">
        </div>
        <h3>testimonial</h3>
        <div class="form-group">
            <label for="foto">AvatarFoto</label>
            <input type="file" class="form-control-file" id="foto" name="testimonial[foto]">
        </div>
    
        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" class="form-control" id="name" name="testimonial[name]">
        </div>
    
        <div class="form-group">
            <label for="function">Functie</label>
            <input type="text" class="form-control" id="function" name="testimonial[function]">
        </div>
    
        <div class="form-group">
            <label for="stars">Sterren</label>
            <select class="form-control" id="stars" name="testimonial[stars]">
                <option value="1">1 ster</option>
                <option value="2">2 sterren</option>
                <option value="3">3 sterren</option>
                <option value="4">4 sterren</option>
                <option value="5" selected>5 sterren</option>
            </select>
        </div>
    
        <div class="form-group">
            <label for="text">Tekst</label>
            <textarea class="form-control" id="text" name="testimonial[text]" rows="3"></textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
    </div>
</section>
<section>
    <div class="container">
    <h1>Referenties</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>URL</th>
                <th>Getuigenis</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($references as $reference)
                <tr>
                    <td>{{ $reference->name }}</td>
                    <td>{{ $reference->url }}</td>
                    <td>{{ $reference->testimonial->text }}</td>
                    <td>
                        <a href="{{ route('references.edit', $reference->id) }}" class="btn btn-primary">Bewerken</a>
                        <form action="{{ route('references.destroy', $reference->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je deze referentie wilt verwijderen?')">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</section>
@endsection
