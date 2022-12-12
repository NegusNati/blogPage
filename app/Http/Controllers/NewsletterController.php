<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {

     


        request()->validate([
            'email' => ['required', 'email']
        ]);
        try {

            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => "This email could not be added to our newsletter, try another one"
            ]);
        }

        return redirect('/')->with('success', "You have signed up for the awesome  Newsletter!");
    }
}
