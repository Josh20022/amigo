@if (Auth::check())
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Amigoprodukties</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>
</head>
<body>


<nav class="navbar py-0 navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="{{ asset('img/logo.png') }}" alt="">
        </a>

        <div class="nav-item mobile_search d-block d-lg-none dropdown ml-auto">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-light fa-magnifying-glass"></i>
            </a>
            <div class="dropdown-menu p-0 border-0">
                <input placeholder="Search Here.." type="text" class="form-control">
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <span class="ml-auto"></span>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard-welcome') }}">Homepage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('create.offer') }}">Aanbod</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('references.index') }}">References</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aboutpage_structure.index') }}">Wie zijn we</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard-news') }}">Nieuws</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contactpage_structure.cmsindex') }}">Contact</a>
                </li>
            </ul>
            <div class="my-2 my-lg-0 ml-auto d-none d-lg-flex">
            </div>
        </div>
    </div>
</nav>
@yield('content')

</body>
</html>
@endif