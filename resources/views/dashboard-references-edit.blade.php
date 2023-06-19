@extends('layouts.cmsapp')
@section('content')
<!--welcomepage form-->
<section>
    <div class="container">
    <form action="{{ route('references.update', $reference->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <h3>Reference:</h3>
        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $reference->name }}">
        </div>
    
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" class="form-control-file" id="logo" name="logo">
            <small>Huidig logo: {{ $reference->logo }}</small>
        </div>
    
        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" class="form-control" id="url" name="url" value="{{ $reference->url }}">
        </div>
    
        <h3>Testimonial:</h3>
        <div class="form-group">
            <label for="foto">AvatarFoto</label>
            <input type="file" class="form-control-file" id="foto" name="testimonial[foto]">
            <small>Huidige foto: {{ $reference->testimonial->foto }}</small>
        </div>
    
        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" class="form-control" id="name" name="testimonial[name]" value="{{ $reference->testimonial->name }}">
        </div>
    
        <div class="form-group">
            <label for="function">Functie</label>
            <input type="text" class="form-control" id="function" name="testimonial[function]" value="{{ $reference->testimonial->function }}">
        </div>
    
        <div class="form-group">
            <label for="stars">Sterren</label>
            <select class="form-control" id="stars" name="testimonial[stars]">
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $reference->testimonial->stars == $i ? 'selected' : '' }}>{{ $i }} ster{{ $i > 1 ? 'ren' : '' }}</option>
                @endfor
            </select>
        </div>
    
        <div class="form-group">
            <label for="text">Tekst</label>
            <textarea class="form-control" id="text" name="testimonial[text]" rows="3">{{ $reference->testimonial->text }}</textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
</section>
@endsection