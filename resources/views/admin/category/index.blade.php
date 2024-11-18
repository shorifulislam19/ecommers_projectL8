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
            <tr style="text-align: center" >
                <th>Sl No</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ShowCategory as $key => $category)
                <tr style="text-align: center">
                    <td >{{ $key + 1 }}</td>
                    <td >{{ $category->name }}</td>
                    <td >{{ $category->description }}</td>
                    <td >
                        <img src="{{ asset('category/' . $category->image) }}" alt="Category Image" width="50" height="50">
                    </td>
                    <td >
                        @if ($category->status==1)
                        <span class="btn btn-success">Active</span>
                        @else
                        <span class="btn btn-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="row">
                        <div class="span3"></div>
                        <div class="span2">
                            @if ($category->status==1)
                            <a href="{{ url('/cat-status'.$category->id) }}" class="btn btn-success mr-2">
                                <i class="fas fa-thumbs-down"></i>
                            </a>
                            @else
                             <a href="{{ url('/cat-status'.$category->id) }}" class="btn btn-success mr-2">
                                <i class="fas fa-thumbs-up"></i>
                            </a>
                            @endif
                        </div>

                        <div class="span2">
                            <a href="#" class="btn btn-info mr-2">Edit</a>
                        </div>


                        <div class="span2">
                            <a href="#" class="btn btn-danger ">Delete</a>
                        </div>

                        <div class="span3"></div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
