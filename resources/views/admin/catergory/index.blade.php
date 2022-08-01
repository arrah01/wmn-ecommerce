@extends('layouts.app')

@section('head')
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/6.7.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.1.2/typicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/vertical-layout-dark/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
  </head>
@endsection

@section('content')

     <div class="card">
             <div class="card-body text-center text-capitalize"><h2> Catergory page</h2>
             </div>
                    <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded table-darkBGImg">
                                         <div class="card-body">
                                            <div class="col-sm-8">
                                            <h3 class="text-white upgrade-info mb-4">
                                                 Create a new <span class="fw-bold">Catergory</span>
                                                </h3>
                                                <button type="button" class="btn btn-success upgrade-btn " data-bs-toggle="modal" data-bs-target="#exampleModal-4" data-whatever="@mdo">Create Catergory</button>
                                            <!-- Company Button trigger modal -->
                                                <div class="card-body">
                                                <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title " id="ModalLabel">Create Catergory</h5>
                                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="needs-validation" novalidate action="{{route('store.catergory')}}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="mb-3">
                                                                        <label for="name" class="form-label">Catergory Name</label>
                                                                        <input required name="name" type="text" class="form-control" id="name" aria-describedby="name">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="description" class="form-label">Description</label>
                                                                            <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label for="status">Status</label>
                                                                            <input name="status" type="checkbox" id="status" >
                                                                        </div>
                                                                        <div class="mb-3 col-md-6">
                                                                            <label for="popular">Popular</label>
                                                                            <input name="popular" type="checkbox" id="popular">
                                                                        </div>

                                                                        <div class="mb-3">
                                                                        <label for="meta_title" class="form-label">Meta Title</label>
                                                                        <input name="meta_title" type="text" class="form-control" id="meta_title" aria-describedby="meta_title">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                                                            <input name="meta_keywords" type="text" class="form-control" id="meta_keywords" aria-describedby="meta_keyword">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="meta_descrip" class="form-label">Meta Description</label>
                                                                            <input name="meta_descrip" type="text" class="form-control" id="meta_descrip" aria-describedby="meta_descrip">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="customFile">Image</label>
                                                                            <input required name="image" type="file" class="form-control file-upload-info" id="customFile" />
                                                                        </div>
                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-success">Add Catergory</button>
                                                                    </form>

                                                                </div>
                                                        </div>
                                                </div>
                                                </div>
                                        </div>
                                 </div>
                             </div>
                    </div>
    </div>

                <div class="card mt-4">
                    <div class="card-body">
                    <h4 class="card-title"> Catergory Data table</h4>
                    <div class="row">
                        <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>slug</th>
                                    <th>Status</th>
                                    <th>Popular</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($catergories as $catergory )
                                <tr>
                                    <td>{{$catergory->id}}</td>
                                    <td><img class="rounded-circle mb-3" width="50px" height="50px" src="{{ asset('storage/catergory_pic/'. $catergory->image ) }}"></td>
                                    <td>{{$catergory->name}}</td>
                                    <td>{{Str::limit($catergory->description, 100)}}</td>
                                    <td>{{$catergory->slug}}</td>
                                    <td>{{$catergory->status}}</td>
                                    <td>{{$catergory->popular}}</td>

                                    <td>

                                        <a class="btn btn-warning" href ="{{route('edit.catergory', $catergory->id)}}">edit</a>
                                        <form class="d-inline" method="POST" action="{{route('destroy.catergory' , $catergory->id )}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">delete</button>
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
                </div>


@endsection

@section('js')
  <!-- plugins:js -->
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('js/template.js')}}"></script>
  <script src="{{asset('js/settings.js')}}"></script>
  <script src="{{asset('js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('js/data-table.js')}}"></script>
  <!-- Plugin js for this page -->
  <script src="{{asset('vendors/dropify/dropify.min.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{asset('js/dropify.js')}}"></script>
  <!-- End custom js for this page-->

  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()
</script>

  <!-- End custom js for this page-->
@endsection

