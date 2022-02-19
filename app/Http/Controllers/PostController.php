<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();

        return view('pages.home')
            ->with(compact('posts'))
            ->with(compact('categories'));
    }

    public function getUserPosts($user_id)
    {
       $posts = Post::where('user_id', $user_id)->get();
       $categories = Category::all();

       return view('pages.home')
            ->with(compact('posts'))
            ->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.create-post')
            ->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $request['user_id'] = auth()->user()->id;
        // dd($request->all());

        $post = Post::create($request->all());
        return \Redirect::route('post.show', [$post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = auth()->user()->id; # Will put auth id
        $post = Post::whereId($id)->first();

        $i_liked_it = Like::where('post_id', $id)
                            ->where('user_id', $user_id)
                            ->first();
        $i_liked_it = !is_null($i_liked_it);
            
        return view('pages.post')
                ->with(compact('i_liked_it'))
                ->with(compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (auth()->user()->id != $post->user_id){
            return back();
        }
        
        $categories = Category::all();

        return view('pages.edit-post')
            ->with(compact('post'))
            ->with(compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'category_id' => 'required',
            'content' => 'required',
        ]);

        $id = $post->id;

        unset($request['_token']);
        unset($request['_method']);

        $post = Post::whereId($id)
                    ->update($request->all());
        return \Redirect::route('post.show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::whereId($post->id)->delete($post);
        return \Redirect::route('post.index');
    }
}
