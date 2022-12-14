<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>

<br>
@if(session()->has('message'))
    <div class="alert alert-{{ session('type') }}">{{ session('message') }}</div>
@endif
<br>
<br>
<div style="width: 50%; margin: auto;">
    <a href="{{ route('admin.category.index') }}">Manage Category</a>
</div>
<br>

<form action="{{ route('admin.category.store') }}" method="POST" style="width: 50%; margin: auto;">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @csrf
    <table>
        <tr>
            <td><label for="name">Category Name</label></td>
            <td><input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Category Name"></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <label><input type="radio" name="status" {{ old('status') === 'active' ? 'checked':'' }}  value="active"> Active</label>
                <label><input type="radio" name="status" {{ old('status') === 'inactive' ? 'checked':'' }} value="inactive"> Inactive</label>
            </td>
        </tr>
        <tr>

            <td><input type="submit" value="Save"></td>
        </tr>
    </table>
</form>


</body>
</html>
