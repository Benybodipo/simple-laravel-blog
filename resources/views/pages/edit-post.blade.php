@extends('layouts.main')
@section('content')
    <div class="row">
        <h1 class="mb-4">Edit post</h1>
        <form method="POST" action="{{route('post.update', [$post])}}">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{$post->title}}">
                @error('title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    <option disabled selected>-- Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{($post->category_id == $category->id) ? 'selected' : ''}}>
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
                @error('category') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="conetent" class="form-label">Content</label>
                <textarea name="content" class="form-control richTextBox" id="content" rows="20" placeholder="Content" value="{{$post->content}}">
                    {!!$post->content!!}
                </textarea>
                @error('content') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            @csrf
            @method('PUT')
        </form>
    </div>
@endsection