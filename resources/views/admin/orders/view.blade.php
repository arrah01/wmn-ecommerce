@extends('layouts.app')

@section('content')

<div class=" container py-4 mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class=" card">
                <div class="card-header bg-primary text-capitalize">
                    <h4 class="text-white"> Order View
                        <a href="{{route('admin.orders')}}" class="btn btn-outline-primary bg-white text-dark float-end"> Back</a>
                    </h4>
                </div>
                <div class="table-responsive card-body">
                    <div class="row">
                        <div class=" col-md-6">
                            <h4>Shipping Details</h4>
                            <hr>
                            <label for="">First Name</label>
                            <div class="border p-2" >{{$orders->fname}}</div>
                            <label for="">Last Name</label>
                            <div class="border p-2" >{{$orders->lname}}</div>
                            <label for="">Email</label>
                            <div class="border p-2" >{{$orders->email}}</div>
                            <label for="">Contact</label>
                            <div class="border p-2" >{{$orders->phone}}</div>
                            <label for="">shipping Address</label>
                            <div class="border p-2" >
                                {{$orders->address1}}, <br>
                                {{$orders->address2}}, <br>
                                {{$orders->city}}, <br>
                                {{$orders->state}}
                                {{$orders->country}}
                            </div>
                            <label for="">Zip code</label>
                            <div class="border p-2" >{{$orders->pincode}}</div>


                        </div>
                        <div class=" col-md-6">
                            <h4>Order Details</h4>
                            <hr>
                            <table id="order-listing" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($orders->orderitem as $item )
                                        <tr>
                                            <td>{{$item->product->name}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>
                                                <img src="{{asset('storage/product_pic/'.$item->product->image) }}" width="70px" height="70px" alt="">
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <h4 class="py-3"> Grand Total: ${{$orders->total_price}}</h4>
                            <div class="mt-3">
                                <label for="status"> Order Status</label>
                                <form action="{{route('admin.update.orders', $orders->id)}}" method="POST">
                                    @csrf
                                        <select name="order_status" class="form-select mb-3">
                                            <option  {{$orders->status == '0'?'selected':''}}value="0">Pending </option>
                                            <option  {{$orders->status == '1'?'selected':''}} value="1">Completed</option>                                                                             
                                        </select>
                                        <button type="submit" class="btn btn-primary float-end">Update</button>
                                  </form>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection