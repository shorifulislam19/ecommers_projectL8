@extends('admin.admin_master')

@section('content')
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <p class="alert-success">
                <?php

                $message = Session::get('message');
                if($message)
                {
                    echo $message;
                    Session::put('message',null);
                }
                ?>
            </p>

        </div>


        <div class="box-content">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>SL No</th>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Order Total</th>
                    <th>Order Date & Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>



                        @foreach ($orders as $key=> $order)
                        <tbody>
                        <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{ $order->id }}</td>
                        <td class="center">{{ $order->customer->name }}</td>
                        <td class="center">{{ $order->total }}</td>
                        <td class="center">{{ \Carbon\Carbon::parse($order->created_at)->format('Md,Y,h:iA') }}</td>

                        <td class="center">

                            <span class="label label-success">Active</span>

                            <span class="label label-danger">Unactive</span>

                        </td>
                        <td class="center">
                            <!-- Thumbs Down -->
                            <a class="btn btn-danger" href="#">
                                <i class="fas fa-thumbs-down"></i>
                            </a>
                            <!-- Thumbs Up -->
                            <a class="btn btn-success" href="#">
                                <i class="fas fa-thumbs-up"></i>
                            </a>
                            <!-- Edit -->
                            <a class="btn btn-info" href="{{ url('/view-order/'.$order->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <!-- Trash -->
                            <a class="btn btn-danger" href="#" id="delete">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
                        @endforeach






            </table>


        </div>
    </div>

</div>


@endsection


