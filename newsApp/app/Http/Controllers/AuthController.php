<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function welcome(Request $request){
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        $gender = $request->input('gender');
        $nationality = $request->input('nationality');
        $languageSpoken = $request->input('languagespoken');
        $bio = $request->input('bio');

        return view('welcome', [
            'firstname' => $firstName,
            'lastname' => $lastName,
            'gender' => $gender,
            'nationality' => $nationality,
            'languagespoken' => $languageSpoken,
            'bio' => $bio,
        ]);

    }
}
