<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Photo;


class PhotoController extends Controller
{
    public function index(Request $request) {
        return Photo::all();
    }

    public function store(Request $request) {
        $filePath = $request->filePath;
        
        $path_parts = pathinfo( $filePath);
        $name =$path_parts['filename']; 
        $photo = new Photo;
        $photo->filePath =$filePath;
        $photo->name = $name;
        $photo->save();
        return $photo->toJson();
    }

/*     public function store(Request $request) {
        $path = $request->file->store('public');
        $path = str_replace('public/', '', $path);

        $photo = new Photo;
        $photo->filePath = $path;
        $photo->name = $request->file->getClientOriginalName();
        $photo->save();
        return $photo->toJson();
    } */
}
