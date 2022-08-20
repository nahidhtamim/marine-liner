@extends('layouts.admin')
@section('title')
Tracking | A Premium Media Company
@endsection
@section('admin-contents')

@if (session('status'))
   <div class="alert alert-success" role="alert">
        {{ session('status') }}
        <a class="close pull-right">&times;</a>
   </div>
@elseif (session('warning'))
   <div class="alert alert-danger" role="alert">
        {{ session('warning') }}
        <a class="close pull-right">&times;</a>
   </div>    
@endif


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tracking</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ports List</h6>
        </div>
        <div class="card-body">
            <form class="user" action="{{url('/update-tracking/'.$tracking->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-6 mb-3 mb-sm-0">
                    <label for="current_country" class="text-primary"> <b>Current Country <span class="text-danger">*</span></b> </label>
                    <select name="current_country" id="current_country" required="" class="form-control @error('current_country') is-invalid @enderror">
                        <option value="{{$tracking->current_country}}">{{$tracking->country_info->name}}</option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                    <br>
                </div>

                <div class="col-6 mb-3 mb-sm-0">
                    <label for="current_port" class="text-primary"> <b>Current Port <span class="text-danger">*</span></b> </label>
                    <select name="current_port" id="current_port" required="" class="form-control @error('current_port') is-invalid @enderror">
                        <option value="{{$tracking->current_port}}">{{$tracking->port_info->name}}</option>
                        {{-- <option>Select A Port</option>
                        @foreach($ports as $port)
                            <option value="{{$port->id}}">{{$port->name}}</option>
                        @endforeach --}}
                    </select>
                    <br>
                </div>
                <div class="col-12 mb-3 mb-sm-0">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


@endsection