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
            'content' => $request->input('content'),
            'status' => $request->status,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show(string $id){
        
        $artikel = Artikel::findOrFail($id);
        return view('artikel.show', compact('artikel'));
    }


    public function edit(string $id)
    {
        $artikel = Artikel::findOrFail($id);

        return view('artikel.edit', compact('artikel'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
            'status' => 'required|in:Publish,Draft',
        ]);

        $artikel = Artikel::findOrFail($id);
        
        
            $artikel->update([
                'title' => $request->title,
                'content' => $request->input('content'),
                'status' => $request->status,
            ]);

            //update thumbnail jika ada file baru
        if($request->hasFile('thumbnail')){   
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $artikel->thumbnail = $thumbnailPath;
        }

        $artikel->update();

            return redirect()->route('artikel.show', $artikel->id)
            ->with('success', 'Artikel berhasil diperbarui.');

    }

    public function destroy(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
