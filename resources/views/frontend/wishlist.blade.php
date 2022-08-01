@extends('layouts.front')

@section('front_content')

 <!-- Breadcrumb Begin -->
 <div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a>
                    <span>Wishlist</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- wishlist Section Begin -->
<section class="shop-cart spad">
    <div class=" container my-5">
        <div class="card shadow">
            <div class="card-body">

                @if ($wishlists->count()>0)

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shop__cart__table">            
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                        
                                        @foreach ($wishlists as $wishlist)
                                            <tr>
                                                <td class="cart__product__item">
                                                    <img width="70px" height="70px" src="{{asset('storage/product_pic/'.$wishlist->product->image) }}" alt="">
                                                    <div class="cart__product__item__title">
                                                        <h6>{{$wishlist->product->name}}</h6>                                                        
                                                    </div>
                                                </td>
                                                <td class="cart__price">${{$wishlist->product->selling_price}}</td>
                                                <td class="cart__quantity">                                                    
                                                    <div class="pro-qty">
                                                        <input type="text" value="1">
                                                    </div>                                                 
                                                    
            
                                                </td>                                                
                                                <td class="cart__close">
                                                    <form class="d-inline" method="POST" action="{{route('delete.wishlist' , $wishlist->id )}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="icon_close border-0 btn btn-danger" ></button>
                                                    </form>
                                                </td>
                                            </tr> 
                                        @endforeach                                       
                                    </tbody>                                   
                                </table>
                            </div>
                        </div>
                    </div>                                        
                </div>                    
                @else
                    <h4 class="text-center"> There are no products or items in your wishlist</h4>
        
                @endif

            </div>
        </div>
    </div>
</section>
<!-- Wishlist Section End -->


@endsection