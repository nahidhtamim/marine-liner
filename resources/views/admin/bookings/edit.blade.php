@extends('layouts.admin')
@section('title')
Edit Booking | A Logistics Company
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
    <h1 class="h3 mb-2 text-gray-800">Bookings</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bookings List</h6>
        </div>
        <div class="card-body">
            <form class="user" action="{{url('/update-booking/'.$booking->booking_id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-12 mb-3 mb-sm-0">
                        <label for="tracking_id" class="text-primary"> <b>Tracking ID <span class="text-danger">*</span></b> </label>
                        <input type="text" name="tracking_id" class="form-control @error('tracking_id') is-invalid @enderror" id="tracking_id"
                            value="{{$booking->tracking_id}}" required="">
                            <span class="text-danger">
                                @error('tracking_id')
                                    <p class="text-danger">{{$message}}</p> 
                                @enderror
                            </span>   
                        <br>
                    </div>

                    <div class="col-6 mb-3 mb-sm-0">
                        <label for="company_name" class="text-primary"> <b>Company Name <span class="text-danger">*</span></b> </label>
                        <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                            value="{{$booking->company_name}}" required="">
                            <span class="text-danger">
                                @error('company_name')
                                    <p class="text-danger">{{$message}}</p> 
                                @enderror
                            </span>   
                        <br>
                    </div>

                    <div class="col-6 mb-3 mb-sm-0">
                        <label for="company_address" class="text-primary"> <b>Company Address <span class="text-danger">*</span></b> </label>
                        <input type="text" name="company_address" class="form-control @error('company_address') is-invalid @enderror" id="company_address"
                        value="{{$booking->company_address}}" required="">
                            <span class="text-danger">
                                @error('company_address')
                                    <p class="text-danger">{{$message}}</p> 
                                @enderror
                            </span>   
                        <br>
                    </div>

                    <div class="col-6 mb-3 mb-sm-0">
                        <label for="from_country" class="text-primary"> <b>From Country <span class="text-danger">*</span></b> </label>
                        <select name="from_country" id="from_country" required="" class="form-control @error('from_country') is-invalid @enderror">
                            <option value="{{$booking->from_country}}">{{$booking->from_c->name}}</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                        <br>
                    </div>

                    <div class="col-6 mb-3 mb-sm-0">
                        <label for="from_port" class="text-primary"> <b>From Port <span class="text-danger">*</span></b> </label>
                        <select name="from_port" id="from_port" required="" class="form-control @error('from_port') is-invalid @enderror">
                            <option value="{{$booking->from_port}}">{{$booking->from_p->name}}</option>
                            {{-- <option>Select A Port</option>
                            @foreach($ports as $port)
                                <option value="{{$port->id}}">{{$port->name}}</option>
                            @endforeach --}}
                        </select>
                        <br>
                    </div>

                    <div class="col-6 mb-3 mb-sm-0">
                        <label for="destination_country" class="text-primary"> <b>Destination Country <span class="text-danger">*</span></b> </label>
                        <select name="destination_country" id="destination_country" required="" class="form-control @error('destination_country') is-invalid @enderror">
                            <option value="{{$booking->destination_country}}">{{$booking->destination_c->name}}</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                        <br>
                    </div>

                    <div class="col-6 mb-3 mb-sm-0">
                        <label for="destination_port" class="text-primary"> <b>Destination Port <span class="text-danger">*</span></b> </label>
                        <select name="destination_port" id="destination_port" required="" class="form-control @error('destination_port') is-invalid @enderror">
                            <option value="{{$booking->destination_port}}">{{$booking->destination_p->name}}</option>
                            {{-- <option>Select A Port</option>
                            @foreach($ports as $port)
                                <option value="{{$port->id}}">{{$port->name}}</option>
                            @endforeach --}}
                        </select>
                        <br>
                    </div>

                    <div class="col-6 mb-3 mb-sm-0">
                        <label for="container_id" class="text-primary"> <b>Container Type <span class="text-danger">*</span></b> </label>
                        <select name="container_id" id="container_id" required="" class="form-control @error('container_id') is-invalid @enderror">
                            <option value="{{$booking->container_id}}">{{$booking->container_info->name}}</option>
                            @foreach($containers as $container)
                                <option value="{{$container->id}}">{{$container->name}}</option>
                            @endforeach
                        </select>
                        <br>
                    </div>

                    <div class="col-6 mb-3 mb-sm-0">
                        <label for="booking_date" class="text-primary"> <b>Booking Date <span class="text-danger">*</span></b> </label>
                        <input type="date" name="booking_date" class="form-control @error('booking_date') is-invalid @enderror" id="booking_date" required="" value="{{$booking->booking_date}}">   
                        <br>
                    </div>

                    <div class="col-12 mb-3 mb-sm-0">
                        <label for="goods" class="text-primary"> <b>Goods <span class="text-danger">*</span></b> </label>
                        <textarea name="goods" id="goods" class="form-control @error('slug') is-invalid @enderror" rows="2">{{$booking->goods}}</textarea>  
                        <br>
                    </div>

                    <div class="col-12 mb-3 mb-sm-0">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


@endsection