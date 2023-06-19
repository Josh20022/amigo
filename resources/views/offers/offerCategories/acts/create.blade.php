@extends('layouts.cmsapp')

@section('content')
    <div class="container">
        <h1>{{ $offerCategory->titel }} - Nieuwe Act aanmaken</h1>

        <button id="toggleForm" class="btn btn-primary btn-warning">Formulier Weergeven</button>

        <div id="formContainer" style="display: none;">
        <form action="<form action="{{ route('acts.store', ['offer' => $offer->id, 'offerCategory' => $offerCategory->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" class="form-control" id="title" name="titel" required>
            </div>
        
            <div class="form-group">
                <label for="short_desc">Korte beschrijving</label>
                <textarea class="form-control" id="short_desc" name="omschrijving" rows="3" required></textarea>
            </div>
        
            <div class="form-group">
                <label for="description">Beschrijving</label>
                <textarea class="form-control" id="description" name="omschrijving" rows="3" required></textarea>
            </div>
        
            <div class="form-group">
                <label for="act_type">Type Act</label>
                <input type="text" class="form-control" id="act_type" name="soort" required>
            </div>
        
            <div class="form-group">
                <label for="time_span">Tijdsduur</label>
                <input type="text" class="form-control" id="time_span" name="tijdsduur" required>
            </div>
        
            <div class="form-group">
                <label for="youtube_iframe">YouTube Iframe</label>
                <input type="text" class="form-control" id="youtube_iframe" name="youtube" required>
            </div>
        
            <div class="form-group">
                <label for="video_tumblr">Foto</label>
                <input type="file" class="form-control-file" id="video_tumblr" name="video_tumblr" accept="image/*" required>
            </div>
        
            <div class="form-group">
                <label for="special_notes">Bijzonderheden</label>
                <textarea class="form-control" id="special_notes" name="bijzonderheden" rows="3" required></textarea>
            </div>
        
            <div class="form-group">
                <label for="price">Prijs</label>
                <input type="text" class="form-control" id="price" name="prijs" required>
            </div>
        
            <div class="form-group">
                <label for="image1">Afbeelding 1</label>
                <input type="file" class="form-control-file" id="image1" name="pl1" accept="image/*">
            </div>
        
            <div class="form-group">
                <label for="image2">Afbeelding 2</label>
                <input type="file" class="form-control-file" id="image2" name="pl2" accept="image/*">
            </div>
        
            <div class="form-group">
                <label for="image3">Afbeelding 3</label>
                <input type="file" class="form-control-file" id="image3" name="pl3" accept="image/*">
            </div>
        
            <div class="form-group">
                <label for="image4">Afbeelding 4</label>
                <input type="file" class="form-control-file" id="image4" name="pl4" accept="image/*">
            </div>
        
            <div class="form-group">
                <label for="image5">Afbeelding 5</label>
                <input type="file" class="form-control-file" id="image5" name="pl5" accept="image/*">
            </div>
        
            <div class="form-group">
                <label for="text1">Tekst 1</label>
                <input type="text" class="form-control" id="text1" name="txt1">
            </div>
        
            <div class="form-group">
                <label for="text2">Tekst 2</label>
                <input type="text" class="form-control" id="text2" name="txt2">
            </div>
        
            <div class="form-group">
                <label for="text3">Tekst 3</label>
                <input type="text" class="form-control" id="text3" name="txt3">
            </div>
        
            <div class="form-group">
                <label for="text4">Tekst 4</label>
                <input type="text" class="form-control" id="text4" name="txt4">
            </div>
        
            <div class="form-group">
                <label for="text5">Tekst 5</label>
                <input type="text" class="form-control" id="text5" name="txt5">
            </div>
        
            <div class="form-group">
                <label for="order">Volgorde</label>
                <input type="number" class="form-control" id="order" name="volgorde" required>
            </div>
        
            <div class="form-group">
                <label for="meta_title">Meta-titel</label>
                <input type="text" class="form-control" id="meta_title" name="metatitel">
            </div>
        
            <div class="form-group">
                <label for="meta_description">Meta-beschrijving</label>
                <textarea class="form-control" id="meta_description" name="metadesc" rows="3"></textarea>
            </div>
        
            <div class="form-group">
                <label for="meta_keywords">Meta-trefwoorden</label>
                <input type="text" class="form-control" id="meta_keywords" name="metakeys">
            </div>
        
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" id="url" name="url" required>
            </div>
        
            <div class="form-group">
                <label for="category">Categorie</label>
                <select class="form-control" id="category" name="cat" required>
                    <!-- options for categories here -->
                </select>
            </div>
        
            <div class="form-group">
                <label for="additional_price">Meerprijs</label>
                <input type="text" class="form-control" id="additional_price" name="meerprijs" required>
            </div>
        
            <div class="form-group">
                <label for="ticker">Ticker</label>
                <input type="number" class="form-control" id="ticker" name="ticker" required>
            </div>
        
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
        </div>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Titel</th>
                    <th scope="col">Afbeelding</th>
                    <th scope="col">Act type</th>
                    <th scope="col">Tijdsduur</th>
                    <th scope="col">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($acts as $act)
                    <tr>
                        <td>{{ $act->titel }}</td>
                        <td><img src="{{ asset('storage/img/plaatjes/' . $act->plaatje1->titel) }}" alt="" width="100"></td>
                        <td>{{ $act->soort }}</td>
                        <td>{{ $act->tijdsduur}}</td>
                        <td>
                            <a href="{{ route('acts.edit', ['offer' => $offer->id, 'offerCategory' => $offerCategory->id, 'act' => $act->id]) }}" class="btn btn-primary">Bewerken</a>
                            <form action="{{ route('acts.destroy', ['offer' => $offer->id, 'offerCategory' => $offerCategory->id, 'act' => $act->id]) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je deze act wilt verwijderen?')">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        const toggleFormButton = document.getElementById('toggleForm');
        const formContainer = document.getElementById('formContainer');
    
        toggleFormButton.addEventListener('click', function() {
            if (formContainer.style.display === 'none') {
                formContainer.style.display = 'block';
                toggleFormButton.textContent = 'Formulier verbergen';
            } else {
                formContainer.style.display = 'none';
                toggleFormButton.textContent = 'Formulier weergeven';
            }
        });
    </script>
@endsection