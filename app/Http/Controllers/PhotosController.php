<?php

namespace App\Http\Controllers;
use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Photo;
class photosController extends Controller{
    public function create($id){
        return view('photos.create');

    }
    // public function store(Request $request, $id)
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'image:max:7999|required',
        ]);
        $fullFilename = $request->file('photo');
        $filename = pathinfo($fullFilename, PATHINFO_FILENAME);
        $extension = $fullFilename->getClientOriginalExtension();
        $filenameToStore = $filename . "_" . time() . "." . $extension;
        $path = $fullFilename->storeAs('public/photos', $filenameToStore);
        //$path = $fullFilename->storeAs('public/photos/'.$id, $filenameToStore);
        $photo = new Photo;
        $photo->title = $request->input('title');
        $photo->photo = $path;
        $photo->save();
        return redirect('/albums')->with('success', 'Uploaded Photo');
    }
    public function show($id){
        $photo = Photo::find($id);
        return view('photos.show')->with('photo', $photo);
    }
    public function destroy($id){
        $photo = Photo::find($id);
        $album_id = $photo->album_id;
        if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
            $photo->delete();
        }
        return redirect('/albums/'.$album_id)->with('success', 'Photo Deleted!');
    }
//    public function destroy($id){
//        $photo = Photo::find($id);
//        $album_id = $photo->album_id;
//        if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
//            $photo->delete();
//        }
//        return redirect('/albums/'.$album_id)->with('success', 'Photo Deleted!');
//    }
}
