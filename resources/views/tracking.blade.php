@extends('layouts.app')

@section('content')

<div class="object-center bg-no-repeat bg-cover" style="
          background-image: linear-gradient(#00000053, #00000053),
            url(https://images.unsplash.com/photo-1615840287214-7ff58936c4cf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80);
        ">
    <div class="space-y-6 flex items-center justify-center mx-auto flex-col wrapper">
        <h2 class="text-center text-white font-bold uppercase">Tracking</h2>
        <div class="border-b-4 border-blue-300 pb-4 w-20"></div>
    </div>
</div>

<section class="bg-gradient-to-l from-red-50 to-indigo-50">
    <div class="h-full text-gray-800 wrapper">
      <div class="grid md:grid-cols-2 gap-12">
        <div class="flex justify-center items-center md:order-last">
          <div
            class="bg-gradient-to-br from-sky-700 to-sky-500 p-11 rounded-full shadow-inner drop-shadow-md"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-60 w-60 order-first md:order-last text-white"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
              />
            </svg>
          </div>
        </div>
        <div class="flex items-center">
          <form class="w-full space-y-6" method="POST" action="{{url('find-booking')}}">
            @csrf
            <h1>Track Your Shipment</h1>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label
                  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-password"
                >
                  Please Enter Tracking No...
                </label>
                <input
                  class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="grid-password"
                  type="text" name="booking_id"
                  placeholder="ML-000001" >
                <span class="text-gray-500 text-xs leading-none -mt-4"
                  >please enter as following <br>
                  'ML-000001, ML-000002, ML-000003'</span
                >
              </div>
            </div>

            <div class="flex justify-start">
              <button type="submit" class="btn-primary px-10">
                Search
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</section>

@endsection
