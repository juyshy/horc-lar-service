<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Models\Cassette;

class CassetteController extends Controller
{
    //
    public function store(Request $request) {
 
        $cassette = new Cassette;
 
        $cassette->hkinum = $request->hkinum;
        $cassette->num = $request->num;
        $cassette->album = $request->album;
        $cassette->lenght = $request->lenght;
        $cassette->side_numberings = $request->side_numberings;
        $cassette->textoncasette = $request->textoncasette;
        $cassette->desc_notes = $request->desc_notes;
        $cassette->event_date = $request->event_date;
        $cassette->digitized_date = $request->digitized_date;
        $cassette->borrow_copy_done = $request->borrow_copy_done;
        $cassette->kof_only = $request->kof_only;
        $cassette->audio_filename = $request->audio_filename;
        $cassette->photo_id = $request->photo_id;
        $cassette->save();
        return $cassette->toJson();
    }
}
