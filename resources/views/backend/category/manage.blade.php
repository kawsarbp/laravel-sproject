@extends('backend.app')
@section('title','Manage Category')
@section('main-conteant')

@if(session()->has('message'))
    <div class="alert alert-{{ session('type') }}">{{ session('message') }}</div>
@endif
<br>
<div style="width: 50%; margin: auto;">
    <a href="{{ route('admin.category.create') }}">Add Category</a>
</div>
<br>
<table class="table table-bordered table-hover table-striped" border="" style="width: 80%; margin: auto;">
    <tr>
        <th>#</th>
        <th>Category Name</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach($categories as $category)
        <tr>
            <td>{{ ++$loop->index }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->status }}</td>
            <td>
                <a href="{{ route('admin.category.show',$category->id) }}">Show</a>
                <a href="{{ route('admin.category.edit',$category->id) }}">Edit</a>
                <form action="{{ route('admin.category.destroy',$category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
{{--                    <button type="submit">Delete</button>--}}
                    <a href="{{ route('admin.category.destroy',$category->id) }}" onclick="event.preventDefault();this.closest('form').submit()" >Delete</a>
                </form>

            </td>
        </tr>
    @endforeach
</table>


@endsection
