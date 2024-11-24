<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;
use Illuminate\Support\facades\Auth;


class ReviewController extends Controller
{
    public function store(Request $request, $films_id)
    {
        $user_id = Auth::id();
        $validatedData = $request->validate([
            'content' => 'required'
        ],
        [
            'required' => 'inputan :attribute harus di isi.',
        ]
        );

        Reviews::create([
            'user_id' => $user_id,
            'film_id' => $films_id,
            'content' => $request->input("content"),
            'point' => $request->input("point")
        ]);

        return redirect('/films/'.$films_id);
    }

}
