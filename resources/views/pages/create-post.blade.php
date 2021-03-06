@extends('layouts.main')
@section('content')
    <div class="row">
        <h1 class="mb-4">Create new post</h1>
        <form method="POST" action="{{route('post.store')}}">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                @error('title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    <option disabled selected>-- Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
                @error('category') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mb-3">
                <label for="conetent" class="form-label">Content</label>
                <textarea name="content" class="form-control richTextBox" id="content" rows="20" placeholder="Content"></textarea>
                @error('content') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Publish</button>
            @csrf
        </form>
    </div>
@endsection