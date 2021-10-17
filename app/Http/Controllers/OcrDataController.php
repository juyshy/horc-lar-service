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

    
    
    public function latestSavedSelection2( ) {
 
        $ocrDatasId= DB::table('ocr_data')->select('id', 'photo_id')->whereRaw('saved_selection is not NULL')->orderBy('id','desc')->limit(1)->get();
        //$ocrDatas2->id
        return $ocrDatasId   ;
    }
    
    public function noSavedSelection( ) {
        $ocrDatasId= DB::table('ocr_data')->select('id', 'photo_id')->whereRaw('saved_selection is NULL')->get();
        return $ocrDatasId   ;
    }

    public function fillMissing() {
 
        return   $this->fillAllHocrs();
    }

    public function store(Request $request ) {
        /* $photo_id=$request->photo_id;
        $photo =   Photo::find($photo_id);
        $ocrData = $photo->ocrData ; */

        $ocrData_id=$request->id;
        $ocrData =   OcrData::find($ocrData_id);

        $hocr_edited=$request->hocr_edited;
        $ocrData->hocr_edited =$hocr_edited;
        $user_id = $request->user_id;
        $ocrData->user_id = $user_id ;
        $ocrData->save();
        return 'saved edited horc for image '.$ocrData->id . ' ' .$hocr_edited;
    }

    
    public function update(Request $request, $id) {
 
        $ocrData=OcrData::find($id); 
        $saved_selection = $request->saved_selection;
        $user_id = $request->user_id;
    
        if($saved_selection != null) {
            $ocrData->saved_selection = $saved_selection ;
            $ocrData->user_id = $user_id ;
            $ocrData->save();
            return 'ocrdata updated';
        }
        
        return 'nothing to update';
    }
    


    public function saveHocr($id){
        $ocrData = new OcrData;
        $ocrData->hocr = $this->fillOcrData2Db($id );
        $ocrData->photo_id = $id;
        $ocrData->ocr = $this->getOcrTextFromPhotoId($id );
        $ocrData->save();
    }

    public function fillAllHocrs(){

        $ocrDatas=OcrData::all()->toArray();
        $photos=Photo::all()->toArray();
        $start =35;
        $ocrDatasLen= count($ocrDatas);
        $photosLen= count($photos);
        $getId = function($photo) {
            return $photo['id'];
        };
        $getPhotoId = function($ocrData) {
            return $ocrData['photo_id'];
        };
        $photoIds= array_map($getId,$photos);
        $ocrDatasIds= array_map($getPhotoId,$ocrDatas);
        $missingHorcPhotoIds= array_diff( $photoIds,$ocrDatasIds);
        $missingHorcPhotoIdsCount=count($missingHorcPhotoIds);
        foreach($missingHorcPhotoIds as $photoId) {
                $this->saveHocr($photoId);
        }; 
        return   'photos '. $photosLen . ' ocrs: '. $ocrDatasLen .' ';
    }

    public function fillOcrData2Db($id){
        $photo=Photo::find($id); 
        if($photo != null) {
            $filContents = $this->getHOcr( $photo);
            return   $filContents;  
        }
        return response()->json(['message' => 'Not Found!'], 404);
    }

    public function getHOcr(Photo $photo){
        if($photo != null) {
            $ocrTextFil = $photo->name . '.hocr';
            $filPath=storage_path('hocrs\\'.$ocrTextFil);
            if (file_exists($filPath)) {
                $filContents = file_get_contents($filPath);
                return $filContents;
            }
         }
         return null;
    }

    public function getOcrText(Photo $photo){
        if($photo != null) {
            $ocrTextFil = $photo->name . '.txt';
            $filPath=storage_path('ocrtexts\\'.$ocrTextFil);
            if (file_exists($filPath)) {
                $filContents = file_get_contents($filPath);
                return $filContents;
            }
         }
         return null;
    }
    public function getOcrTextFromPhotoId($id)
    {
        $photo = Photo::find($id);
        if ($photo != null) {
            $filContents = $this->getOcrText($photo);
            return $filContents;
        }
        return null;
    }
}
