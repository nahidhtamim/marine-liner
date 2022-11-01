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
        <h2 class="text-center text-white font-bold uppercase">Services / <a href="{{url('logistic')}}">Logistics</a> </h2>
        <div class="border-b-4 border-blue-300 pb-4 w-20"></div>
    </div>
</div>


<div class="wrapper space-y-14">
    <div class="grid md:grid-cols-1 lg:grid-cols-2 space-y-6 pb-3 lg:space-y-0 gap-16">
        <!-- left -->
        <div class="space-y-6 flex flex-col justify-center order-last">
            <h2>Logistics Services</h2>
            <p>We provide logistic services in the nation, whether it is freight transportation, supply chain solutions, warehousing and distribution, customer resource area services, customs, security and insurance, temperature controlled logistics, industry sector solutions, brokerage, or lead logistic based solutions. Our company has through years of experience in this industry has been able to create a network of associates across the length and breadth of country, with our own logistic centers spread throughout the country, which helps us to provide safe, reliable, economical and customized logistic solutions to our clients and partners. 
            </p>


        </div>
        <!-- right -->
        <div>
            <img src="{{asset('frontend/assets/images/services/logistics.jpg')}}" alt="background-image"
                class="shadow-xl rounded-xl object-cover w-full" />
        </div>
    </div>
    <div>
        <p>
            Our logistic teams consist of hundreds of employees, who starting from the pre-loading of cargos to post-delivery, takes care of the process of logistic transport as well as warehousing and distribution on your behalf. We are authorized, insured and licensed logistic service provider, who has over the years not only gained a credible market reputation, but has also been able to win the hearts of hundreds of our clients, both national and international. It is a mutually benefitting logistic service we aim to provide to our clients, which is what has helped us become one of the most reliable logistic service providers in the nation. 
        </p><br>
        <a class="px-6 mt-5 py-3 btn-primary" href="{{url('/contact')}}">
            Contact For More Info
        </a>
            
    </div>
    
</div>

@endsection
