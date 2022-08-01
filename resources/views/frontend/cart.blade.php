@extends('layouts.front')

@section('front_content')

 <!-- Breadcrumb Begin -->
 <div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a>
                    <span>Shopping cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
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
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total= 0;
                                $item_total;
                            @endphp
                            @foreach ($cartitems as $cartitem)
                                <tr>
                                    <td class="cart__product__item">
                                        <img width="70px" height="70px" src="{{asset('storage/product_pic/'.$cartitem->product->image) }}" alt="">
                                        <div class="cart__product__item__title">
                                            <h6>{{$cartitem->product->name}}</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">${{$cartitem->product->selling_price}}</td>
                                    <td class="cart__quantity">
                                        @if ($cartitem->product->qty >= $cartitem->product_qty )
                                        <div class="pro-qty">
                                            <input type="text" value="{{$cartitem->product_qty}}">
                                        </div>
                                        @else
                                        <h6 class="text-danger"> Out of Stock</h6>
                                        @endif

                                    </td>
                                    @php
                                    $item_total = $cartitem->product->selling_price * $cartitem->product_qty;
                                   @endphp
                                    <td class="cart__total">${{$item_total }}</td>
                                    <td class="cart__close">
                                        <form class="d-inline" method="POST" action="{{route('delete.cart' , $cartitem->id )}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="icon_close border-0 btn btn-danger" ></button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                   $total += $cartitem->product->selling_price * $cartitem->product_qty;
                               @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="{{route('shop')}}">Continue Shopping</a>
                </div>
            </div>
            {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn update__btn">
                    <form action="{{route('update.cart')}}" method="POST" class="d-inline">
                        @csrf
                       <button type="submit" class="border-0"><span class="icon_loading"></span> Update cart</button>
                   </form>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-lg-6">

            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Cart total</h6>
                    <ul>

                        <li>Total Price :<span>$ {{$total}}</span></li>
                    </ul>
                    <a href="{{route('checkout')}}" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Cart Section End -->


@endsection
