@extends('layouts.cmsapp')
@section('content')
<!-- Team member toevoegen -->
<section class="ContactPageForm">
    <div class="container">
        <h3>Pas de Contactpage tekst aan!</h3><br>
        <form action="{{ route('contactpage_structure.update', $contactpageStructures->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="form-group">
              <label for="title">Titel</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ $contactpageStructures->title->text }}" required>
            </div>
    
            <div class="form-group">
              <label for="description">Beschrijving</label>
              <textarea class="form-control" id="description" name="description" rows="3" required>{{ $contactpageStructures->description->text }}</textarea>
            </div>
    
            <div class="form-group">
              <label for="form_name">Form Naam</label>
              <input type="text" class="form-control" id="form_name" name="form_name" value="{{ $contactpageStructures->formName->text }}" required>
            </div>
    
            <div class="form-group">
              <label for="form_email">Form Email</label>
              <input type="text" class="form-control" id="form_email" name="form_email" value="{{ $contactpageStructures->formEmail->text }}" required>
            </div>
    
            <div class="form-group">
              <label for="form_email_message">Form Email Bericht</label>
              <input type="text" class="form-control" id="form_email_message" name="form_email_message" value="{{ $contactpageStructures->formEmailMessage->text }}" required>
            </div>
    
            <div class="form-group">
              <label for="form_message">Form Bericht</label>
              <input type="text" class="form-control" id="form_message" name="form_message" value="{{ $contactpageStructures->formMessage->text }}" required>
            </div>
    
            <div class="form-group">
              <label for="form_newsletter">Form Nieuwsbrief</label>
              <input type="text" class="form-control" id="form_newsletter" name="form_newsletter" value="{{ $contactpageStructures->formNewsletter->text }}" required>
            </div>
    
            <div class="form-group">
              <label for="form_submit">Form Verzenden</label>
              <input type="text" class="form-control" id="form_submit" name="form_submit" value="{{ $contactpageStructures->formSubmit->text }}" required>
            </div>
    
            <div class="form-group">
              <label for="office_title">Kantoor Titel</label>
              <input type="text" class="form-control" id="office_title" name="office_title" value="{{ $contactpageStructures->officeTitle->text }}" required>
            </div>
    
            <div class="form-group">
              <label for="office_desc">Kantoor Beschrijving</label>
              <input type="text" class="form-control" id="office_desc" name="office_desc" value="{{ $contactpageStructures->officeDesc->text }}" required>
            </div>
    
            <div class="form-group">
              <label for="phone_title">Telefoon Titel</label>
              <input type="text" class="form-control" id="phone_title" name="phone_title" value="{{ $contactpageStructures->phoneTitle->text }}" required>
            </div>
    
            <div class="form-group">
              <label for="phone_desc">Telefoon Beschrijving</label>
              <input type="text" class="form-control" id="phone_desc" name="phone_desc" value="{{ $contactpageStructures->phoneDesc->text }}" required>
            </div>
    
            <div class="form-group">
              <label for="facebook_url">Facebook URL</label>
              <input type="text" class="form-control" id="facebook_url" name="facebook_url" value="{{ $contactpageStructures->facebookUrl->text }}" required>
            </div>
    
            <div class="form-group">
              <label for="instagram_url">Instagram URL</label>
              <input type="text" class="form-control" id="instagram_url" name="instagram_url" value="{{ $contactpageStructures->instagramUrl->text }}" required>
            </div>
    
            <div class="form-group">
              <label for="twitter_url">Twitter URL</label>
              <input type="text" class="form-control" id="twitter_url" name="twitter_url" value="{{ $contactpageStructures->twitterUrl->text }}" required>
            </div>
    
            <div class="form-group">
              <label for="linkedin_url">LinkedIn URL</label>
              <input type="text" class="form-control" id="linkedin_url" name="linkedin_url" value="{{ $contactpageStructures->linkedinUrl->text }}" required>
            </div>
    
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>    
</section>
@endsection