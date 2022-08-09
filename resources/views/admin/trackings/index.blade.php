@extends('layouts.admin')
@section('title')
Trackings | A Logistics Company
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
    <h1 class="h3 mb-2 text-gray-800">Trackings <a href="#" class="btn btn-success" data-toggle="modal" data-target="#trackingModal">Add</a></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Trackings List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Country</th>
                            <th>Port</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trackings as $tracking)
                            <tr>
                                <td>{{$tracking->id}}</td>
                                <td>{{$tracking->booking_id}}</td>
                                <td>{{$tracking->country_info->name}}</td>
                                <td>{{$tracking->port_info->name}}</td>
                                <td>
                                    @if($tracking->status == 0)
                                        Active
                                    @else
                                        Completed
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{url('/edit-tracking/'.$tracking->booking_id)}}" class="btn btn-primary">Edit</a>
                                        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#sureModal">Delete</a>
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
                                                    <a href="{{url('/delete-port/'.$port->slug)}}" class="btn btn-danger">Delete</a>
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
    <!-- Tracking Add Modal -->
    <div class="modal fade" id="trackingModal" tabindex="-1" role="dialog" aria-labelledby="trackingModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="trackingModalLabel">Add Tracking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" action="{{url('/save-tracking')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3 mb-sm-0">
                                <label for="booking_id" class="text-primary"> <b>Booking Id <span class="text-danger">*</span></b> </label>
                                <input type="text" name="booking_id" class="form-control @error('booking_id') is-invalid @enderror" id="booking_id"
                                    value="{{$booking_id}}"  readonly>  
                                <br>
                            </div>

                            <div class="col-6 mb-3 mb-sm-0">
                                <label for="current_country" class="text-primary"> <b>Current Country <span class="text-danger">*</span></b> </label>
                                <select name="current_country" id="current_country" required="" class="form-control @error('current_country') is-invalid @enderror">
                                    <option>Select A Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('current_country')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                                <br>
                            </div>

                            <div class="col-6 mb-3 mb-sm-0">
                                <label for="current_port" class="text-primary"> <b>Current Port <span class="text-danger">*</span></b> </label>
                                <select name="current_port" id="current_port" required="" class="form-control @error('current_port') is-invalid @enderror">
                                    <option>Select A Port</option>
                                    {{-- <option>Select A Port</option>
                                    @foreach($ports as $port)
                                        <option value="{{$port->id}}">{{$port->name}}</option>
                                    @endforeach --}}
                                </select>
                                <br>
                            </div>

                            <div class="col-12 mb-3 mb-sm-0">
                                <label for="status" class="text-primary"> <b>Status <span class="text-danger">*</span></b> </label>
                                <select name="status" id="status" required="" class="form-control @error('status') is-invalid @enderror">
                                    <option>Select A Port</option>
                                    <option value="0">Active</option>
                                    <option value="1">Complete</option>
                                </select>  
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