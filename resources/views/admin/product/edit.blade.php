@extends('layouts.app')

@section('content')



        <form class="needs-validation" novalidate action="{{route('update.product', $products->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <select class="form-select">
                    <option value="">{{$products->catergory->name}}</option>
                </select>
            </div>
            <div class="mb-3 col-md-6">
                <label for="name">Name</label>
                <input name="name" value="{{ $products->name }}" type="text" class="form-control" id="name" >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" value="{{ $products->description }}" id="description" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="small_description" class="form-label"> small Description</label>
                <textarea name="small_description"  value="{{ $products->small_description }}"id="small_description" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class=" d-inline p-3 mb-3 col-md-6">
                <input name="original_price" type="text" value="{{ $products->original_price }}" class="form-control-sm btn-outline-info border-1" id="original_price" placeholder="Original price" >
            </div>
            <div class=" d-inline p-3 mb-3 col-md-6">
                <input name="selling_price" type="text" value="{{ $products->selling_price }}" class="form-control-sm btn-outline-success border-1" id="selling_price" placeholder=" Selling price" >
            </div>
            <div class=" d-inline p-3 mb-3 col-md-6">
                <input name="qty" type="text" id="qty" value="{{ $products->qty }}" class="form-control-sm btn-outline-secondary border-1" placeholder="Quantity" >
            </div>
            <div class="d-inline p-3 mb-3 col-md-6">
                <input name="tax" type="text" value="{{ $products->tax }}" class="form-control-sm btn-outline-primary border-1" id="tax" placeholder="Tax" >
            </div>
            <div class="mb-3  d-inline">
                <label for="status">Status</label>
                <input name="status" value="{{ $products->popular == "1" ? 'checked': '' }}" type="checkbox" id="status" >
            </div>
            <div class="mb-3  d-inline">
                <label for="trending">Trending</label>
                <input name="trending" value="{{ $products->popular == "1" ? 'checked': '' }}" type="checkbox" id="trending">
            </div>

            <div class="mb-3 mt-4">
            <label for="meta_title" class="form-label">Meta Title</label>
            <input name="meta_title" type="text" value="{{ $products->meta_title }}" class="form-control" id="meta_title" aria-describedby="meta_title">
            </div>
            <div class="mb-3 col-md-6">
                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                <input name="meta_keywords" value="{{ $products->meta_keywords}}" type="text" class="form-control" id="meta_keywords" aria-describedby="meta_keyword">
            </div>
            <div class="mb-3">
                <label for="meta_description" class="form-label">Meta Description</label>
                <input name="meta_description" value="{{ $products->meta_description }}" type="text" class="form-control" id="meta_description" aria-describedby="meta_description">
            </div>
            <div class="mb-3">
                {{-- <label class="form-label" for="customFile">Image</label> --}}
                @if ($products->image)
                <img class="rounded-circle mb-3 " width="100px" height="100px" src="{{ asset('storage/product_pic/'. $products->image ) }}">
                @endif
                <input required name="image" type="file" class="form-control-file" id="customFile" />

            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>

@endsection