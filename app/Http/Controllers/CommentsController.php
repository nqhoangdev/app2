<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\CommentFormRequest;

use App\Comment;

class CommentsController extends Controller
{
    //
    public function newComment(CommentFormRequest $request) {
        $comment = new Comment(array(
            'ticket_id' => $request->get('ticket_id'),
            'content' => $request->get('content')
        ));
        
        $comment->save();
        
        return redirect()->back()->with('status', 'You comment is created successfully!');
    }

}
