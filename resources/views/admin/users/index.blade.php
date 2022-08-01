@extends('layouts.app')

@section('content')

<div class="card mt-4">
    <div class="card-body">
    <h4 class="card-title"> Registered users</h4>
    <div class="row">
        <div class="col-12">
        <div class="table-responsive">
            <table id="order-listing" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Eamil</th>
                    {{-- <th>Phone</th>                
                    <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user )
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>               

                    {{-- <td>
                        <a class="btn btn-warning" href="{{route('view.user', $user->id)}}">View</a>            
                    </td> --}}
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