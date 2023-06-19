@extends('layouts.app')
@section('content')
    <section class="band_hero">
        <div class="container">
            <h2 class="text-center">Aanbod</h2>
        </div>
    </section>
    <section class="page-data">
        <div class="page-info">
            <div class="main-info">
                <h2 class="main-info-text">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error dolore dolorem eum veniam, sit, dolores
                    vitae nemo quas vel expedita recusandae tempora culpa illo nulla obcaecati maxime. Rerum dolor
                    repudiandae quod eius voluptates non fugiat mollitia, temporibus minima minus quisquam accusantium
                    veritatis ut eum quas eligendi libero cumque voluptatibus. Architecto!
                </h2>
                <h2 class="advice">Persoonlijk advies? Bel: <span>073-6895427</span></h2>
                <h2 class="detail">of, geef ons je informatie, dan bellen we jou</h2>
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Naam" aria-label="First name">
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Telefoon nummer" aria-label="Last name">
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-warning form-control" style="width: auto;">Bel me</button>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="container m-auto">
            <div class="mt-10 mb-20 grid gap-10 md:grid-cols-2 lg:gap-10 xl:grid-cols-3">
                @foreach ($offers as $offer)
                    <a href="{{ route('offerCategories.index', $offer->id) }}">
                        <div class="group cursor-pointer my-6 hover:my-6">
                            <div class="grid-img">
                                <div class="grid-img-container"
                                    style="background-image: url('{{ asset('storage/img/plaatjes/' . $offer->plaatje->titel) }}');  background-size: cover;">
                                </div>
                                <div class="grid-text">
                                    <h2 class="img-text">
                                        {{ $offer->titel }}  
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                
            </div>
        </div>
    </section>
@endsection

