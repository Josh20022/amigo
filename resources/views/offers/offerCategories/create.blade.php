@extends('layouts.cmsapp')

@section('content')
    <div class="container">
        <h1>{{ $offer->titel }} - Offer Categories</h1>

        <h2>Nieuwe Offer Category aanmaken</h2>

        <form action="{{ route('dashboard.offers.offerCategories.store', $offer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="image_location">Afbeelding</label>
                <input type="file" class="form-control-file" id="image_location" name="image_location" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>

        <hr>


        @if(count($offer->offerCategories) > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>Titel</th>
                    <th>Afbeelding</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                @foreach($offer->offerCategories as $offerCategory)
                    <tr>
                        <td><a href="{{ route('create.acts', [$offer->id, $offerCategory->id]) }}">{{ $offerCategory->titel }}</a></td>
                        <td>
                            <img src="{{ asset('storage/img/plaatjes/' . $offerCategory->plaatje->titel) }}" alt="{{ $offerCategory->title }}" width="100">
                        </td>
                        <td>
                            <a href="{{ route('dashboard.offers.offerCategories.edit', [$offer->id, $offerCategory->id]) }}" class="btn btn-primary">Bewerken</a>
                            <form action="{{ route('dashboard.offers.offerCategories.destroy', [$offer->id, $offerCategory->id]) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je deze Offer Category wilt verwijderen?')">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Er zijn momenteel geen Offer Categories voor dit Offer.</p>
        @endif
    </div>
@endsection