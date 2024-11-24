<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genres;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genres::All();

        return view('genres.index', ['genres' => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:1',
        ],
        [
            'required' => 'inputan :attribute harus di isi.',
        ]
        );

        $genres = new genres;
        $genres->name = $validatedData['name'];

        $genres->save();
        return redirect('/genres');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genres = Genres::find($id);

        return view('genres.show', ['genres' => $genres]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genres = Genres::find($id);

        return view('genres.edit', ['genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:1',
        ],
        [
            'required' => 'inputan :attribute harus di isi.',
        ]
        );

        $genres = Genres::find($id);
        $genre = new genres;
        $genres->name = $validatedData['name'];

        $genres->save();
        return redirect('/genres');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genres = Genres::find($id);
        $genres->delete();
        return redirect('/genres');
    }
}
