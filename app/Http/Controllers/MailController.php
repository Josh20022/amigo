<?php

namespace App\Http\Controllers;

use App\Mail\favorieten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendCustomEmail()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'age' => 30
        ];
    
        Mail::to('joshiawollrabe@gmail.com')->send(new favorieten($data));
    
        return "Custom email sent!";
    }
}
