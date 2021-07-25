<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Comment;
 
class CommentController extends Controller
{
    public function index(Request $request, $photoId) {
        $photo = \App\Models\Photo::find($photoId);
        return $photo->comments;
    }

    public function add(Request $request, $photoId) {
        $c = new Comment;
        $c->text = $request->text;
        $c->photo_id = $photoId;
        $c->title = $request->title;
        $c->pubDate = $request->pubDate;
        $c->save();
 

        return $c;
    }
}
