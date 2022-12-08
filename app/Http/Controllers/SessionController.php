<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create(){
        return view('session.create');
    }

    public function store()
    {
        $attribute = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($attribute)){
            session()->regenerate(); // to combat session fixation
            return redirect('/')->with('success','Welcome Back!');
        }

        throw ValidationException::withMessages(["email" => ucwords('Incorrect credential, please input again')]);
//
//        return back()
//            ->withInput()
//            ->withErrors(["email" => ucwords('Incorrect credential, please input again')]);
    }

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success','Good Bye');
    }
}
