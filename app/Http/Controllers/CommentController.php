<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required',
            'post_id' => 'required',
        ]);

        $user_id = auth()->user()->id; # Will use authenticated user id
        $post = Post::whereId($request->post_id)->first();
        if ($post)
        {
            $request['user_id'] = $user_id;
            Comment::create($request->all());
        }
        return back();
    }
}
