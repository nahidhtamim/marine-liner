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

<!-- Hero section start -->
<section class="bg-center bg-cover bg-no-repeat" style="
          background-image: linear-gradient(#2440e222, #17151703),
            url('frontend/assets/images/pavel-neznanov-mq86i1CEzr0-unsplash.jpg');
        ">
    <div class="max-w-screen-xl px-4 py-32 mx-auto lg:h-screen lg:items-center lg:flex">
        <div class="max-w-3xl py-20 px-12 rounded-2xl shadow-inner"
            style="background-image: linear-gradient(#334155b3, #334155b3)">
            <h1 class="text-3xl font-normal sm:text-5xl text-white">
                We Are Marine Liner

                <span class="sm:block"> We care for you. </span>
            </h1>

            <p class="max-w-xl text-white mx-auto mt-4 sm:leading-relaxed sm:text-xl">
                MARINE LINER is a MALAYSIAN based, professional and financially
sound company. It offers a powerful combination of strategic supply chain analysis and extensive practical experience, handling all shipping activities all over the world.
            </p>

            <div class="flex flex-wrap justify-start gap-4 mt-8">
                <a class="btn-transparent" href="{{url('/booking')}}"> Get Started </a>
            </div>
        </div>
    </div>
</section>
<!-- Hero section end -->

<!-- Intro start -->
<div class="wrapper">
    <div class="grid md:grid-cols-2 space-y-6 md:space-y-0 gap-16">
        <!-- left -->
        <div class="space-y-6 flex flex-col justify-center order-last">
            <h2>Move your technology supply chain to the fast lane</h2>
            <p>Keeping customer satisfaction in mind, we enable ourselves to keep up our standards in all aspects of shipping, where integrity, efficiency and professionalism are part of our goal. We adequately handle all shipping spectrum under one roof.
            </p>
            <div>
                <a class="px-6 py-3 btn-primary" href="{{url('/booking')}}">
                    Get Started
                </a>
            </div>
        </div>
        <!-- right -->
        <div>
            <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                alt="background-image" class="shadow-xl rounded-xl object-cover" />
        </div>
    </div>
</div>
<!-- Intro end -->

<!-- banner 2 start -->
<div class="object-cover bg-no-repeat bg-cover" style="
          background-image: linear-gradient(
              180deg,
              #00000081 0%,
              #00000097 50%,
              #19123681 100%
            ),
            url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');
        ">
    <div class="space-y-6 flex items-center justify-center mx-auto flex-col wrapper">
        <h2 class="text-center text-white font-bold">MARINE LINER</h2>
        <div class="border-b-4 border-blue-300 pb-4 w-20"></div>

        <p class="text-white text-center font-semibold">
            We are built on trust
        </p>
        <div class="flex justify-center">
            <a href="{{url('/about')}}" class="btn-transparent">Read More</a>
        </div>
    </div>
</div>
<!-- banner 2 end -->
<!-- services start -->
<div class="wrapper space-y-16">
    <div class="flex justify-center">
        <div class="space-y-6 max-w-4xl text-center">
            <h2>Move your dream with us, Marine Liner!!</h2>
            <p>
                By focusing on delivering best-in-class service to our customers, we are always available to help you with your particular needs and offer you a one-stop-shop solution for your next shipping request.
            </p>
            <div>
                <button type="button" {{url('/booking')}} class="px-6 py-3 btn-primary">
                    Get started
                </button>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <div
            class="shadow-md bg-gradient-to-r from-gray-50 hover:bg-blue-50 hover:cursor-pointer hover:-translate-y-3 transition duration-150 ease-in-out">
            <a href="#">
                <img class="rounded-t-lg"
                    src="{{asset('frontend/assets/images/john-simmons-U6zAZfaDuBY-unsplash.jpg')}}"
                    alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h6 class="mb-2">On Time Delivery</h6>
                </a>
                <p class="mb-3 text-gray-500">
                    We care about you and your time. We delivery your dream in due time.
                </p>

                <a href="{{url('/about')}}" class="inline-flex items-center px-6 py-3 btn-primary">
                    Read more
                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>

        <div
            class="shadow-md bg-gradient-to-r from-gray-50 hover:bg-blue-50 hover:cursor-pointer hover:-translate-y-3 transition duration-150 ease-in-out">
            <a href="{{url('/about')}}">
                <img class="rounded-t-lg"
                    src="{{asset('frontend/assets/images/fly-d-mT7lXZPjk7U-unsplash.jpg')}}"
                    alt="" />
            </a>
            <div class="p-5">
                <a href="{{url('/about')}}">
                    <h6 class="mb-2">Secure Delivery</h6>
                </a>
                <p class="mb-3 text-gray-500">
                    We Care about your security, we delivery your goods with utmost security.
                </p>

                <a href="{{url('/about')}}" class="inline-flex items-center px-6 py-3 btn-primary">
                    Read more
                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>

        <div
            class="shadow-md bg-gradient-to-r from-gray-50 hover:bg-blue-50 hover:cursor-pointer hover:-translate-y-3 transition duration-150 ease-in-out">
            <a href="{{url('/about')}}">
                <img class="rounded-t-lg"
                    src="{{asset('frontend/assets/images/rupixen-com-Q59HmzK38eQ-unsplash.jpg')}}"
                    alt="" />
            </a>
            <div class="p-5">
                <a href="{{url('/about')}}">
                    <h6 class="mb-2">Security of Payment</h6>
                </a>
                <p class="mb-3 text-gray-500">
                    We Provide you security against your payment. We are built on trust.
                </p>

                <a href="{{url('/about')}}" class="inline-flex items-center px-6 py-3 btn-primary">
                    Read more
                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>

        <div
            class="shadow-md bg-gradient-to-r from-gray-50 hover:bg-blue-50 hover:cursor-pointer hover:-translate-y-3 transition duration-150 ease-in-out">
            <a href="{{url('/about')}}">
                <img class="rounded-t-lg"
                    src="{{asset('frontend/assets/images/alex-kotliarskyi-QBpZGqEMsKg-unsplash.jpg')}}"
                    alt="" />
            </a>
            <div class="p-5">
                <a href="{{url('/about')}}">
                    <h6 class="mb-2">Customer Support</h6>
                </a>
                <p class="mb-3 text-gray-500">
                    We are always here for you to assist you with any query you might have.
                </p>

                <a href="{{url('/about')}}" class="inline-flex items-center px-6 py-3 btn-primary">
                    Read more
                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- services end -->

<!-- banner 1 start -->
<div class="bg-gradient-to-br from-blue-300 to-sky-500 md:bg-gradient-to-r md:from-sky-200 md:to-sky-600">
    <div class="grid md:grid-cols-2 container mx-auto gap-6 px-6 lg:px-28 wrapper">
        <div class="items-center justify-center mx-auto hidden md:flex">
            <img src="{{asset('frontend/assets/images/bg-hh.png')}}" alt="" class="rounded-lg shadow-indigo-500" />
        </div>
        <div class="space-y-6 max-w-md flex items-center justify-center mx-auto flex-col">
            <h2 class="text-center text-white font-bold">
                MARINE LINER BIOFUEL SOLUTION
            </h2>
            <div class="border-b-4 border-blue-300 pb-4 w-20"></div>

            <p class="text-white text-center font-semibold">
                From Ambition to Action: <br />
                For Zero Impact on the Atmosphere
            </p>
            <div class="flex justify-center">
                <button type="button" class="btn-transparent" href="{{url('/about')}}">Read More</button>
            </div>
        </div>
    </div>
</div>
<!-- banner 1 end -->

<!-- start -->
<div class="wrapper">
    <div class="grid md:grid-cols-2 space-y-6 md:space-y-0 gap-16">
        <!-- left -->
        <div class="space-y-6 flex flex-col justify-center">
            <h2>Mission & Vision</h2>
            <p>
                Our aim is to strive hard towards making and promoting “Marine Liner” as being the best forwarder in the industry in terms of service and profitability.
            </p>
            <p>
                We are committed to strengthening our position as a leader in shipping and air forwarding, transport, cargo handling and expanding our full integrated global transport service through our overseas agents.
            </p>
            <p>
                We are submitting there under supporting information of Marine Liner. strength for achieving our mission statement.
            </p>
            <div>
                <a class="px-6 py-3 btn-primary" href="{{url('/booking')}}">
                    Get Started
                </a>
            </div>
        </div>
        <!-- right -->
        <div>
            <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1170&amp;q=80"
                alt="background-image" class="shadow-xl rounded-xl object-cover" />
        </div>
    </div>
</div>
<!-- end -->
@endsection
