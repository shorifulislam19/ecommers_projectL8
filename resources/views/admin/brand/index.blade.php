@extends('admin.admin_master')
<title>@yield('title', 'Brand')</title>
@section('content')
<div class="container mt-4">
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
<h2> All Brand</h2>

    <table class="table table-bordered">
        <thead>
            <tr style="text-align: center" >
                <th>Sl No</th>
                <th>Brand Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $key => $brand)
                <tr style="text-align: center">
                    <td >{{ $key + 1 }}</td>
                    <td >{{ $brand->name }}</td>
                    <td >{{ $brand->description }}</td>
                    <td >
                        @if ($brand->status==1)
                        <span class="btn btn-success">Active</span>
                        @else
                        <span class="btn btn-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="row">
                        <div class="span3"></div>
                        <div class="span2">
                            @if ($brand->status==1)
                            <a href="{{ url('/brand-status'.$brand->id) }}" class="btn btn-success mr-2">
                                <i class="fas fa-thumbs-down"></i>
                            </a>
                            @else
                             <a href="{{ url('/brand-status'.$brand->id) }}" class="btn btn-success mr-2">
                                <i class="fas fa-thumbs-up"></i>
                            </a>
                            @endif
                        </div>

                        <div class="span2">
                            <a href="{{ url('/brands/'.$brand->id.'/edit') }}" class="btn btn-info mr-2">Edit</a>
                        </div>


                        <div class="span2">
                            <form action="{{ url('/brands/'.$brand->id.'destroy') }}" method="post">
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
