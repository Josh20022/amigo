@extends('layouts.app')

@section('content')
<section class="band_hero" style="background: url('{{ asset('storage/img/plaatjes/'.$act->plaatje1->url) }}');">
    <div class="container">
        <h2 class="text-center">{{ $act->titel }}</h2>
    </div>
</section>

<br>

<section class="band_detail">
    <div class="container">
        <h2>{{ $act->titel }}</h2>
        <p>{!! $act->omschrijving !!}</p>

        <br>
        {{-- <p>{!! $act->txt1 !!}</p> --}}

        <br>
        <div class="text-left">
            <a href="{{ route('acts.index', ['offer' => $act->offerCategory->offer->id, 'offerCategory' => $act->offerCategory->id]) }}" class="btn btn-primary my-1">Terug naar overzicht</a>
            <a href="#" class="btn btn-primary outline my-1">Meer informatie aanvragen</a>
            <a href="{{ route('addFavourite', $act->id) }}" class="btn btn-primary my-1">Toevoegen aan Favorieten</a>
        </div>

        <br>
        <br>
        <h4>Algemene informatie</h4>
        <p>
            @if (!empty($act->soort))
            <strong>Soort act:</strong> {{ $act->soort }} <br>
            @endif
            @if (!empty($act->tijdsduur))
            <strong>Tijdsduur:</strong> {{ $act->tijdsduur }} <br>
            @endif
            @if (!empty($act->bijzonderheden))
            <strong>bijzonderheden:</strong> {{ $act->bijzonderheden }}    
            @endif
        </p>
        
    </div>
</section>

 <section class="gallery">
     <div class="container">
         <div class="row">
             <div class="col-md-6 my-4">
                 <div class="video">
                     @if (!empty($act->youtube))
                     <a href="javascript:;" data-toggle="modal" data-target="#exampleModal">  
                     @endif
                     <img src="{{ asset('storage/img/plaatjes/'.$act->plaatje1->url) }}" class="img-fluid">
                     @if (!empty($act->youtube))
                     </a>
                     @endif
                 </div>
             </div>

             <div class="col-md-6 my-4">
                 <div class="gallery_carousal">
                     @if (!empty($act->plaatje2) && $act->plaatje2->id != 0)
                     <img src="{{ asset('storage/img/plaatjes/'.$act->plaatje2->url) }}" class="img-fluid">    
                     @endif
                     @if (!empty($act->plaatje1) && $act->plaatje1->id != 0)
                     <img src="{{ asset('storage/img/plaatjes/'.$act->plaatje1->url) }}" class="img-fluid">    
                     @endif
                     @if (!empty($act->plaatje3) && $act->plaatje3->id != 0)
                     <img src="{{ asset('storage/img/plaatjes/'.$act->plaatje3->url) }}" class="img-fluid">    
                     @endif
                     @if (!empty($act->plaatje4) && $act->plaatje4->id != 0)
                     <img src="{{ asset('storage/img/plaatjes/'.$act->plaatje4->url) }}" class="img-fluid">    
                     @endif
                     @if (!empty($act->plaatje5) && $act->plaatje5->id != 0)
                     <img src="{{ asset('storage/img/plaatjes/'.$act->plaatje5->url) }}" class="img-fluid">    
                     @endif
                 </div>
             </div>
         </div>
     </div>
 </section>
 @if (!empty($act->youtube))
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <iframe width="100%" height="415" src="{{ $act->youtube }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
@endif
@endsection