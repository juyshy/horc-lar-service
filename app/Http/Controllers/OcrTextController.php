<?php

namespace App\Http\Controllers;
use \App\Models\OcrData;
use \App\Models\Photo;

use Illuminate\Http\Request;

class OcrTextController extends Controller
{
    public function index(Request $request) {

        //return $this->fillAllHocrs();
        ///$this->saveHocr(490);
        return   'index'; ///  'filled 490 '  .  ' ocr';
        
    }

/* 
    
 */

    public function show(Request $request,  $id) {
        $photo=Photo::find($id); 
        $ocrData = $photo->ocrData ;
        if($ocrData != null) {
             
            return   $ocrData ;  
        }
        return response()->json(['message' => 'Not Found!'], 404);
    }
}
