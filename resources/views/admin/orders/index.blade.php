@extends('layouts.app')

@section('content')

<div class=" container py-3">
    <div class="row">
        <div class="col-md-12">
            <div class=" card">
                <div class=" card-header text-white bg-primary text-capitalize">
                    <h4> New Orders
                        <a href="{{route('admin.history.orders')}}" class="btn btn-secondary float-end">Order History</a>
                    </h4>
                    
                    
                </div>
                <div class="table-responsive card-body">
                    <table id="order-listing" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order date </th>
                            <th>Tracking No</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order )
                        <tr>
                            <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
                            <td>{{$order->tracking_no}}</td>
                            <td>{{$order->total_price}}</td>
                            <td>{{$order->status == '0'?'pending':'completed'}}</td>
                            <td>
                                <a class="btn btn-outline-success" href ="{{route('admin.view.orders', $order->id)}}">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>


            </div>

        </div>

    </div>

</div>

@endsection