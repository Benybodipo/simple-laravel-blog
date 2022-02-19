@extends('layouts.main')
@section('content')
    <section class="row">
        @if (!count($posts))
            <h5 class="text-center text-muted">No record found!</h5>
        @else
            @foreach ($posts as $post)
                <div class="col-sm-12">
                    <div class="card post">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{route('post.show', $post->id)}}" style="text-decoration: none;">
                                    {{$post->title}}
                                </a>
                            </h5>
                            <p class="card-text">{!! strlen($post->content) > 400 ? substr($post->content,0,400)."[...]" : $post->content !!}</p>
                        </div>
                        <div class="card-footer clearfix">
                            <div class="author">
                                <i class="fa-solid fa-user"></i>
                                <span class="auth-name">
                                    <a href="{{route('posts-per-user', $post->user_id)}}">
                                        {{(strlen($post->author->name) > 10) ? substr($post->author->name,0,10)."..." : $post->author->name}}
                                    </a>
                                </span>
                            </div>
                            <div class="posted-date">
                                <i class="fa-solid fa-calendar-days"></i>
                                <span class="date">{{$post->created_at->diffForHumans()}}</span>
                            </div>
                            <div class="likes">
                                <i class="fa-{{(1 > 2) ? 'regular' : 'solid'}} fa-heart"></i>
                                <span class="like-count">{{count($post->likes)}}</span>
                            </div>
                            <div class="comments">
                                <i class="fa-solid fa-comments"></i>
                                <span class="comment-count">{{count($post->comments)}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </section>
@endsection