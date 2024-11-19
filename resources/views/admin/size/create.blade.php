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
                    <h2><i class="fa fa-edit"></i> Add Sizes</h2>
                </div>

                <div class="card-body">

                    <form class="form-horizontal" action="{{ url('/sizes/') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Sizes</label>
                            <input type="text" class="form-control" id="input" data-role="tagsinput" name="size" >
                        </div>
                        <div class="form-actions mt-4">
                            <button type="submit" class="btn btn-primary">Add Unit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
