<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel; // Assuming the model is named blogku
class ArtikelController extends Controller
{
    //

    public function index()
    {
        $artikel = Artikel::all();
        return view('home', compact('artikel'));
    }

    public function create()
    {
        return view('artikel.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
            'status' => 'required|in:Publish,Draft',
        ]);

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');

        Artikel::create([
            'title' => $request->title,
            'thumbnail' => $thumbnailPath,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show(string $id){
        
        $artikel = Artikel::findOrFail($id);
        return view('artikel.show', compact('artikel'));
    }
}
