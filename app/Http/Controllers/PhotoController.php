<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Photo;


class PhotoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api' );
    }
    
    public function index(Request $request) {
        //return Photo::all();
        $perPage= $request->get('perPage') | 50;
        $page= $request->get('page') | 0 ;
        $paginatedPhotos= Photo::paginate($perPage,['*'],  'page',  $page);
        return $paginatedPhotos;
    }


    public function show(Request $request,  $id) {
        $photo=Photo::find($id); 
 
        return $photo;
    }

    public function update(Request $request, $id) {
 
        $photo=Photo::find($id); 
        $notes = $request->notes;
        $casetteNums = $request->casetteNums;
        if($notes != null) {
            $photo->notes = $notes ;
        }
        if($casetteNums != null) {
            $photo->casetteNums = $casetteNums ;
        }
        $photo->save();
        return $photo->toJson();
    }

    public function destroy($id) {
        $photo = Photo::find($id);
        $name = $photo->name;
        $photo->delete();
        return 'Deleted photo '.$id . ' ' . $name ;
    }

    public function store(Request $request) {
        $filePath = $request->filePath;
        
        $path_parts = pathinfo( $filePath);
        $name =$path_parts['filename']; 
        $photo = new Photo;
        $photo->filePath =$filePath;
        $photo->name = $name;
        $photo->taken = $request->taken;
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
