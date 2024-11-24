<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genres;
use App\Models\Films;
use Illuminate\Http\UploadedFile;
use File;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(){
        $this->middleware('auth')->except('index', 'show');
     }

    public function index()
    {
        $films = Films::All();

        return view('films.index', ['films' => $films]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genres::All();

        return view('films.create', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2',
            'summary' => 'required',
            'release_year' => 'required',
            'poster' => 'required|image|mimes:png,jpg,jpeg',
            'genre_id' => 'required|exists:genres,id'
        ],
        [
            'required' => 'inputan :attribute harus di isi.',
            'min' => 'inputan minimal :min karakter.',
            'image' => 'inputan :attribute harus berupa image',
            'exists' => 'inputan :attribute genre belum ada di resource'
        ]
        );

        $newImageNama = time().'.'.$request->poster->extension();

        $request->poster->move(public_path('images'), $newImageNama);

        $films = new films;
        $films->title = $validatedData['title'];
        $films->summary = $validatedData['summary'];
        $films->release_year = $validatedData['release_year'];
        $films->poster = $newImageNama;
        $films->genre_id = $validatedData['genre_id'];

        $films->save();
        return redirect('/films');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $films = Films::find($id);

        return view('films.show', ['films' => $films]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $films = Films::find($id);
        $genres = Genres::all();

        return view('films.edit', ['films' => $films, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2',
            'summary' => 'required',
            'release_year' => 'required',
            'poster' => 'image|mimes:png,jpg,jpeg',
            'genre_id' => 'required|exists:genres,id'
        ],
        [
            'required' => 'inputan :attribute harus di isi.',
            'min' => 'inputan minimal :min karakter.',
            'image' => 'inputan :attribute harus berupa image',
            'exists' => 'inputan :attribute genre belum ada di resource'
        ]
        );

        $films = Films::find($id);
        if ($request->has('poster')) {
            File::delete('images/'.$films->poster);

            $newImageNama = time().'.'.$request->poster->extension();

            $request->poster->move(public_path('images'), $newImageNama);

            $films->poster = $newImageNama;

        }
        $film = new films;
        $films->title = $validatedData['title'];
        $films->summary = $validatedData['summary'];
        $films->release_year = $validatedData['release_year'];
        $films->genre_id = $validatedData['genre_id'];

        $films->save();
        return redirect('/films');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $films = Films::find($id);

        if ($films->poster) {
            File::delete('images/'.$films->poster);
        }
        $films->delete();
        return redirect('/films');
    }
}
