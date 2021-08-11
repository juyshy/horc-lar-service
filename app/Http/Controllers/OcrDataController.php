<?php

namespace App\Http\Controllers;

use App\Models\OcrData;
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
    public function store(Request $request ) {
        /* $photo_id=$request->photo_id;
        $photo =   Photo::find($photo_id);
        $ocrData = $photo->ocrData ; */

        $ocrData_id=$request->id;
        $ocrData =   OcrData::find($ocrData_id);

       
        $hocr_edited=$request->hocr_edited;
        
        $ocrData->hocr_edited =$hocr_edited;
 
        $ocrData->save();
        return 'saved edited horc for image '.$ocrData->id . ' ' .$hocr_edited;
    }
}
