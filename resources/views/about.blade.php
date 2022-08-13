@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="grid md:grid-cols-5 gap-14">
      <!-- left -->
      <div class="space-y-9 col-span-3 text-justify">
        <h1 class="text-sky-700">Mrine Line</h1>

        <p class="leading-6">
          MARINE LINER is a MALAYSIAN based, professional and financially
sound company. It offers a powerful combination of strategic supply chain analysis and extensive practical experience, handling all shipping activities all over the world.
        </p>

        <p class="leading-6">
          Keeping customer satisfaction in mind, we enable ourselves to keep up our standards in all aspects of shipping, where integrity, efficiency and professionalism are part of our goal. We adequately handle all shipping spectrum under one roof.
        </p>

        <p class="leading-6">
          By focusing on delivering best-in-class service to our customers, we are always available to help you with your particular needs and offer you a one-stop-shop solution for your next shipping request.
        </p>
      </div>

      <!-- right -->
      <div class="flex justify-center items-center col-span-2 order-first">
        <img
          src="{{asset('frontend/assets/images/Work_3.jpg')}}"
          class="w-full"
          alt="about-image"
        />
      </div>
    </div>
  </div>

  <div class="wrapper bg-slate-50">
    <div class="grid md:grid-cols-2 gap-9">
      <!-- left -->
      <div class="flex justify-center items-center">
        <div class="space-y-4 text-center md:text-start">
          <h2 class="font-semibold">Our Professional Team</h2>
          <div class="flex justify-center md:justify-start">
            <div class="bg-sky-700 w-24 h-1"></div>
          </div>
          <p class="md:max-w-lg">
            We are a team of professionals committed to corporate
            excellence.
          </p>
        </div>
      </div>
      <!-- right -->
      <div
        class="flex justify-center items-center order-first md:order-last"
      >
        <div class="text-center">
          <img
            src="{{asset('frontend/assets/images/Avatar_poe84it.png')}}"
            class="rounded-full w-80 h-80 object-cover shadow-lg ring-4 ring-sky-500"
            alt="image"
          />
          <h3 class="font-semibold capitalize text-sky-700 mt-5">
            John Doe
          </h3>
          <h6 class="font-semibold">Founder & CEO</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="wrapper">
    <div class="grid md:grid-cols-2 gap-6 md:gap-20">
      <!-- left  -->
      <div class="space-y-9 flex flex-col items-center text-center">
        <div
          class="bg-sky-700 p-6 shadow-md ring-2 ring-slate-100 inline-block justify-center items-center"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-11 w-11 text-white"
            viewBox="0 0 20 20"
            fill="currentColor"
          >
            <path
              d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"
            />
          </svg>
        </div>
        <h3 class="font-semibold">Our Vision</h3>
        <p class="leading-relaxed text-justify">         
MARINE LINER, a company with a vision for dynamism in its field. Today
MARINE LINER. is one of the fastest growing companies in Malaysia.
A company with the prime objective of serving its clients with fast and secure deliveries and logistics
services. MARINE LINER. is engaged in a variety of freight forwarding and total logistics solutions.
Staffed with experienced personnel, the company strives to function as the most reliable service partner
for its clients and is driven by a young energetic team of management and leaders. SLL is committed and
focused to deliver a quality service. Therefore CUSTOMER SATISFACTION is SAIL's top priority.

        </p>
      </div>
      <!-- right  -->
      <div class="space-y-9 flex flex-col items-center text-center">
        <div
          class="bg-sky-700 p-6 shadow-md ring-2 ring-slate-100 inline-block justify-center items-center"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-11 w-11 text-white"
            viewBox="0 0 20 20"
            fill="currentColor"
          >
            <path
              fill-rule="evenodd"
              d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
              clip-rule="evenodd"
            />
          </svg>
        </div>
        <h3 class="font-semibold">Our Mission</h3>
        <p class="leading-relaxed text-justify">
          We meet our customers’ demands for a personal and professional service by offering innovative supply chain solutions for global sea, air, and road transportation as wel as certain specialist services.
        </p>
      </div>
    </div>
  </div>

@endsection