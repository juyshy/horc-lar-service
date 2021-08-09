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
    public function saveHocr($id){
        $ocrData = new OcrData;
        $ocrData->hocr = $this->fillOcrData2Db($id );
        $ocrData->photo_id = $id;
        $ocrData->ocr = $this->getOcrTextFromPhotoId($id );
        $ocrData->save();
    }

    public function fillAllHocrs(){

        $photos=Photo::all();
        $start =35;
        $stop= count($photos);
        for ($x = $start; $x < $stop; $x++) {
            $photo=$photos[$x];
            $id = $photo->id;
            $this->saveHocr($id);
          }

        return 'filled '. $start . ' to '. $stop .' ocrs';
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
