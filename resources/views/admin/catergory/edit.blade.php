@extends('layouts.app')

@section('content')

<div class="card pb-3 justify-center">
   <div class="card-body text-center text-capitalize">
      <h2> Edit Catergory</h2>
    </div>
     <div class="card-text">
        <form class="needs-validation" novalidate action="{{route('update.catergory',$catergory->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
            <label for="name" class="form-label">Catergory Name</label>
            <input required  value="{{ $catergory->name }}" name="name" type="text" class="form-control" id="name" aria-describedby="name">
            </div>
            {{-- <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input required name="slug" type="text" class="form-control" id="slug" aria-describedby="slug">
            </div> --}}
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input value="{{ $catergory->description }}" name="description" id="description" class="form-control"/>
                {{-- <textarea  value="{{ $catergory->description }}" name="description" id="description" cols="30" rows="10" class="form-control"></textarea> --}}
            </div>
            <div class="mb-3 ">
                <label for="status">Status</label>
                <input  value="{{$catergory->status == '1' ? 'checked' : '' }}" name="status" type="checkbox" id="status" >
            </div>
            <div class="mb-3 ">
                <label for="popular">Popular</label>
                <input value="{{ $catergory->popular == '1' ? 'checked': '' }}" name="popular" type="checkbox" id="popular">

            </div>

            <div class="mb-3">
            <label for="meta_title" class="form-label">Meta Title</label>
            <input value="{{ $catergory->meta_title }}" name="meta_title" type="text" class="form-control" id="meta_title" aria-describedby="meta_title">
            </div>
            <div class="mb-3">
                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                <input value="{{ $catergory->meta_keywords }}" name="meta_keywords" type="text" class="form-control" id="meta_keywords" aria-describedby="meta_keyword">
            </div>
            <div class="mb-3">
                <label for="meta_descrip" class="form-label">Meta Description</label>
                <input value="{{$catergory->meta_descrip }}" name="meta_descrip" type="text" class="form-control" id="meta_descrip" aria-describedby="meta_descrip">
            </div>
            <div class="mb-3">
                @if ($catergory->image)
                <img class="rounded-circle mb-3 " width="100px" height="100px" src="{{ asset('storage/catergory_pic/'. $catergory->image ) }}">
                @endif
                {{-- <label class="form-label" for="customFile">Image</label> --}}
                <input required  name="image" type="file" class="form-control file-upload-info" id="customFile" />
            </div>

            <button type="submit" class="btn btn-success">Update Catergory</button>
        </form>
     </div>
</div>


@endsection