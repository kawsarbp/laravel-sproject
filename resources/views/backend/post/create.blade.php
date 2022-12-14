@extends('backend.app')
@section('title','New Post')
@section('main-conteant')

    <div class="row justify-content-center">
        <div class="col-md-8">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('message'))
                <div class="alert alert-{{ session('type') }}">{{ session('message') }}</div>
            @endif
            <br>
            <div style="width: 50%; margin: auto;">
                <a href="{{ route('admin.post.index') }}">Mange Post</a>
            </div>
            <br>

            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="category">Category</label>
                    <select name="category" class="form-select" id="category">
                        <option value="">Selected</option>
                        @foreach($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" value="{{ old('title') }}" id="title" name="title" placeholder="Title">
                </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="mb-3">
                    <label for="Description">Description</label>
                    <textarea name="description" id="Description" cols="5" rows="3" class="form-control">{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <lable><input type="radio" name="status" value="active"  > Active</lable>
                    <lable><input type="radio" name="status" value="inactive"> Inactive</lable>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-outline-primary">Add Post</button>
                </div>

            </form>

        </div>
    </div>

@endsection
