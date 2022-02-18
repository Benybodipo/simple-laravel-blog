@extends('layouts.main')
@section('content')
    <section class="row">
        @for ($i = 0; $i < 10; $i++)
            <div class="col-sm-6">
                <div class="card post">
                    <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci, assumenda debitis harum distinctio reiciendis eveniet sint. Error ipsa obcaecati exercitationem corrupti, quidem enim fugit numquam odit voluptatibus ullam et autem cum molest</p>
                    <a href="#" class="text-muted more">[...]</a>
                    </div>
                    <div class="card-footer clearfix">
                        <div class="author">
                            <i class="fa-solid fa-user"></i>
                            <span class="auth-name">#borolong</span>
                        </div>
                        <div class="posted-date">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span class="date">25-02-2022</span>
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
            </div>
        @endfor
    </section>
@endsection