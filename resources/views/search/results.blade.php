@extends('layouts.app')

@section('content')
<section class="band_hero">
    <div class="container">
        <h2 class="text-center">Zoekresultaten</h2>
    </div>
</section>

<br>

<div class="container">
    <!-- Acts -->
@if($acts->count() == 0 && $offerCategories->count() == 0 && $offers->count() == 0)
<h2>Geen resultaten gevonden</h2>
@else
<h2>{{ $acts->count()+$offerCategories->count()+$offers->count() }} Gevonden resultaten voor '{{ $searchTerm }}':</h2>
@endif
@if($acts->count() > 0)
<h3>Acts</h3>
<ul>
    @foreach($acts as $act)
        <li><a href="{{ route('actdetail', ['offer' => $act->offerCategory->offer->id, 'offerCategory' => $act->offerCategory->id, 'act' => $act->id]) }}">{{ $act->titel }}</a></li>
    @endforeach
</ul>
@endif

<!-- OfferCategories -->
@if($offerCategories->count() > 0)
<h3>Categorieën</h3>
<ul>
    @foreach($offerCategories as $offerCategory)
        <li><a href="{{ route('acts.index', ['offer' => $offerCategory->offer->id, 'offerCategory' => $offerCategory->id]) }}">{{ $offerCategory->titel }}</a></li>
    @endforeach
</ul>
@endif

<!-- Offers -->
@if($offers->count() > 0)
<h3>Aanbod</h3>
<ul>
    @foreach($offers as $offer)
        <li><a href="{{ route('offerCategories.index', $offer->id) }}">{{ $offer->titel }}</a></li>
    @endforeach
</ul>
@endif

</div>

@endsection