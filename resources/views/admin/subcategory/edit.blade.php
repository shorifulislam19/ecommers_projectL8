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
                    <h2><i class="fa fa-edit"></i> Edit Sub Category</h2>
                </div>

                <div class="card-body">
                    <form class="form-horizontal" action="{{ url('/sub-categories/'.$subcategory->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Sub Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $subcategory->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Select Category</label>
                            <select class="form-control" id="category" name="category">
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $subcategory->cat_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ $subcategory->description }}</textarea>
                        </div>

                        <div class="form-actions mt-4">
                            <button type="submit" class="btn btn-primary">Update Sub Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
