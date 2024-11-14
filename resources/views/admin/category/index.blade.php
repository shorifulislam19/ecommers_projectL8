@extends('admin.admin_master')
<title>@yield('title', 'Category')</title>
@section('content')
<div class="container mt-4">
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
<h2> All Category</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sl No</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ShowCategory as $key => $category)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->status ? 'Active' : 'Inactive' }}</td>
                    <td>

                        <a href="#" class="btn btn-info btn-sm">View</a>


                        <a href="#" class="btn btn-primary btn-sm">Edit</a>


                        <form action="#" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
