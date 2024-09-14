<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:45',
            'gameplay' => 'required',
            'developer' => 'required|max:45',
            'year' => 'required|integer',
        ]);

        DB::table('games')->insert([
            'name' => $request->name,
            'gameplay' => $request->gameplay,
            'developer' => $request->developer,
            'year' => $request->year,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('games.index')->with('success', 'Game berhasil ditambahkan');

    }

    public function index()
    {
        $games = DB::table('games')->get();
        return view('games.index', ['games' => $games]);
    }

    public function show($id)
    {
        $game = DB::table('games')->find($id);
        return view('games.show', ['game' => $game]);
    }


    public function edit($id)
    {
        $game = DB::table('games')->find($id);
        return view('games.edit', ['game' => $game]);
    }

    public function update($id, Request $request)
    {
        DB::table('games')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'gameplay' => $request->input('gameplay'),
                'developer' => $request->input('developer'),
                'year' => $request->input('year'),
            ]);

        return redirect('/games');
    }

    public function destroy($id)
    {
        DB::table('games')->where('id', $id)->delete();
        
        return redirect('/games');
    }
}
