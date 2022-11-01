@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="flex justify-between text-green-200 shadow-inner rounded p-3 bg-green-600">
        <p class="self-center">
        <strong>{{ session('status') }}</strong>
        </p>
        <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
    </div>
@elseif (session('warning'))
    <div class="flex justify-between text-red-200 shadow-inner rounded p-3 bg-green-600">
        <p class="self-center">
        <strong>{{ session('warning') }}</strong>
        </p>
        <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
    </div>   
@endif

<div class="object-center bg-no-repeat bg-cover" style="
          background-image: linear-gradient(#00000053, #00000053),
            url(https://images.unsplash.com/photo-1615840287214-7ff58936c4cf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80);
        ">
    <div class="space-y-6 flex items-center justify-center mx-auto flex-col wrapper">
        <h2 class="text-center text-white font-bold uppercase">Services / <a href="{{url('trucking')}}">Trucking</a> </h2>
        <div class="border-b-4 border-blue-300 pb-4 w-20"></div>
    </div>
</div>



<div class="wrapper space-y-14">
    <div class="grid md:grid-cols-1 lg:grid-cols-2 space-y-6 pb-3 lg:space-y-0 gap-16">
        <!-- left -->
        <div class="space-y-6 flex flex-col justify-center order-last">
            <h2>Trucking Services</h2>
            <p>Our trucking service is based on the principle of providing our clients with the flexibility and reliability, to move legal load across town, or across the country, whenever they want. Our in-house team of experienced drivers we believe in providing quality services to our clients, and with the experience of decades backing us in the field of logistics, there is nothing we overlook when we handle your cargo. Starting from loading to unloading at the destination, and maintaining the highest standards in terms of safety while in transit, we take nothing to chance. Even if the load is oversized or over-dimensional in nature, our logistic experts and technicians take care of the minute details to ensure the safety of the delivery at its destination, and on time, every time. 
            </p>
        </div>
        <!-- right -->
        <div>
            <img src="{{asset('frontend/assets/images/services/truck.jpg')}}" alt="background-image"
                class="shadow-xl rounded-xl object-cover w-full" />
        </div>
    </div>
    <div>
        <p>
            We ensure that our fleet of trucks are always well maintained, and have the best and the most updated fleet of trucks in service to ensure that it is capable of delivering high value, and oversized deliverables, efficiently and effectively, without causing any kind of loss, which is generally the case seen with many outsourced trucking service providers. Our in-house team of experienced drivers, logistic experts, repairs and maintenance technicians are on guard 24 by 7 to ensure that the trucks are ready on time, and in optimum condition to handle your deliveries. 
        </p>
        <br>
        <a class="px-6 mt-5 py-3 btn-primary" href="{{url('/contact')}}">
            Contact For More Info
        </a>
            
    </div>
    
</div>


@endsection
