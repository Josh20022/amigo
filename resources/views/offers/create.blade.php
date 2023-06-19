@extends('layouts.cmsapp')

@section('content')
<section>
    <div class="container">    
        <h3>Voeg een nieuw aanbod toe!</h3><br>
        <form action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="image">Afbeelding</label>
                <input type="file" class="form-control-file" id="image_location" name="image_location" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="image">Banner</label>
                <input type="file" class="form-control-file" id="banner" name="banner" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>

</section>

<section>
    <div class="container">
       <h1>Aanbiedingen</h1>
    
        <table class="table">
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Afbeelding</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $offer)
                    <tr>
                        <td><a href="{{ route('create.offerCategories', $offer->id) }}">{{ $offer->titel }}</a></td>
                        <td><img src="{{ asset('storage/img/plaatjes/' . $offer->plaatje->titel) }}" alt="" width="100"></td>
                        <td>
                            <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-primary">Bewerken</a>
                            <form action="{{ route('offers.destroy', $offer->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je dit aanbod wilt verwijderen?')">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
    </div>
    
</section>
@endsection