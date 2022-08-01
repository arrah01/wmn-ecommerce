@extends('layouts.front')

@section('front_content')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a>
                    <a href="{{route('view.catergories', $catergories->slug)}}">{{$catergories->name}}</a>
                    {{-- <span>{{$products->name}} </span> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<div class="py-5">
    <div class="container">
        <div class="section-title">
            <h4>{{$catergories->name}}</h4>
        </div>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-3 mt-3">
                <div class="card product__item">
                    <a href="{{url('view_catergory/'.$catergories->slug. '/'.$product->slug )}}">
                        <img src="{{ asset('storage/product_pic/'. $product->image ) }}">
                        <ul class="product__hover">
                            <li><a href="{{asset('storage/product_pic/'. $product->image ) }}" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                        <div class="card-body product__item__text">
                            <h6><a href="#">{{$product->name}}</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">{{$product->selling_price}}<span class="text-danger"> {{$product->original_price}}</span></div>
                        </div>
                   </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
