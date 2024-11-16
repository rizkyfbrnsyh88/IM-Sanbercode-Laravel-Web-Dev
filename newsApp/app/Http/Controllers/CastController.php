<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CastController extends Controller
{
    
    public function create()
    {
        return view('cast.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2',
            'age' => 'required',
            'bio' => 'required',
        ],
        [
            'required' => 'inputan :attribute harus di isi.',
            'min' => 'inputan minimal :min karakter.    '
        ]
        );
        DB::table('casts')->insert([
            "name" => $validatedData["name"], 
            "age" => $validatedData["age"],
            "bio" => $validatedData["bio"]
        ]);
        return redirect('/cast');
    }

    public function index()
    {
        $cast = DB::table('casts')->get();
        return view('cast.index', compact('cast'));
    }

    public function show($id)
    {
        $cast = DB::table('casts')->where('id', $id)->first();
        return view('cast.show', compact('cast'));
    }

    public function edit($id)
    {
        $cast = DB::table('casts')->where('id', $id)->first();
        return view('cast.edit', compact('cast'));
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2',
            'age' => 'required',
            'bio' => 'required',
        ],
        [
            'required' => 'inputan :attribute harus di isi.',
            'min' => 'inputan minimal :min karakter.    '
        ]
        );

        $query = DB::table('casts')
            ->where('id', $id)
            ->update([
                'name' => $validatedData["name"],
                'age' => $validatedData["age"],
                'bio' => $validatedData["bio"]
            ]);
        return redirect('/cast');
    }

    public function destroy($id)
    {
        $query = DB::table('casts')->where('id', $id)->delete();
        return redirect('/cast');
    }
}
