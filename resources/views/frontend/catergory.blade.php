@extends('layouts.front')

@section('front_content')


<div class="py-5">
    <div class="container">
        <div class="section-title text-center">
            <h4>Catergories</h4>
        </div>
        <div class="row">
            @foreach ($catergories as $catergory)
            <div class="col-md-3 mt-3">
                <a href="{{route('view.catergories', $catergory->slug)}}">
                <div class="card product__item">
                    <img src="{{ asset('storage/catergory_pic/'. $catergory->image ) }}">
                    <div class="card-body product__item__text">
                        <h6><a href="#">{{$catergory->name}}</a></h6>
                        <p>{{$catergory->description}}</p>
                    </div>
                </div>
               </a>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection