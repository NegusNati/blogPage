<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function create()
    {
        return view(view: 'register.create');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $attribute = $this->validate($request, [
            'name' => ['required', 'max:255'],
            'userName' => ['required', 'min:3','max:255',Rule::unique('users','userName')],
            'email' => ['required', 'max:255', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:7', 'max:255']
        ]);


        User::create($attribute);
//        User::create(
//            \request()->validate(
//                [
//                    'name' => ['required'],
//                    'username' => ['required', 'min:3'],
//                    'email' => ['required', 'max:255', 'email'],
//                    'password' => ['required', 'min:7']
//                ]
//            )
//        );



        return redirect('/');
    }

}

