<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
    @include('partials.header')

    @php
        $route_name = Route::currentRouteName();
        $condition = in_array($route_name, ['post.index', 'posts-per-user', 'posts-per-category','home']);
        $order_by = '';
        $sort = '';
        if (request()->input('orderby'))
        {
            $order_by = app('request')->input('orderby');
            $sort = app('request')->input('sort');
        }
    @endphp
    <div class="container" id="main-container">
        @if ($condition)
            <div id="filter-area" class="mb-4">
                <form class="row g-3" style="max-width: 400px;" action="{{route('posts-per-category')}}">
                    <div class="col-auto">
                        <i class="fas fa-sort"></i>
                        <select class="form-select form-select-sm" name="orderby" aria-label="Default select example">
                            <option selected disabled>Order by</option>
                            <option value="created_at" {{($order_by == 'created_at') ? 'selected': ''}}>Date</option>
                            <option value="title" {{($order_by == 'title') ? 'selected': ''}}>Title</option>
                            <option value="user_id" {{($order_by == 'user_id') ? 'selected': ''}}>User</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-sort-amount-down"></i>
                        <select class="form-select form-select-sm" name="sort" aria-label="Default select example">
                            <option selected disabled>Sort</option>
                            <option value="asc" {{($sort == 'asc') ? 'selected': ''}}>Ascending</option>
                            <option value="desc" {{($sort == 'desc') ? 'selected': ''}}>Descending</option>
                        </select>
                    </div>
                    
                    <div class="col-auto">
                        <button type="submit" class="btn btn-sm btn-primary mb-3">
                        Search
                        </button>
                    </div>
                </form>
            </div>            
        @endif
        <div class="row {{($route_name == 'post.index' || $route_name == 'posts-per-user') ? '' : 'justify-content-center'}}">
            @if ($condition)
                <aside id="categories" class="col-sm-3">
                    <div class="card">
                        <div class="card-header">
                            Categories
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="">All</a>
                            </li>
                            @foreach ($categories as $category)
                                <li class="list-group-item">
                                    <a href="{{route('posts-per-category', $category->id)}}">{{$category->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            @endif
            <main class="col-sm-9">
    
                @yield('content')
            </main>
        </div>
    </div>
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: '#content'
        });
    </script>
</body>
</html>