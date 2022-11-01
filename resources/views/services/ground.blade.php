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
        <h2 class="text-center text-white font-bold uppercase">Services / <a href="{{url('ground')}}">Ground Services</a> </h2>
        <div class="border-b-4 border-blue-300 pb-4 w-20"></div>
    </div>
</div>


<div class="wrapper space-y-14">
    <div class="grid md:grid-cols-1 lg:grid-cols-2 space-y-6 pb-3 lg:space-y-0 gap-16">
        <!-- left -->
        <div class="space-y-6 flex flex-col justify-center order-last">
            <h2>Ground Services</h2>
            <h5>Road & rail transport</h5>
            <p>Our professionals match your freight with the right vehicle and the right route, with the ability to restructure resources if conditions change. We drive the process from end-to-end while providing a custom solution to meet your needs.
                <br>
                <ul>
                    <li>Flexible, non-asset based solutions</li>
                    <li>Dry van, ltl, refrigerated, flatbed, tofc</li>
                    <li>Short haul regional capacity</li>
                    <li>Drop trailer pools</li>
                    <li>Diverse equipment for any kind of shipment</li>
                    <li>Branch network with local access to global capacity</li>
                    <li>Immediate access to spot pricing</li>
                    <li>Integrated systems visibility across all your transportation modes</li>
                    <li>Smart way certified (usa)</li>
                </ul> 
            </p>


        </div>
        <!-- right -->
        <div>
            <img src="{{asset('frontend/assets/images/services/ground.jpg')}}" alt="background-image"
                class="shadow-xl rounded-xl object-cover w-full" />
        </div>
    </div>
    <div>
        <h5>Less-than truck load (ltl) – finding savings in your transportation patterns</h5>
            <p>Managing your loads through our ltl service is the perfect way to optimize your domestic supply chain. Logistics offers co-load and consolidation ltl services to reduce your cost and improve your distribution pipeline.
                Bringing experience, creativity and insight to your less-than-truckload shipping challenges, we step in to coordinate and add value at every turn. <b>Services include: </b>               
                <br>
                <ul>
                    <li>Seamless account management</li>
                    <li>Cross-border ltl services</li>
                    <li>Spot rates</li>
                    <li>Invoice auditing</li>
                    <li>Comprehensive reporting</li>
                    <li>Online rating</li>
                    <li>Expedited service available</li>
                    <li>Customized customer portals</li>
                </ul> 
            </p>
            <br>
            <h5>Rail services</h5>
            <p>The rail industry has developed new levels of efficiency, economy and sustainability that can translate directly to your own supply chain. Our relationships with rail operators together with our expertise in rail and intermodal freight movement, means we are able to offer highly effective transportation solutions. All backed up by our supporting services, such as customs clearance, terminal handling, inland distribution and final mile delivery.
            </p><br>
            <a class="px-6 mt-5 py-3 btn-primary" href="{{url('/contact')}}">
                Contact For More Info
            </a>
            
    </div>
    
</div>

@endsection
