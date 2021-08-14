<?php

namespace App\Http\Controllers;

use App\Models\OcrData;
use Illuminate\Http\Request;
use \App\Models\Photo;
use Illuminate\Support\Facades\DB;

class OcrDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api' );
    }

    public function show(Request $request,  $id) {
        $photo=Photo::find($id); 
        $ocrData = $photo->ocrData ;
        if($ocrData != null) {
             
            return   $ocrData ;  
        }
        return response()->json(['message' => 'Not Found!'], 404);
    }

    
    
    public function latestSavedSelection( ) {
 
        $ocrDatasId= DB::table('ocr_data')->select('id', 'photo_id')->whereRaw('saved_selection is not NULL')->orderBy('id','desc')->limit(1)->get();
        //$ocrDatas2->id
        return $ocrDatasId   ;
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

    
    public function update(Request $request, $id) {
 
        $ocrData=OcrData::find($id); 
        $saved_selection = $request->saved_selection;
    
        if($saved_selection != null) {
            $ocrData->saved_selection = $saved_selection ;
        }
        $ocrData->save();
        return 'ocrdata updated';
    }
}
