@extends('layouts.app')

@section('content')
<section class="band_hero">
    <div class="container">
        <h2 class="text-center">Het laatste nieuws</h2>
    </div>
</section>
<section>
    @foreach ($news as $news_item)
        <div class="container">
            <div class="news_title">
                <h1>{{ $news_item->title }}</h1><br>
                <h6>{{ $news_item->created_at }}</h6>
            </div>
            <div class="news_description">
                <p>
                    {{ $news_item->description }}
                </p>
            </div>
            <div class="news_image">
                <center><img src="{{ asset('storage/'.$news_item->image->location) }}" class="img-fluid"></center>
            </div>
            <hr/>
        </div>
    @endforeach
    <br><br><br>
</section>
@endsection