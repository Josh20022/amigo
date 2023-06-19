@extends('layouts.cmsapp')
@section('content')
<!--welcomepage form-->
<section class="Welcomepageform">
  <div class="container">
    <h2>Header</h2>
    <form action="{{ route('homepage.update', ['id' => $homepageHeader->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="header_title">Titel:</label>
        <input type="text" name="header_title" class="form-control" value="{{ $homepageHeader->titleText->text }}">
      </div>
      <div class="form-group">
        <label for="header_text">Tekst:</label>
        <textarea name="header_text" class="form-control">{{ $homepageHeader->headerText->text }}</textarea>
      </div>
      <div class="form-group">
        <label for="header_button1">Button 1:</label>
        <input type="text" name="header_button1" class="form-control" value="{{ $homepageHeader->button1->label }}">
      </div>
      <div class="form-group">
        <label for="header_button2">Button 2:</label>
        <input type="text" name="header_button2" class="form-control" value="{{ $homepageHeader->button2->label }}">
      </div>
      <div class="form-group">
        <label for="header_images[]">Nieuwe afbeeldingen:</label>
        <input type="file" name="header_images[]" multiple class="form-control-file">
      </div>
      <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
    <hr>
    <h3>Afbeeldingen</h3>
    <div class="row">
      @foreach($homepageHeader->images as $image)
      <div class="col-6 col-md-4 col-lg-3 mb-3">
        <div class="card">
          <img src="{{ asset('storage/'.$image->location) }}" class="card-img-top" alt="Header afbeelding">
          <div class="card-body">
            <form action="{{ route('homepage.image.delete', ['id' => $image->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger float-right" onclick="return confirm('Weet je zeker dat je deze afbeelding wilt verwijderen?')">Verwijderen</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  </section>
    <section class="Welcomepageform">
      <div class="container">
        <h2>Kwaliteiten:</h2>
        <form method="POST" action="{{ route('homepage.quality.update', $homepageStructure->id) }}">
            @csrf
            @method('PUT')
        
            <!-- Titel -->
            <div class="form-group">
                <label for="title">Titel:</label>
                <input type="text" name="quality_title" id="quality_title" class="form-control" value="{{ $homepageStructure->qualityTitle->text }}">
            </div>
        
            <!-- Kwaliteit 1 -->
            <div class="form-group">
                <label for="quality1">Kwaliteit 1:</label>
                <input type="text" name="quality_1" id="quality_1" class="form-control" value="{{ $homepageStructure->quality1->text }}">
            </div>
        
            <!-- Kwaliteit 2 -->
            <div class="form-group">
                <label for="quality2">Kwaliteit 2:</label>
                <input type="text" name="quality_2" id="quality_2" class="form-control" value="{{ $homepageStructure->quality2->text }}">
            </div>
        
            <!-- Kwaliteit 3 -->
            <div class="form-group">
                <label for="quality3">Kwaliteit 3:</label>
                <input type="text" name="quality_3" id="quality_3" class="form-control" value="{{ $homepageStructure->quality3->text }}">
            </div>
        
            <!-- Kwaliteit 4 -->
            <div class="form-group">
                <label for="quality4">Kwaliteit 4:</label>
                <input type="text" name="quality_4" id="quality_4" class="form-control" value="{{ $homepageStructure->quality4->text }}">
            </div>
        
            <!-- Kwaliteit 5 -->
            <div class="form-group">
                <label for="quality5">Kwaliteit 5:</label>
                <input type="text" name="quality_5" id="quality_5" class="form-control" value="{{ $homepageStructure->quality5->text }}">
            </div>
        
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
      </div>    
    </section>
@endsection