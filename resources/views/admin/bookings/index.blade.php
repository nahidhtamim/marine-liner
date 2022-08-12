@extends('layouts.admin')
@section('title')
Bookings | A Logistics Company
@endsection
@section('admin-contents')

@if (session('status'))
   <div class="alert alert-success" role="alert">
        {{ session('status') }}
        <a href="" class="close pull-right">&times;</a>
   </div>
@elseif (session('warning'))
   <div class="alert alert-danger" role="alert">
        {{ session('warning') }}
        <a href="" class="close pull-right">&times;</a>
   </div>    
@endif


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bookings <a href="{{url('/add-booking')}}" class="btn btn-success" data-toggle="modal" data-target="#bookingModal">Add</a></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bookings List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Tracking Id</th>
                            <th>Company Name</th>
                            <th>Company Address</th>
                            <th>From booking</th>
                            <th>From Port</th>
                            <th>Destination booking</th>
                            <th>Destination Port</th>
                            <th>Container</th>
                            <th>Goods</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td class="text-center">{{$booking->id}}</td>
                                <td class="text-center">{{$booking->tracking_id}} <a href="{{url('/trackings/'.$booking->tracking_id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> </a></td>
                                <td>{{$booking->company_name}}</td>
                                <td>{{$booking->company_address}}</td>
                                <td>{{$booking->from_c->name}}</td>
                                <td>{{$booking->from_p->name}}</td>
                                <td>{{$booking->destination_c->name}}</td>
                                <td>{{$booking->destination_p->name}}</td>
                                <td>{{$booking->container_info->name}}</td>
                                <td>{{$booking->goods}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{url('/edit-booking/'.$booking->tracking_id)}}" class="btn btn-primary">Edit</a>
                                        {{-- <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#sureModal">Delete</a> --}}
                                        <a href="{{url('/delete-booking/'.$booking->tracking_id)}}" class="btn btn-danger">Delete</a>
                                    </div>

                                        <!-- Are You Sure Modal-->
                                        {{-- <div class="modal fade" id="sureModal" tabindex="-1" role="dialog" aria-labelledby="sureModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-primary" id="sureModalLabel">Ready to delete?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-dark">Are you sure, you want to delete the item?</div>
                                                <div class="modal-footer">
                                                    <a href="{{url('/delete-booking/'.$booking->slug)}}" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- booking Add Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="bookingModalLabel"> <b>Add Booking</b> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" action="{{url('/save-booking')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-6 mb-3 mb-sm-0">
                                <label for="company_name" class="text-primary"> <b>Company Name <span class="text-danger">*</span></b> </label>
                                <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                                    placeholder="Company Name" required="">
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
                                    placeholder="Company Address" required="">
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
                                    <option>Select A Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                <br>
                            </div>

                            <div class="col-6 mb-3 mb-sm-0">
                                <label for="from_port" class="text-primary"> <b>From Port <span class="text-danger">*</span></b> </label>
                                <select name="from_port" id="from_port" required="" class="form-control @error('from_port') is-invalid @enderror">
                                    <option>Select A Port</option>
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
                                    <option>Select A Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                <br>
                            </div>

                            <div class="col-6 mb-3 mb-sm-0">
                                <label for="destination_port" class="text-primary"> <b>Destination Port <span class="text-danger">*</span></b> </label>
                                <select name="destination_port" id="destination_port" required="" class="form-control @error('destination_port') is-invalid @enderror">
                                    <option>Select A Port</option>
                                    {{-- <option>Select A Port</option>
                                    @foreach($ports as $port)
                                        <option value="{{$port->id}}">{{$port->name}}</option>
                                    @endforeach --}}
                                </select>
                                <br>
                            </div>

                            <div class="col-12 mb-3 mb-sm-0">
                                <label for="container_id" class="text-primary"> <b>Container Type <span class="text-danger">*</span></b> </label>
                                <select name="container_id" id="container_id" required="" class="form-control @error('container_id') is-invalid @enderror">
                                    <option>Select A Container Type</option>
                                    @foreach($containers as $container)
                                        <option value="{{$container->id}}">{{$container->name}}</option>
                                    @endforeach
                                </select>
                                <br>
                            </div>

                            <div class="col-12 mb-3 mb-sm-0">
                                <label for="booking_date" class="text-primary"> <b>Booking Date <span class="text-danger">*</span></b> </label>
                                <input type="date" name="booking_date" class="form-control @error('booking_date') is-invalid @enderror" id="booking_date" required="">
                                <br>
                            </div>

                            <div class="col-12 mb-3 mb-sm-0">
                                <label for="goods" class="text-primary"> <b>Goods <span class="text-danger">*</span></b> </label>
                                <textarea name="goods" id="goods" class="form-control @error('slug') is-invalid @enderror" rows="2">Description of your goods</textarea> 
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
    </div>



</div>
<!-- /.container-fluid -->


@endsection