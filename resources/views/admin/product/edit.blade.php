
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
                    <h2><i class="fa fa-edit"></i> Edit Product</h2>
                </div>

                <div class="card-body">
                    <form class="form-horizontal" action="{{ url('/products/' . $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- This is important for PUT requests -->

                        <div class="mb-3">
                            <label for="code" class="form-label">Product Code</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $product->code) }}">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Product Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Select Category</label>
                            <select class="form-control" id="category" name="category">
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->cat_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="subcategory" class="form-label">Select Sub Category</label>
                            <select class="form-control" id="subcategory" name="subcategory">
                                <option value="">-- Select SubCategory --</option>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ $product->subcat_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">Select Brand</label>
                            <select class="form-control" id="brand" name="brand">
                                <option value="">-- Select Brand --</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $product->br_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="unit" class="form-label">Select Unit</label>
                            <select class="form-control" id="unit" name="unit">
                                <option value="">-- Select Unit --</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}" {{ $product->unit_id == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="size" class="form-label">Select Size</label>
                            <select class="form-control" id="size" name="size">
                                <option value="">-- Select Size --</option>
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}" {{ $product->size_id == $size->id ? 'selected' : '' }}>{{ $size->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label">Select Color</label>
                            <select class="form-control" id="color" name="color">
                                <option value="">-- Select Color --</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}" {{ $product->color_id == $color->id ? 'selected' : '' }}>{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Product Images (Leave empty if no change)</label>
                            <input type="file" class="form-control" id="image" name="file[]" multiple>
                            @if ($product->image)
                                <p>Current Images:</p>
                                @foreach (explode('|', $product->image) as $image)
                                    <img src="{{ asset('image/' . $image) }}" width="100" height="100" alt="Product Image">
                                @endforeach
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Product Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="form-actions mt-4">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
