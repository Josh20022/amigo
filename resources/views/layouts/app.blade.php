<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Amigoprodukties</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="" />
    {{-- @vite('resources/css/app.css') --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/tw.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/homepage/additional.css') }}">
    @if (Route::currentRouteName() == 'contact.index')
        <link rel="stylesheet" href="{{ asset('css/contactpage/style.css') }}">
    @endif
    @if (Route::currentRouteName() == 'about.index')
        <link rel="stylesheet" href="{{ asset('css/aboutpage/style.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @endif
    @if (Route::currentRouteName() == 'offer.index' ||
            Route::currentRouteName() == 'offerCategories.index' ||
            Route::currentRouteName() == 'acts.index')
        <link rel="stylesheet" href="{{ asset('css/offerpage/style.css') }}">
    @endif

    @stack('styles')

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light py-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </a>

            <div class="nav-item mobile_search d-block d-lg-none dropdown ml-auto">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa fa-light fa-magnifying-glass"></i>
                </a>
                <div class="dropdown-menu border-0 p-0">
                    <input placeholder="Search Here.." type="text" class="form-control">
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
                <span class="ml-auto"></span>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('offer.index') }}"
                            @if (Route::currentRouteName() == 'offer.index') style="color: rgb(253 184 20);" @endif>aanbod</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about.index') }}"
                            @if (Route::currentRouteName() == 'about.index') style="color: rgb(253 184 20);" @endif>wie zijn we</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news.index') }}"
                            @if (Route::currentRouteName() == 'news.index') style="color: rgb(253 184 20);" @endif>nieuws</a>
                    </li>
                </ul>
                <div class="my-lg-0 d-none d-lg-flex my-2 ml-auto">
                    <ul class="navbar-nav menu-right mx-auto">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa fa-light fa-magnifying-glass"></i>
                            </a>
                            <div class="dropdown-menu border-0 p-0">
                                <form action="{{ route('search') }}" method="GET">
                                    <input type="text" name="term" placeholder="Zoek hier..."
                                        class="form-control">
                                </form>
                            </div>
                        </li>

                        <li>
                            <a href="{{ route('contact.index') }}" class="btn btn-warning">Contact Us</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa fa-regular fa-star"></i>
                                <span>{{ count(session('favourites', [])) }}</span>
                            </a>
                            <div class="dropdown-menu">
                                @if (session('favourites'))
                                    @foreach (session('favourites') as $id => $favourite)
                                        <div class="dropdown-item m-0">
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3">
                                                    <img src="{{ asset('storage/img/plaatjes/' . $favourite['video_tumblr']) }}"
                                                        style="width: 50px;" alt="{{ $favourite['title'] }}">
                                                </div>
                                                <div>
                                                    <h5 class="mb-1">{{ $favourite['title'] }}</h5>
                                                </div>
                                            </div>
                                            <a href="{{ route('removeFavourite', ['id' => $id]) }}"
                                                class="text-muted"><small>Verwijder uit favorieten</small></a>
                                        </div>
                                    @endforeach
                                @endif
                                <a class="dropdown-item m-0" href="{{ route('favorieten.index') }}">Offerte aanvragen
                                    voor favorieten</a>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>

    @yield('content')
    <section class="footer-Section">
        <footer>
            <div class="container">

                <div class="footer_links d-flex justify-content-center">
                    <div class="footer_logo mr-auto">
                    </div>
                    <ul class="list-unstyled social_links">
                        <li>
                            <a href="{{ $facebook->text }}" target="_blank"><i
                                    class="fa fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li> <a href="{{ $instagram->text }}" target="_blank"><i
                                    class="fa fa-brands fa-instagram"></i></a></li>
                        <li><a href="{{ $twitter->text }}" target="_blank"><i
                                    class="fa fa-brands fa-twitter"></i></a></li>
                        <li> <a href="{{ $linkedin->text }}" target="_blank"><i
                                    class="fa fa-brands fa-linkedin"></i></a></li>
                    </ul>
                    <span class="ml-auto"></span>
                </div>

                <div class="footer_divider"></div>

                <div class="copyright">
                    <ul class="list-unstyled">
                        <li class="mr-4">
                            2023 Relume. All right reserved.
                        </li>
                        <li>
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#">Terms of Service</a>
                        </li>
                        <li>
                            <a href="#">Cookies Settings</a>
                        </li>
                    </ul>
                </div>

            </div>
        </footer>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/homepage/slick.min.js') }}"></script>
    <script src="{{ asset('js/homepage/app.js') }}"></script>
    
    @stack('scripts')
</body>

</html>
