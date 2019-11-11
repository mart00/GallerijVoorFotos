<?php

namespace App\Http\Controllers;
use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class albumsController extends Controller
{
    public function index()
    {
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'image:max:7999',
        ]);
        $fullFilename = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($fullFilename, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filenameToStore = $filename . "_" . time() . "." . $extension;
        $path = $request->file('image')->storeAs('public/album_covers', $filenameToStore);
        $album = new Album;
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;
        $album->save();

        return redirect('/albums')->with('success', 'Album Created!');
    }
    public function show($id){
        $album = Album::with('Photos')->find($id);
        return view('albums.show')->with('album', $album);
    }
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->delete();
        return redirect('albums/');
    }
    public function edit($id)
    {
        $album = Album::find($id);
        return view('albums.edit', compact('album'));
    }
    public function update($id)
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ]);
        $album = Album::find($id);
        $album->update($data);
        $this->storeImage($album);
        return redirect('albums/'. $album->id);
    }
    private function storeImage($album_cover)
    {
        if (request()->has('image')) {
            $album_cover->update([
                'cover_image' => request()->image->store('album_covers', 'public'),
            ]);
        }
    }

}
