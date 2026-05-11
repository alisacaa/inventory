<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return response()->json(Genre::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $genre = Genre::create($request->all());
        return response()->json($genre, 201);
    }

    public function show($id)
    {
        $genre = Genre::find($id);
        if (!$genre) return response()->json(['message' => 'Genre not found'], 404);
        return response()->json($genre, 200);
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        if (!$genre) return response()->json(['message' => 'Genre not found'], 404);
        $genre->update($request->all());
        return response()->json($genre, 200);
    }

    public function destroy($id)
    {
        $genre = Genre::find($id);
        if (!$genre) return response()->json(['message' => 'Genre not found'], 404);
        $genre->delete();
        return response()->json(['message' => 'Genre deleted successfully'], 200);
    }
}