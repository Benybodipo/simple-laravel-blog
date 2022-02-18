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
                        <i class="fa-{{(1 > 2) ? 'regular' : 'solid'}} fa-heart"></i>
                        <span class="like-count">5</span>
                    </div>
                    <div class="comments">
                        <i class="fa-solid fa-comments"></i>
                        <span class="comment-count">67</span>
                    </div>
                </div>
            </div>

            <div class="post-text clearfix mb-4 pb-4">
                {!!$post->content !!}
            </div>
        </div>
        <div class="col-sm-12 mt-4">
            <h3>Comments</h3>
            <div class="comment-list">
                @for ($i = 0; $i < 10; $i++)
                    <div class="comment">
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae eum est ipsum officiis provident velit quisquam quae error accusamus praesentium, vel ut ratione in consectetur?</p>
                        </div>
                        <div class="meta">
                            <span class="user">
                                <i class="fa-solid fa-user mr-2"></i>
                                <span class="auth-name">#borolong</span>
                            </span>
                            <span class="date">
                                <i class="fa-solid fa-calendar-days"></i>
                                <span class="">25-02-2022</span>
                            </span>
                        </div>
                    </div>  
                @endfor
            </div>
            <form action="">
                
            </form>
        </div>
    </div>
@endsection