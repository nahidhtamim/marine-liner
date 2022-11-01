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
        <h2 class="text-center text-white font-bold uppercase">Services / <a href="{{url('warehousing')}}">Warehousing</a> </h2>
        <div class="border-b-4 border-blue-300 pb-4 w-20"></div>
    </div>
</div>


<div class="wrapper space-y-14">
    <div class="grid md:grid-cols-1 lg:grid-cols-2 space-y-6 pb-3 lg:space-y-0 gap-16">
        <!-- left -->
        <div class="space-y-6 flex flex-col justify-center order-last">
            <h2>Warehousing Services</h2>
            <p>Our warehousing and distribution services are regularly audited and analyzed to ensure that it meets the contemporary business models, and any and all upgrades are made to ensure our services continue to help our clients meet their logistic requirements efficiently. Our logistics team have years of experience in this business and can handle long term and large scale assignments with utter professionalism, and our customer service helps the clients to stay in the loop throughout the process, whenever they require any assistance. Consult with our experts today for your logistics, warehousing and distribution services requirements, and allow us to make a positive difference in your business. 
            </p>
        </div>
        <!-- right -->
        <div>
            <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="background-image"
                class="shadow-xl rounded-xl object-cover w-full" />
        </div>
    </div>
    <div>
        <p>
            Moreover, our supply chain management experts would design a logistic process especially for you to align with your business in an integrated fashion. Our warehousing services, includes a wide range of services that includes inventory control and management, load building, yard management, static and dynamic replenishment, kitting, order processing, vendor performance, cross docking, supply chain management, logistic integration, bar coding, quality control, labeling, carrier performance, and so on.  
        </p>
        <br>
        <a class="px-6 mt-5 py-3 btn-primary" href="{{url('/contact')}}">
            Contact For More Info
        </a>
            
    </div>
    
</div>

@endsection
