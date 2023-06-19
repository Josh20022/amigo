<?php

namespace App\Models;

use App\Models\ContactpageText;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactpageStructure extends Model
{
    use HasFactory;

    public function title()
    {
        return $this->belongsTo(ContactPageText::class, 'title_id');
    }

    public function description()
    {
        return $this->belongsTo(ContactPageText::class, 'description_id');
    }

    public function formName()
    {
        return $this->belongsTo(ContactPageText::class, 'form_name_id');
    }

    public function formEmail()
    {
        return $this->belongsTo(ContactPageText::class, 'form_email_id');
    }

    public function formEmailMessage()
    {
        return $this->belongsTo(ContactPageText::class, 'form_email_message_id');
    }

    public function formMessage()
    {
        return $this->belongsTo(ContactPageText::class, 'form_message_id');
    }

    public function formNewsletter()
    {
        return $this->belongsTo(ContactPageText::class, 'form_newsletter_id');
    }

    public function formSubmit()
    {
        return $this->belongsTo(ContactPageText::class, 'form_submit_id');
    }

    public function officeTitle()
    {
        return $this->belongsTo(ContactPageText::class, 'office_title_id');
    }

    public function officeDesc()
    {
        return $this->belongsTo(ContactPageText::class, 'office_desc_id');
    }

    public function phoneTitle()
    {
        return $this->belongsTo(ContactPageText::class, 'phone_title_id');
    }

    public function phoneDesc()
    {
        return $this->belongsTo(ContactPageText::class, 'phone_desc_id');
    }

    public function facebookUrl()
    {
        return $this->belongsTo(ContactPageText::class, 'facebook_url_id');
    }

    public function instagramUrl()
    {
        return $this->belongsTo(ContactPageText::class, 'instagram_url_id');
    }

    public function twitterUrl()
    {
        return $this->belongsTo(ContactPageText::class, 'twitter_url_id');
    }

    public function linkedinUrl()
    {
        return $this->belongsTo(ContactPageText::class, 'linkedin_url_id');
    }
}
