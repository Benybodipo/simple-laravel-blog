@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="action mb-4 clearfix">
            <form method="POST" action="{{route('post.destroy', [$post])}}">
                @csrf
                <button class="btn btn-sm btn-danger">
                    <i class="fa-solid fa-trash-can"></i>
                    Delete
                </button>
                @method('DELETE')
            </form>
            <form method="GET" action="{{route('post.edit', [$post])}}">
                <button class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Edit
                </button>
            </form>
        </div>
        <div class="col-sm-12">
            <h1>{{$post->title}}</h1>
            <div class="metadata">
                <div class="card-footer clearfix mb-4" style="background: transparent;">
                    <div class="author">
                        <i class="fa-solid fa-user"></i>
                        <span class="auth-name">
                            <a href="{{1}}">#{{$post->author->name}}</a>
                        </span>
                    </div>
                    <div class="posted-date">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span class="date">{{$post->created_at->diffForHumans()}}</span>
                    </div>
                    <div class="likes">
                        <form method="POST" action="{{route('like', [$post->id])}}">
                            <label for="like-btn">
                                <?php $user_id = 1; ?>
                                <i 
                                    class="fa-{{($i_liked_it || $post->user_id == $user_id) ? 'solid' : 'regular'}} fa-heart"></i>
                            </label>
                            @csrf
                            <button class="btn btn-sm btn-primary hide" id="like-btn" ></button>
                        </form>
                        <span class="like-count">{{count($post->likes)}}</span>
                    </div>
                    <div class="comments">
                        <i class="fa-solid fa-comments"></i>
                        <span class="comment-count">{{count($post->comments)}}</span>
                    </div>
                </div>
            </div>

            <div class="post-text clearfix mb-4 pb-4">
                {!!$post->content !!}
            </div>
        </div>
        {{-- Comments area --}}
        <div class="col-sm-12 mt-4">
            <h3>Comments</h3>
            <div class="comment-list">
                @foreach ($post->comments as $comment)
                    <div class="comment">
                        <div class="text">
                            <p>{{$comment->content}}</p>
                        </div>
                        <div class="meta">
                            <span class="user mr-4">
                                <i class="fa-solid fa-user mr-2"></i>
                                <span class="auth-name">
                                    <a href="">#{{$comment->user->name}}</a>
                                </span>
                            </span>
                            <span class="date">
                                <i class="fa-solid fa-calendar-days"></i>
                                <span class="">{{$comment->created_at->diffForHumans()}}</span>
                            </span>
                        </div>
                    </div>  
                @endforeach
            </div>
            <form action="{{route('comment', $post->id)}}" method="POST">
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea name="content" class="form-control richTextBox" id="comment" rows="3" placeholder="comment"></textarea>
                    @error('comment') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <input type="hidden" name="post_id" value="{{$post->id}}">
                @csrf
                <button type="submit" class="btn btn-primary">Comment</button>
            </form>
        </div>
    </div>
@endsection