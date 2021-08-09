<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Photo;

class OcrDataController extends Controller
{
    
    public function show(Request $request,  $id) {
        $photo=Photo::find($id); 
        $ocrData = $photo->ocrData ;
        if($ocrData != null) {
             
            return   $ocrData ;  
        }
        return response()->json(['message' => 'Not Found!'], 404);
    }
}
