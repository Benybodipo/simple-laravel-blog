@extends('layouts.main')
@section('content')
    <div class="row">
        <h1 class="mb-4">Create new post</h1>
        <form>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Category</label>
                <select class="form-select" name="category">
                    <option selected>-- Category --</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="conetent" class="form-label">Content</label>
                <textarea name="content" class="form-control richTextBox" id="content" rows="20" placeholder="Content" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
        </form>
    </div>
@endsection