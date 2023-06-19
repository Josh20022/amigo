@extends('layouts.app')

@section('content')
<section class="band_hero">
    <div class="container">
        <h2 class="text-center">Offerte aanvragen</h2>
    </div>
</section>
<section>
    <div class="container pt-5 pb-5">
        <h2>Offerte aanvragen</h2>
        <div class="container">
            <h5>Geselecteerde acts:</h5>
            <table class="table">
                <tbody>
                    @foreach ($acts as $act)
                    <tr>
                        <td style="width: 20%;"><img src="{{ asset('storage/img/plaatjes/'.$act->plaatje1->url) }}" style="width: 50%;"></td>
                        <td style="text-align: center;"><h4><a href="{{ route('actdetail', ['offer' => $act->offerCategory->offer->id, 'offerCategory' => $act->offerCategory->id, 'act' => $act->id]) }}">{{ $act->titel }}</a></h4></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br><br>
            <form action="#">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <label><h3>Email:</h3></label>
                    </div>
                    <div class="col-md-4">
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="col">
                        <input type="submit" class="btn btn-warning form-control" style="width: auto;">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection