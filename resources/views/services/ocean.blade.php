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
        <h2 class="text-center text-white font-bold uppercase">Services / <a href="{{url('ocean')}}">Ocean Freight
                Transportation Services</a> </h2>
        <div class="border-b-4 border-blue-300 pb-4 w-20"></div>
    </div>
</div>


<div class="wrapper space-y-14">
    <div class="grid md:grid-cols-1 lg:grid-cols-2 space-y-6 pb-3 lg:space-y-0 gap-16">
        <!-- left -->
        <div class="space-y-6 flex flex-col justify-center order-last">
            <h2>Ocean Freight Transportation Services</h2>
            <p>
                Consistent, reliable sailings ensure that your ocean freight
                shipments always reach your customers in a timely manner.
            </p>
        </div>
        <!-- right -->
        <div>
            <img src="{{asset('frontend/assets/images/services/ocean.jpg')}}" alt="background-image"
                class="shadow-xl rounded-xl object-cover w-full" />
        </div>
    </div>
    <div>
        <h2>Our ocean freight services include:</h2>

        <ul class="space-y-8">
            <li>
                <h5>Full container load (fcl):</h5>
                <p>
                    Use fcl ocean freight shipping for valuable cargo that you
                    wouldn’t want to transport with other cargo (lcl). Fcl is also a
                    good option if you need to ship larger loads (12+ pallets)
                </p>
            </li>
            <li>
                <h5>Less than container load (lcl):</h5>
                <p>
                    Lcl shipping means you’ll share container space with others that
                    are also shipping cargo. This can be a more cost-effective
                    option for shipping smaller loads overseas.
                </p>
            </li>
            <li>
                <h5>Reefer containers:</h5>
                <p>
                    We can ship your goods overseas in refrigerated or
                    temperature-controlled containers to protect them from spoilage
                    and humidity. Your goods can be shipped at the ideal temperature
                    for your product, whether it’s is below freezing or moderately
                    cool.
                </p>
            </li>
            <li>
                <h5>Hazardous containers &amp; dangerous goods:</h5>
                <p>
                    Dangerous goods include but are not limited to: pharmaceuticals,
                    explosives, gases, flammable liquids and solids, corrosive
                    substances, oxidizing substances, dry ice, lithium batteries,
                    and fuel cell engines. We are dangerous goods certified and
                    transport your hazardous goods overseas safely to their
                    destination, in compliance with u.s. and international
                    regulations.
                </p>
            </li>
            <li>
                <h5>Roll-on, roll-off (roro):</h5>
                <p>
                    We ship any type of roll-on, roll-off cargo such as automobiles,
                    trailers, tractors, motor homes or any type of heavy machinery
                    or equipment on wheels that can easily be rolled on and off
                    ro-ro vessels for transport.
                </p>
            </li>
            <li>
                <h5>Container loading &amp; unloading:</h5>
                <p>
                    We ensure that your containers are safely loaded and unloaded
                    from vessels and offer our ground shipping network for
                    transportation to a final destination.
                </p>
            </li>
            <li>
                <h5>Trans-loading container trucking:</h5>
                <p>
                    We’ll help you eliminate warehousing costs and meet just-in-time
                    delivery demands with our trans-loading services. As soon as
                    your cargo arrives to the port, it can be loaded onto our trucks
                    and delivered directly to its destination.
                </p>
            </li>
            <li>
                <h5>Warehousing &amp; distribution:</h5>
                <p>
                    We have bonded warehouse space in ports around the world and
                    several throughout the u.s. to help you manage inventory and
                    distribution.
                </p>
            </li>
            <li>
                <h5>Cargo insurance:</h5>
                <p>
                    We provide different cargo insurance options that protect
                    against loss or damage to your cargo in transit overseas. Cargo
                    insurance is essential to ocean freight transportation and
                    protects your goods from seawater flooding, storms and acts of
                    god, vessel collision and other unforeseeable events.
                </p>
            </li>
        </ul>

        <br>
                <a class="px-6 mt-5 py-3 btn-primary" href="{{url('/contact')}}">
                    Contact For More Info
                </a>
    </div>
</div>
@endsection
