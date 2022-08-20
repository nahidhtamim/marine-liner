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
        <h2 class="text-center text-white font-bold uppercase">Services / <a href="{{url('storage')}}">Storage</a> </h2>
        <div class="border-b-4 border-blue-300 pb-4 w-20"></div>
    </div>
</div>

<!-- Intro start -->
<div class="wrapper pb-0">
    <div class="grid md:grid-cols-2 space-y-6 md:space-y-0 gap-16">
        <!-- left -->
        <div class="space-y-6 flex flex-col justify-center order-last">
            <h2>Storage Services</h2>
            <p>We take pride in catering to a broad range of clientele throughout the world with our warehousing services, which is comprehensive, reliable and flexible – qualities that are essential to help businesses in this market. Our experienced experts design a supply chain flowchart tailored to meet your business and logistic needs, which focuses on not only increasing efficiency, but cutting down costs. With our vast network of warehouses and distribution centers spread throughout the country, it becomes much easier to cater to a audience in a record response time, which is the key factor in winning the hearts of the customer and having an edge over the competitors.
            </p>
            <p>
                Team of logistic experts are always available to help you with any queries you might have, or if you want to consult in length your logistic requirements. We would study your requirements and provide you with a quote that would not only suit your budget, but would also save you considerable amount of money in the long term. Our company has through years of experience in this industry has been able to create a network of associates across the length and breadth of country, with our own logistic centers spread throughout the country, which helps us to provide safe, reliable, economical and customized logistic solutions to our clients and partners. 
            </p>
            <div>
                <a class="px-6 py-3 btn-primary" href="{{url('/contact')}}">
                    Contact For More Info
                </a>
            </div>
        </div>
        <!-- right -->
        <div class="">
            <img src="{{asset('frontend/assets/images/services/storage.jpg')}}"
                alt="background-image" class="shadow-xl rounded-xl object-cover" />
        </div>
    </div>
</div>
<!-- Intro end -->

@endsection
