@extends('backend.app')
@section('title','Manage Post')
@section('main-conteant')

    @if(session()->has('message'))
        <div class="alert alert-{{ session('type') }}">{{ session('message') }}</div>
    @endif
    <br>
    <div style="width: 50%; margin: auto;">
        <a href="{{ route('admin.post.create') }}">Add Post</a>
    </div>
    <br>
    <table class="table table-bordered table-hover table-striped" border="" style="width: 80%; margin: auto;">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Photo</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{ ++$loop->index }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td><img src="{{ asset('posts/'.$post->image) }}" alt="" style="width: 100px;"></td>
                <td>{{ $post->status }}</td>
                <td>
                    <a href="{{ route('admin.post.show',$post->id) }}">Show</a>
                    <a href="{{ route('admin.post.edit',$post->id) }}">Edit</a>
                    <form action="{{ route('admin.post.destroy',$post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('admin.post.destroy',$post->id) }}" onclick="event.preventDefault();this.closest('form').submit()" >Delete</a>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>


@endsection
