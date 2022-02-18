@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Post title goes here....</h1>
            <div class="metadata">
                <div class="card-footer clearfix mb-4" style="background: transparent;">
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

            <div class="post-text">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi, facilis eaque! Cupiditate voluptatum minima, eius maxime sint error necessitatibus, ducimus veniam ad unde perspiciatis eum itaque enim qui similique possimus inventore placeat dicta quam sequi! Laudantium temporibus nihil aliquam soluta eos asperiores quae non atque debitis! Obcaecati aperiam architecto quia!</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi, facilis eaque! Cupiditate voluptatum minima, eius maxime sint error necessitatibus, ducimus veniam ad unde perspiciatis eum itaque enim qui similique possimus inventore placeat dicta quam sequi! Laudantium temporibus nihil aliquam soluta eos asperiores quae non atque debitis! Obcaecati aperiam architecto quia!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quasi accusantium natus facere fugit amet, repellendus quae corporis. Atque deserunt, pariatur cupiditate quasi velit delectus cumque aliquam sequi debitis reiciendis eos fuga nobis impedit? Asperiores deleniti mollitia accusamus possimus? Fuga consequuntur modi soluta? Ipsam ad, repudiandae esse, asperiores tenetur veritatis vitae dolorum quia iste id corrupti. Incidunt vero laborum sapiente natus asperiores porro ipsa, et aliquam rerum quam suscipit repellat odit. Dolor quod, sit perferendis fugit quisquam possimus maxime ab dolores rem minus, saepe voluptate, accusamus libero quia nostrum? Quo deleniti expedita sapiente iure asperiores architecto non deserunt? A, odio ex.</p>
            </div>
        </div>
        <div class="col-sm-12">
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