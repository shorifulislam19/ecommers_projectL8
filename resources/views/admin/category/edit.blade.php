@extends('admin.admin_master')

@section('content')
<div class="container mt-4">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2><i class="fa fa-edit"></i> Edit Category</h2>
                </div>

                <div class="card-body">

                    <form class="form-horizontal" action="{{ url('/categories/'.$category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" >
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Category Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4"  >{{ $category->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Current Image</label>
                            @if ($category->image)
                                <div class="mb-2">
                                    <img src="{{ asset('category/' . $category->image) }}" alt="Category Image" width="100" height="100" class="img-thumbnail">
                                </div>
                            @else
                                <p>No image uploaded</p>
                            @endif

                            <label for="image" class="form-label mt-2">Change Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>


                        <div class="form-actions mt-4">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
