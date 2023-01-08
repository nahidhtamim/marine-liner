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
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trackings as $tracking)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$tracking->tracking_id}}</td>
                                <td>{{$tracking->country_info->name}}</td>
                                <td>{{$tracking->port_info->name}}</td>
                                <td>
                                    @if($tracking->status == 0)
                                        <span class="text-secondary"> <b>Booked</b> 
                                        <a href="{{url('/tracking-departed/'.$tracking->id)}}" class="btn btn-info btn-sm"> Mark Departed </a> </span>
                                    @elseif($tracking->status == 1)
                                        <span class="text-info"> <b>Departed</b> 
                                            <a href="{{url('/tracking-hold/'.$tracking->id)}}" class="btn btn-warning btn-sm"> Mark On Hold </a> </span>
                                    @elseif($tracking->status == 2)
                                        <span class="text-warning"> <b>On Hold</b> 
                                        <a href="{{url('/tracking-complete/'.$tracking->id)}}" class="btn btn-success btn-sm"> Mark Complete </a> </span>
                                    @elseif($tracking->status == 3)
                                        <span class="text-success"> <b>Completed</b> </span>
                                    @endif
                                </td>
                                <td>{{$tracking->created_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{url('/edit-tracking/'.$tracking->id)}}" class="btn btn-primary">Edit</a>
                                        <a class="btn btn-danger" href="{{url('/delete-tracking/'.$tracking->id)}}">Delete</a>
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
                                <label for="tracking_id" class="text-primary"> <b>Booking Id <span class="text-danger">*</span></b> </label>
                                <input type="text" name="tracking_id" class="form-control @error('tracking_id') is-invalid @enderror" id="tracking_id"
                                    value="{{$tracking_id}}"  readonly>  
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
                                    <option>Select Status</option>
                                    <option value="0">Booked</option>
                                    <option value="1">Departed</option>
                                    <option value="2">On Hold</option>
                                    <option value="3">Complete</option>
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