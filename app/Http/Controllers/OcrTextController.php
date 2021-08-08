<?php

namespace App\Http\Controllers;
use \App\Models\OcrText;
use \App\Models\Photo;

use Illuminate\Http\Request;

class OcrTextController extends Controller
{
    public function index(Request $request) {
        
        return  "OcrTextController index";
    }
    public function show(Request $request,  $id) {
        $photo=Photo::find($id); 
        if($photo != null) {
            $ocrTextFil = $photo->name . '.txt';
            $filPath=storage_path('ocrtexts\\'.$ocrTextFil);
            if (file_exists($filPath)) {
                $filContents = file_get_contents($filPath);
                return $filContents;
            }
    }
        return response()->json(['message' => 'Not Found!'], 404);
    }
}
