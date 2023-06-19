@extends('layouts.app')

@section('content')
<section class="band_hero">
    <div class="container">
        <h2 class="text-center">{{ $structure->title->text }}</h2>
    </div>
</section>
<section>
    <div class="page-info">
        <div class="main-info">
            <h2 class="main-info-text">
                {{ $structure->description->text }}
            </h2>
        </div>
        <div class="container-contact">
            <div class="contact-formulier">
                <form>
                    <div class="mb-3">
                      <label for="name" class="form-label">{{ $structure->formName->text }}</label>
                      <input type="name" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">{{ $structure->formEmail->text }}</label>
                      <input type="email" class="form-control" id="email">
                      <div id="emailHelp" class="form-text">{{ $structure->formEmailMessage->text }}</div>
                    </div>
                    <div class="mb-3">
                        <label for="bericht" class="form-label">{{ $structure->formMessage->text }}</label>
                        <textarea class="form-control" id="bericht" rows="3"></textarea>
                      </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">{{ $structure->formNewsletter->text }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ $structure->formSubmit->text }}</button>
                  </form>
            </div>
            <div class="contact-informatie">
                <h3><i class="bi bi-geo-alt-fill"></i></h3>
                <h3>{{ $structure->officeTitle->text }}</h3>
                <h4>{{ $structure->officeDesc->text }}</h4>
                {{-- 123 Sample St, Sydney NSW 2000 AU --}}
                <br>
                <h3><i class="bi bi-telephone-fill"></i></h3>
                <h3>{{ $structure->phoneTitle->text }}</h3>
                <h4>{{ $structure->phoneDesc->text }}</h4>
            </div>
        </div>
    </div>
</section>
@endsection