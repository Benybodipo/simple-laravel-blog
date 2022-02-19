<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class LikeController extends Controller
{
    public function like(Request $request, $post_id)
    {
        $user_id = auth()->user()->id; # Will use authenticated user id
        $post = Post::whereId($post_id)->where('user_id', '!=', $user_id)->first();

        if ($post)
        {
            $like = Like::where('user_id', $user_id)->where('post_id', $post_id);

            if ($like->first())
            {
                $like->delete();
            }
            else{
                Like::create(['user_id' => $user_id, 'post_id' => $post_id]);
            }
        }
        return back();

    }
}
