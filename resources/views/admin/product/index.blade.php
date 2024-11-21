@extends('admin.admin_master')
<title>@yield('title', 'Product List')</title>

@section('content')
<div class="container mt-4">
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <h2>All Products</h2>

    <table class="table table-bordered">
        <thead>
            <tr style="text-align: center">
                <th>Sl No</th>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Category Name</th>
                <th>Sub Category Name</th>
                <th>Brand</th>
                {{-- <th>Unit</th>
                <th>Size</th>
                <th>Color</th> --}}
                <th>Image</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
            @php
                $product['image'] = explode("|", $product->image);
            @endphp
                <tr style="text-align: center">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->subcategory->name }}</td>
                    <td>{{ $product->brand->name }}</td>
                    {{-- <td>{{ $product->unit->name }}</td>
                    <td>{{ $product->size->size }}</td>
                    <td>{{ $product->color->color }}</td> --}}
                    <td>
                        @foreach ($product->image as $images )
                        <img src="{{ asset('image/' . $images) }}" alt="Product Image" width="50" height="50">
                        @endforeach
                    </td>
                    <td>{{ $product->description }}</td>
                    <td>
                        @if ($product->status == 1)
                            <span class="btn btn-success">Active</span>
                        @else
                            <span class="btn btn-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="row">
                        <div class="span3"></div>
                        <div class="span2">
                            @if ($product->status == 1)
                                <a href="{{ url('/product-status/'.$product->id) }}" class="btn btn-success mr-2">
                                    <i class="fas fa-thumbs-down"></i>
                                </a>
                            @else
                                <a href="{{ url('/product-status/'.$product->id) }}" class="btn btn-success mr-2">
                                    <i class="fas fa-thumbs-up"></i>
                                </a>
                            @endif
                        </div>

                        <div class="span2">
                            <a href="{{ url('/products/'.$product->id.'/edit') }}" class="btn btn-info mr-2">Edit</a>
                        </div>

                        <div class="span2">
                            <form action="{{ url('/products/'.$product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>

                        <div class="span3"></div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
