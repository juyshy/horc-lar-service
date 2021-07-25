<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Chat;
 
class ChatController extends Controller
{
    public function index(Request $request) {
        return Chat::all();
    }

    public function add(Request $request) {
        $cm = new Chat;
        $cm->text = $request->text;
        $cm->save();
        return $cm;
    }
}
