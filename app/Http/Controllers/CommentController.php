<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){

    }

    public function store( Request $request ) {
        $data = $request->validate([
            'comment' => 'required|string',
        ]);
        Comment::create([
            'user_id' => auth()->user()->user_id,
            'comment' => $data['comment'],
        ]);
        return back()->withSuccess('Comment has been published!');
    }

    public function like(Request $request)
    {
        $comment = Comment::findOrFail($request->commentId);
        $comment->increment('like');
        return response()->json(['success' => true, 'likes' => $comment->like]);
    }

    public function dislike(Request $request)
    {
        $comment = Comment::findOrFail($request->commentId);
        $comment->increment('dislike');
        return response()->json(['success' => true, 'dislikes' => $comment->dislike]);
    }

    public function reply(Request $request, Comment $comment)
    {
        $data = $request->validate([
            'reply_text' => 'required|string',
        ]);

        $reply = new Comment([
            'user_id' => auth()->user()->user_id,
            'comment' => $data['reply_text'],
            'is_reply' => 1,
            'reply_to' => $comment->comment_id,
        ]);

        $comment->replies()->save($reply);

        return back()->withSuccess('Replay has been send!');
        // return response()->json(['success' => true, 'reply' => $reply]);
    }
}
