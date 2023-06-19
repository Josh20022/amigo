@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="hero_carousal">
            @foreach ($homepageHeader->images as $image)
                <div class="slide1"
                    style="background: url( {{ asset('storage/' . $image->location) }}) no-repeat center/cover;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <h2>{{ $homepageHeader->titleText->text }}</h2>
                                <p>{{ $homepageHeader->headerText->text }}</p>
                                <div class="text-left">
                                    <a href="{{ $homepageHeader->button1->url }}"
                                        class="btn btn-outline-warning btn-primary">{{ $homepageHeader->button1->label }}</a>
                                    <a href="{{ $homepageHeader->button2->url }}"
                                        class="btn btn-primary btn-outline-warning outline">{{ $homepageHeader->button2->label }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!--news section-->
    <section class="about">
        <div class="container">
            <h2>{{ $latestNews->title }}</h2>
            <p>{{ $latestNews->description }}</p>
            <a href="{{ route('news.index') }}" class="btn btn-primary btn-outline-warning">Bekijk nieuwsarchief</a>
        </div>
    </section>

    <section>
        <div class="container">
            <center><img src="{{ asset('storage/' . $latestNews->image->location) }}" class="img-fluid"></center>
        </div>
    </section>

    <!--choose us section-->
    <section class="choose_us">
        <div class="container">
            <h2>{{ $quality->qualityTitle->text }}</h2>
            <div class="row">
                <div class="col-md-4 my-lg-4 my-0">
                    <p>
                        <i class="fa fa-regular fa-star"></i>
                        {{ $quality->quality1->text }}
                    </p>
                    <p>
                        <i class="fa fa-regular fa-star"></i>
                        {{ $quality->quality2->text }}
                    </p>
                </div>
                <div class="col-md-4 my-lg-4 my-0">
                    <p>
                        <i class="fa fa-regular fa-star"></i>
                        {{ $quality->quality3->text }}
                    </p>
                    <p>
                        <i class="fa fa-regular fa-star"></i>
                        {{ $quality->quality4->text }}
                    </p>
                </div>
                <div class="col-md-4 my-lg-4 my-0">
                    <p>
                        <i class="fa fa-regular fa-star"></i>
                        {{ $quality->quality5->text }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="testimonial">
        <div class="container">
            <h4 class="mb-6 text-center">{{ $referencestructure->referenceTitle->text }}</h4>
            <section class="logos-slider slider">
                @if ($references)
                    @foreach ($references as $reference)
                        <div class="slide relative">
                            <a href="">
                                <img src="{{ asset('storage/' . $reference->logo) }}" class="img-fluid" alt="">
                                <div class="testimonial_box">
                                    <div class="rating">
                                        @for ($i = 1; $i <= $reference->testimonial->stars; $i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                    </div>
                                    <p>"{{ $reference->testimonial->text }}"</p>

                                    <div class="media">
                                        <img src="img/Avatar%20Image.png" class="mr-3" alt="avatar">
                                        <div class="media-body">
                                            <h5 class="mt-0">{{ $reference->testimonial->name }}</h5>
                                            <p>{{ $reference->testimonial->function }}, {{ $reference->name }}</p>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </section>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        //logo slider

        $('.logos-slider').slick({
            arrows: false,
            dots: false,
            pauseOnHover: true,
            slidesToShow: 4,
            autoplay: true,
            autoplaySpeed: 0,
            speed: 4000,
            cssEase: 'linear',
            infinite: true,
            focusOnSelect: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    slidesToShow: 3
                }
            }, {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1
                }
            }]
        });
    </script>
@endpush
