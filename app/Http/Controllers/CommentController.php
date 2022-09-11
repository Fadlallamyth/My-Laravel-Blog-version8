<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->comment = $request->input('comment');  
        $comment->post_id = $request->input('post_id');  
        $comment->save();
        return redirect()->back();
    }
}
